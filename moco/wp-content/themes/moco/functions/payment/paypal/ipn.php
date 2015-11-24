<?php

include('../../../../../../../wp-load.php');

// STEP 1: Read POST data
// reading posted data from directly from $_POST causes serialization 
// issues with array data in POST
// reading raw POST data from input stream instead. 
$raw_post_data  = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost         = array();
foreach ($raw_post_array as $keyval) {
    $keyval             = explode('=', $keyval);
    if (count($keyval) == 2)
        $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
if (function_exists('get_magic_quotes_gpc')) {
    $get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
    if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
        $value = urlencode(stripslashes($value));
    }
    else {
        $value = urlencode($value);
    }
    $req .= "&$key=$value";
}


// STEP 2: Post IPN data back to paypal to validate
if (get_option('paypal_live_val') == "yes") {
$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
}
else{
$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
}
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

// In wamp like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
// of the certificate as shown below.
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if (!($res = curl_exec($ch))) {
    // error_log("Got " . curl_error($ch) . " when processing IPN data");
    curl_close($ch);
    exit;
}
curl_close($ch);


// STEP 3: Inspect IPN validation result and act accordingly

if (strcmp($res, "VERIFIED") == 0) {
    // check whether the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment
    // assign posted variables to local variables
    $item_number      = $_POST['item_number'];
    $payment_status   = $_POST['payment_status'];
    $payment_amount   = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id           = $_POST['txn_id'];
    $receiver_email   = $_POST['receiver_email'];
    $payer_email      = $_POST['payer_email'];
    $payer_id         = $_POST['payer_id'];
    $amt              = $_POST['amt'];



// Make sure we have access to WP functions namely WPDB
    //include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
    //include( plugin_dir_path( __FILE__ ) . 'archive-services.php');

$myfile = fopen("before.txt", "w") or die("Unable to open file!");
fwrite($myfile, $_POST);
fclose($myfile);

    if ($_POST['payment_status'] == 'Completed') {

        $returnatt = serialize($_POST);
        include('../../../../../../../wp-load.php');

        $payer_id = $_POST['payer_id'];

        $custom_data = $_POST['custom'];
        $booking_id  = $_POST['custom'];


        $post_author = get_post_meta($_POST['custom'], 'booking_user_id');

        $user = get_userdata($post_author[0]);

        $pieces = get_post_meta($_POST['custom'], 'booking_user_id');

        $order_title = $user->user_login . " ( " . $payer_id . " )";

        $my_post = array(
            'post_title'   => $order_title,
            'post_status'  => 'publish',
            'post_author'  => $post_author[0],
            'post_type'    => 'payment',
            'post_content' => $returnatt,
            'post_parent'  => $booking_id
        );

// Insert the post into the database
        $insert_post = wp_insert_post($my_post);
		
		
$myfile = fopen("insert.txt", "w") or die("Unable to open file!");
fwrite($myfile, $insert_post);
fclose($myfile);

        $payment_rel = get_post_meta($booking_id, 'payment_rel');

        $payment_rel = $payment_rel[0];

        if (!empty($payment_rel)) {
            array_push($payment_rel, $insert_post);
        }
        else {
            $payment_rel = array($insert_post);
        }


        update_post_meta($booking_id, 'payment_rel', $payment_rel);

        update_post_meta($insert_post, 'full_payment_date', $returnatt);

        update_post_meta($insert_post, 'payment_date', $_POST['payment_date']);
        update_post_meta($insert_post, 'mc_currency', $_POST['mc_currency']);
        update_post_meta($insert_post, 'payment_status', $_POST['payment_status']);


        $payment_type = get_post_meta($booking_id, 'payment_type');
        $payment_type = $payment_type[0];
        update_post_meta($insert_post, 'payment_type', $payment_type);

        if ($payment_type == "FULL") {
            update_post_meta($booking_id, 'payment_status', "Completed");
        }
        else 
        {
            /*Update Payment Status*/
            $total_package_amount = get_post_meta($booking_id, "total_package_amount");
            $total_package_amount = $total_package_amount[0];
            $payment_rel = get_post_meta($booking_id, "payment_rel");
            $payment_rel_id = $payment_rel[0][count($payment_rel[0])-1];
            $payment_given = get_post_meta($payment_rel_id, "payment_given");
            $payment_given = $payment_given[0];
            $first_time_payment_given = get_post_meta($booking_id, "first_time_payment_given");
            $first_time_payment_given = $first_time_payment_given[0];

            $payment_one = floatval($total_package_amount-$payment_given);
            floatval($payment_one-$first_time_payment_given);
            if(floatval($payment_one-$first_time_payment_given)<=0)
            {
                update_post_meta($booking_id, 'payment_status', "Completed");
                update_post_meta($insert_post, 'payment_type', "FULL");
            }
            /*End of update payment status*/
        }


        update_post_meta($insert_post, 'mc_fee', $_POST['mc_fee']);
        update_post_meta($insert_post, 'business', $_POST['business']);
        update_post_meta($insert_post, 'verify_sign', $_POST['verify_sign']);
        update_post_meta($insert_post, 'receiver_email', $_POST['receiver_email']);
        update_post_meta($insert_post, 'payment_fee', $_POST['payment_fee']);
        update_post_meta($insert_post, 'receiver_id', $_POST['receiver_id']);
        
        update_post_meta($insert_post, 'payment_given', $_POST['payment_gross']);
//update_post_meta($insert_post, 'payment_gross', $pieces['package_amount']);
//Package detail
        $package_cost = get_post_meta($booking_id, 'total_package_amount');
        $package_cost = $package_cost[0];

        $package_start_date = get_post_meta($booking_id, 'package_start_date');
        $package_start_date = $package_start_date[0];

        $package_end_date = get_post_meta($booking_id, 'package_end_date');
        $package_end_date = $package_end_date[0];
		
        $booked_start_date = get_post_meta($booking_id, 'booked_start_date');
        $booked_start_date = $booked_start_date[0];

        $booked_end_date = get_post_meta($booking_id, 'booked_end_date');
        $booked_end_date = $booked_end_date[0];

        update_post_meta($insert_post, 'package_start_date', $package_start_date);
        update_post_meta($insert_post, 'package_end_date', $package_end_date);
        update_post_meta($insert_post, 'package_name', $_POST['item_name']);
        update_post_meta($insert_post, 'package_cost', $package_cost);
        update_post_meta($insert_post, 'payment_booking_id', $booking_id);


//address
        update_post_meta($insert_post, 'address_zip', $_POST['address_zip']);
        update_post_meta($insert_post, 'address_street', $_POST['address_street']);
        update_post_meta($insert_post, 'address_country_code', $_POST['address_country_code']);
        update_post_meta($insert_post, 'address_country', $_POST['address_country']);
        update_post_meta($insert_post, 'address_city', $_POST['address_city']);
        update_post_meta($insert_post, 'address_state', $_POST['address_state']);

//payer detail
        update_post_meta($insert_post, 'payer_id', $_POST['payer_id']);
        update_post_meta($insert_post, 'payer_email', $_POST['payer_email']);
        update_post_meta($insert_post, 'first_name', $_POST['first_name']);
        update_post_meta($insert_post, 'last_name', $_POST['last_name']);

//update_user_meta($user_id, 'user_payment_status', $payment_status);

        
        /*start of send user payment notification*/
        $from    = get_option( 'admin_email' );
        $to      = $user->user_email;
        $subject = "Yacht Payment";
        $message = '
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:96%; float:left; margin:2%;">
                        <tr><td style="font-size:16px;">Hello,</td></tr>
                        <tr>
                            <td style="padding:10px 0; width:150px;"> Welcome and thank you for Booking at Blue Phoenix Yachts! Your Booking is successfully sent. Your Booking Details is below:</td>
                        </tr>
                        <tr>
                            <td>
                                <table style="width:100%; margin:10px 0; font-size:14px; border-collapse:collapse;" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Package</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">'.$_POST['item_name'].'</td>
                                    </tr>	
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Total Cost</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">&euro;'.$package_cost.'</td>
                                    </tr>		
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Payment Given</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">&euro;'.$_POST['payment_gross'].'</td>
                                    </tr>		
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Starting Date</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_start_date)).'</td>
                                    </tr>		
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Ending Date</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_end_date)).'</td>
                                    </tr>						
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px 0; width:150px;"> You can visit your account dashboard where you can see all your bookings and settle any pending amounts by following the URL:</td>
                        </tr>
                        <tr>
                            <td style="padding:10px 0; width:150px;"><a href="'.get_permalink(855).'">'.get_permalink(855).'</a></td>
                        </tr>
                    </table>';

        send_my_mail($from, $to, $subject, $message);
		/*End of sending user payment notification*/
        
		/*start of sending mail to Representative */
		$payment_rel = get_post_meta($booking_id, "payment_rel");
		/*For Sending only first time*/
		if(count($payment_rel[0])<=1)
		{
			$from    = get_option( 'admin_email' );
			$representative_subject = "Yacht Booking";
			$representative_message = '
						<table cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:96%; float:left; margin:2%">
							<tr><td style="font-size:16px;">Hello,</td></tr>
							<tr>
								<td style="padding:10px 0; width:150px;"> The Yacht is booked for the following dates:</td>
							</tr>
							<tr>
								<td>
									<table style="width:100%; margin:10px 0; font-size:14px; border-collapse:collapse;" cellpadding="0" cellspacing="0">
										<tr>
											<td style="border:1px solid #90A9F9; padding:5px;">Starting Date</td>
											<td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_start_date)).'</td>
										</tr>		
										<tr>
											<td style="border:1px solid #90A9F9; padding:5px;">Ending Date</td>
											<td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_end_date)).'</td>
										</tr>						
									</table>
								</td>
							</tr>
						</table>';
			$representative_mail_list = get_option('representative_mail_list');
			
			for ($i = 0; $i < count($representative_mail_list); $i++) {
				send_my_mail($from, $representative_mail_list[$i], $representative_subject, $representative_message);
			}
                    
		}
		
		/*End of sending mail to Representative */
		
		
  
		//start of send Admin payment notification
        $from    = get_option( 'admin_email' );
        $to      = get_option( 'admin_email' );
        $subject = "Yacht Booking Payment Info";
        $yacht_booking_payment_info_msg = '
                    <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:96%; float:left; margin:2%">
                        <tr><td style="font-size:16px;">Hello,</td></tr>
                        <tr>
                            <td style="padding:10px 0; width:150px;"> New Payment has been done to The Blue Phoenix. The details are as below :</td>
                        </tr>
                        <tr>
                            <td>
                                <table style="width:100%; margin:10px 0; font-size:14px; border-collapse:collapse;" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Email</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">'.$user->user_email.'</td>
                                    </tr>	
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Package</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">'.$_POST['item_name'].'</td>
                                    </tr>	
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Total Cost</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">&euro;'.$package_cost.'</td>
                                    </tr>		
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Payment Given</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">&euro;'.$_POST['payment_gross'].'</td>
                                    </tr>		
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Starting Date</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_start_date)).'</td>
                                    </tr>		
                                    <tr>
                                        <td style="border:1px solid #90A9F9; padding:5px;">Ending Date</td>
                                        <td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_end_date)).'</td>
                                    </tr>						
                                </table>
                            </td>
                        </tr>
                    </table>';

        send_my_mail($from, $to, $subject, $yacht_booking_payment_info_msg);
		
		
