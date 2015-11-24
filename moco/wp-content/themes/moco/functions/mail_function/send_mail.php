<?php
class Mail
{

       /**
        * Line terminator used for separating header lines.
        * @var string
        */
       var
              $sep = "\r\n";

       /**
        * Provides an interface for generating Mail:: objects of various
        * types
        *
        * @param string $driver The kind of Mail:: object to instantiate.
        * @param array  $params The parameters to pass to the Mail:: object.
        * @return object Mail a instance of the driver class or if fails a PEAR Error
        * @access public
        */
       function &factory($driver, $params = array())
       {
              $driver = strtolower($driver);
              @include_once 'Mail/' . $driver . '.php';
              $class  = 'Mail_' . $driver;
              if (class_exists($class))
              {
                     $mailer = new $class($params);
                     return $mailer;
              }
              else
              {
                     return PEAR::raiseError('Unable to find class for driver ' . $driver);
              }
       }

       /**
        * Implements Mail::send() function using php's built-in mail()
        * command.
        *
        * @param mixed $recipients Either a comma-seperated list of recipients
        *              (RFC822 compliant), or an array of recipients,
        *              each RFC822 valid. This may contain recipients not
        *              specified in the headers, for Bcc:, resending
        *              messages, etc.
        *
        * @param array $headers The array of headers to send with the mail, in an
        *              associative array, where the array key is the
        *              header name (ie, 'Subject'), and the array value
        *              is the header value (ie, 'test'). The header
        *              produced from those values would be 'Subject:
        *              test'.
        *
        * @param string $body The full text of the message body, including any
        *               Mime parts, etc.
        *
        * @return mixed Returns true on success, or a PEAR_Error
        *               containing a descriptive error message on
        *               failure.
        *
        * @access public
        * @deprecated use Mail_mail::send instead
        */
       function send($recipients, $headers, $body)
       {
              if (!is_array($headers))
              {
                     return PEAR::raiseError('$headers must be an array');
              }

              $result = $this->_sanitizeHeaders($headers);
              if (is_a($result, 'PEAR_Error'))
              {
                     return $result;
              }

              // if we're passed an array of recipients, implode it.
              if (is_array($recipients))
              {
                     $recipients = implode(', ', $recipients);
              }

              // get the Subject out of the headers array so that we can
              // pass it as a seperate argument to mail().
              $subject = '';
              if (isset($headers['Subject']))
              {
                     $subject = $headers['Subject'];
                     unset($headers['Subject']);
              }

              // flatten the headers out.
              list(, $text_headers) = Mail::prepareHeaders($headers);

              return mail($recipients, $subject, $body, $text_headers);
       }

       /**
        * Sanitize an array of mail headers by removing any additional header
        * strings present in a legitimate header's value.  The goal of this
        * filter is to prevent mail injection attacks.
        *
        * @param array $headers The associative array of headers to sanitize.
        *
        * @access private
        */
       function _sanitizeHeaders(&$headers)
       {
              foreach ($headers as $key => $value)
              {
                     $headers[$key] = preg_replace('=((<CR>|<LF>|0x0A/%0A|0x0D/%0D|\\n|\\r)\S).*=i', null, $value);
              }
       }

       /**
        * Take an array of mail headers and return a string containing
        * text usable in sending a message.
        *
        * @param array $headers The array of headers to prepare, in an associative
        *              array, where the array key is the header name (ie,
        *              'Subject'), and the array value is the header
        *              value (ie, 'test'). The header produced from those
        *              values would be 'Subject: test'.
        *
        * @return mixed Returns false if it encounters a bad address,
        *               otherwise returns an array containing two
        *               elements: Any From: address found in the headers,
        *               and the plain text version of the headers.
        * @access private
        */
       function prepareHeaders($headers)
       {
              $lines = array();
              $from  = null;

              foreach ($headers as $key => $value)
              {
                     if (strcasecmp($key, 'From') === 0)
                     {
                            include_once 'Mail/RFC822.php';
                            $parser    = new Mail_RFC822();
                            $addresses = $parser->parseAddressList($value, 'localhost', false);
                            if (is_a($addresses, 'PEAR_Error'))
                            {
                                   return $addresses;
                            }

                            $from = $addresses[0]->mailbox . '@' . $addresses[0]->host;

                            // Reject envelope From: addresses with spaces.
                            if (strstr($from, ' '))
                            {
                                   return false;
                            }

                            $lines[] = $key . ': ' . $value;
                     }
                     elseif (strcasecmp($key, 'Received') === 0)
                     {
                            $received = array();
                            if (is_array($value))
                            {
                                   foreach ($value as $line)
                                   {
                                          $received[] = $key . ': ' . $line;
                                   }
                            }
                            else
                            {
                                   $received[] = $key . ': ' . $value;
                            }
                            // Put Received: headers at the top.  Spam detectors often
                            // flag messages with Received: headers after the Subject:
                            // as spam.
                            $lines = array_merge($received, $lines);
                     }
                     else
                     {
                            // If $value is an array (i.e., a list of addresses), convert
                            // it to a comma-delimited string of its elements (addresses).
                            if (is_array($value))
                            {
                                   $value = implode(', ', $value);
                            }
                            $lines[] = $key . ': ' . $value;
                     }
              }

              return array($from, join($this->sep, $lines));
       }