//        $representative_mail_list = get_option('representative_mail_list');
//			
//			for ($i = 0; $i < count($representative_mail_list); $i++) {
//                            send_my_mail($from, $representative_mail_list[$i], $subject, $yacht_booking_payment_info_msg);
//			}
		

        $notifactionemail = get_option('paypalnotifactionemailaddress');
        $notifactionemail = get_option( 'admin_email' );
        if ($notifactionemail != '') {
            $msg     = "Payment is arrive, please click on this url " . get_edit_post_link($insert_post);
            $headers = 'From: '.$notifactionemail.' <' . $notifactionemail . '>' . "\r\n";
            wp_mail($notifactionemail, "Payment is Sucess", $msg, $headers);
        }
        
        /*Start Of Affiliate Mail Functionality*/
        if(count($payment_rel[0])<=1)
        {
            
            $coupon_used = get_post_meta($booking_id, "coupon_used");
            $coupon_used = $coupon_used[0];
            
            if($coupon_used){
                $single_coupon_use = get_post_meta($coupon_used, "coupon_use");
                $single_coupon_use = $single_coupon_use[0];
                if($single_coupon_use=="Single"){
                    $limit_up_to = get_field("limit_up_to", $coupon_used);
                    $limit_up_to = intval($limit_up_to);
                    if($limit_up_to){
                        $coupon_usage_time = get_field("coupon_usage_time", $coupon_used);
                        $coupon_usage_time = intval($coupon_usage_time);
                        $coupon_usage_time++;
                        if($coupon_usage_time==$limit_up_to){
                            update_field("status", "Inactive", $coupon_used);
                        }
                        update_field("coupon_usage_time", $coupon_usage_time, $coupon_used);
                        
                    }else{
                        update_field("status", "Inactive", $coupon_used);
                    }
                }
            
            $aff_name               = get_post_meta($booking_id, "affiliate_name");
            $affiliate_email        = get_post_meta($booking_id, "affiliate_email");
            $aff_profit_amount      = get_post_meta($booking_id, "affiliate_profit_amount");

            $from    = get_option( 'admin_email' );
        $affiliate_subject = "The Blue Phoenix Yacht Coupon Used.";
        $affiliate_message = '
            <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:96%; float:left; margin:2%">
                <tr>
                    <td style="padding:10px 0; width:150px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="padding:10px 0; width:150px;"> Hello '.$aff_name[0].',</td>
                </tr>
                <tr>
                    <td style="padding:10px 0; width:150px;"> Your Affiliate Coupon is used for booking of The Blue Phoenix Yacht. Please find the booking details and your profit below:</td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%; margin:10px 0; font-size:14px; border-collapse:collapse;" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="border:1px solid #90A9F9; padding:5px;">Package</td>
                                <td style="border:1px solid #90A9F9; padding:5px;">'.$_POST['item_name'].'</td>
                            </tr>	
                            <tr>
                                <td style="border:1px solid #90A9F9; padding:5px;">Your Profit</td>
                                <td style="border:1px solid #90A9F9; padding:5px;">&euro;'.$aff_profit_amount[0].'</td>
                            </tr>		
                            <tr>
                                <td style="border:1px solid #90A9F9; padding:5px;">Charter Starting Date</td>
                                <td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_start_date)).'</td>
                            </tr>		
                            <tr>
                                <td style="border:1px solid #90A9F9; padding:5px;">Charter Ending Date</td>
                                <td style="border:1px solid #90A9F9; padding:5px;">'.date("d-m-Y", strtotime($booked_end_date)).'</td>
                            </tr>						
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px 0; width:150px;">&nbsp;</td>
                </tr>
            </table>';

            send_my_mail($from, $affiliate_email, $affiliate_subject, $affiliate_message);
            
            }
        }
        /*End Of Affiliate Mail Functionality*/
        
		
/* Booking update process */
/* get all PARTIAL booking */
$args             = array('meta_key' => 'payment_status', 'meta_value' => 'Pending', 'post_type' => 'booking', 'posts_per_page' => -1);
$partial_booking2 = get_posts($args);
/* end of get all PARTIAL booking */

foreach ($partial_booking2 as $booking) {
    $total_package_amount     = get_post_meta($booking->ID, "total_package_amount");
    $total_package_amount     = $total_package_amount[0];
    $payment_rel              = get_post_meta($booking->ID, "payment_rel");
    $payment_rel_id           = $payment_rel[0][count($payment_rel[0]) - 1];
    $payment_given            = get_post_meta($payment_rel_id, "payment_given");
    $payment_given            = $payment_given[0];
    $first_time_payment_given = get_post_meta($booking->ID, "first_time_payment_given");
    $first_time_payment_given = $first_time_payment_given[0];

    $payment_one = floatval($total_package_amount - $payment_given);
    floatval($payment_one - $first_time_payment_given);
    if (floatval($payment_one - $first_time_payment_given) <= 0) {
        update_post_meta($booking->ID, 'payment_status', "Completed");
    }
}

/* end of Booking update process */
		
    }
}
else if (strcmp($res, "INVALID") == 0) {
    // log for manual investigation
}
?>