       /**
        * Take a set of recipients and parse them, returning an array of
        * bare addresses (forward paths) that can be passed to sendmail
        * or an smtp server with the rcpt to: command.
        *
        * @param mixed Either a comma-seperated list of recipients
        *              (RFC822 compliant), or an array of recipients,
        *              each RFC822 valid.
        *
        * @return mixed An array of forward paths (bare addresses) or a PEAR_Error
        *               object if the address list could not be parsed.
        * @access private
        */
       function parseRecipients($recipients)
       {
              include_once 'Mail/RFC822.php';

              // if we're passed an array, assume addresses are valid and
              // implode them before parsing.
              if (is_array($recipients))
              {
                     $recipients = implode(', ', $recipients);
              }

              // Parse recipients, leaving out all personal info. This is
              // for smtp recipients, etc. All relevant personal information
              // should already be in the headers.
              $addresses = Mail_RFC822::parseAddressList($recipients, 'localhost', false);

              // If parseAddressList() returned a PEAR_Error object, just return it.
              if (is_a($addresses, 'PEAR_Error'))
              {
                     return $addresses;
              }

              $recipients = array();
              if (is_array($addresses))
              {
                     foreach ($addresses as $ob)
                     {
                            $recipients[] = $ob->mailbox . '@' . $ob->host;
                     }
              }

              return $recipients;
       }

}

add_filter( 'wp_mail_content_type', 'set_content_type' );
function set_content_type( $content_type ) {
	return 'text/html';
}

/*
add_action('phpmailer_init', 'my_phpmailer_example');

function my_phpmailer_example($phpmailer)
{
       $phpmailer->isSMTP();
       $phpmailer->Host     = 'ssl://smtp.gmail.com';
       $phpmailer->SMTPAuth = true; // Force it to use Username and Password to authenticate
       $phpmailer->Port     = 465;
       $phpmailer->Username = 'testineed@gmail.com';
       $phpmailer->Password = 'testineedmanek@tech';
       $phpmailer->IsHTML(true);
       
}*/

function send_my_mail($from, $to, $subject, $msg)
{
       //include "Mail.php"; 


       $mail_header = get_option('mymail_header');
       $mail_footer = get_option('mymail_footer');
       $siteurl  = get_bloginfo("siteurl") . "/";
       $sitename = get_bloginfo("name");
       $themeurl =  get_template_directory_uri();
       $from     = $from;
       $to       = $to;
       $subject  = $subject;
       $body     = '
                        <!DOCTYPE HTML>
                        <html>
                        <head>
                        </head>
                        <body>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FEF9E9;">

                            <tr>
                                <td valign="top" align="center" style="padding:40px 20px;">
                                    <table style="border-collapse:collapse; border:0px solid #6C6C6C; width:580px; font-family:Arial, Helvetica, sans-serif; background:#ffffff; box-shadow:0 0 5px #A6A5A5;"> 	
                                        <tr>
                                            <td style="padding:20px 10px; text-align:center; background: #ffffff;">'.$mail_header.'
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background:#6C6C6C; height:2px;"></td>
                                        </tr>
                                        <tr>
                                            <td>'. $msg .'
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>'.$mail_footer.'
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                        </body>
                        </html>';

       $headers = array(
              'From'         => $from,
              'To'           => $to,
              'Content-type' => 'text/html',
              'Subject'      => $subject
       );

       $smtp = Mail::factory('smtp', array(
                     'host'     => 'ssl://smtp.gmail.com',
                     'port'     => '465',
                     'auth'     => true,
                     'username' => 'testineed@gmail.com',
                     'password' => 'manek@tech'
       ));

       /* $mail = $smtp->send($to, $headers, $body);

         if (PEAR::isError($mail))
         {
         return $mail->getMessage();
         }
         else
         {
         return TRUE;
         }
        */

       

       $headers2[] = 'MIME-Version: 1.0' . "\r\n";
       $headers2[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

       //$headers[] = 'Content-Type: text/html; charset=UTF-8';

       $headers2[] = 'From: ' . $sitename . ' <' . $from . '>' . "\r\n";;

       
       
       wp_mail($to, $subject, $body, $headers2);
}

?>