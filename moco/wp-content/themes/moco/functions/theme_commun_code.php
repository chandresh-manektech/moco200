<?php 
function new_excerpt_length($length) {
    return 70;
}
add_filter('excerpt_length', 'new_excerpt_length');


function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


if (function_exists('add_theme_support')) 
{
    add_theme_support('post-thumbnails');
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );

    function mw_enqueue_color_picker( $hook_suffix ) {
        // first check that $hook_suffix is appropriate for your admin page
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }
    
    
function load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}
add_action( 'admin_enqueue_scripts', 'load_admin_things' );



/*Start Of Changing Login logo*/
function my_login_logo() {
    $img_url = get_option('logo_image');
    if($img_url){
        list($width, $height) = getimagesize($img_url);
    }
    ?>
    <style type="text/css">
        <?php if($img_url){ ?>
        body.login div#login h1 a {
            background-image: url(<?php echo $img_url; ?>);
            background-size : 100%;
            height: <?php echo $height; ?>px;
            width: <?php echo $width; ?>px;
            max-width: 100%; 
        }
        <?php } ?>
        body{

                 /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,92278f+100&0+0,0.65+100 */
      /* IE9 SVG, needs conditional override of 'filter' to 'none' */
      background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMTAwJSIgeDI9IjEwMCUiIHkyPSIwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjAiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzkyMjc4ZiIgc3RvcC1vcGFjaXR5PSIwLjY1Ii8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
      background: -moz-linear-gradient(45deg, rgba(0,0,0,0) 0%, rgba(146,39,143,0.65) 100%); /* FF3.6+ */
      background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(146,39,143,0.65))); /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(45deg, rgba(0,0,0,0) 0%,rgba(146,39,143,0.65) 100%); /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(45deg, rgba(0,0,0,0) 0%,rgba(146,39,143,0.65) 100%); /* Opera 11.10+ */
      background: -ms-linear-gradient(45deg, rgba(0,0,0,0) 0%,rgba(146,39,143,0.65) 100%); /* IE10+ */
      background: linear-gradient(45deg, rgba(0,0,0,0) 0%,rgba(146,39,143,0.65) 100%); /* W3C */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a692278f',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */
                    }
      .login #backtoblog a, .login #nav a {
        color: #000;
        text-decoration: none;
      }
      .login form{
          border-radius: 5px 5px 5px 5px;
      -moz-border-radius: 5px 5px 5px 5px;
      -webkit-border-radius: 5px 5px 5px 5px;
      }
      .wp-core-ui .button-primary {
        background: #405ec4 none repeat scroll 0 0;
      }
      .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
        background: #6481E0 none repeat scroll 0 0;
      }
      #login {
        padding: 5% 0 0;
      }
      .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
        color: #405EC4;
      }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/*End Of Changing Login logo*/


add_action('init', 'my_out');

function my_out() 
{
        ob_start();
}
add_theme_support( 'menus' );


/* Start change WordPress default FROM email address */
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
function new_mail_from($old) {
    $email = get_option( 'admin_email' );
    return $email;
}
function new_mail_from_name($old) {
    $site_name = get_option( 'blogname');
    return $site_name;
}
/* End change WordPress default FROM email address */


/* Start Of new ACF css */
/*
function generate_options_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); // Capture all output into buffer
    require($ss_dir . '/functions/custom-styles.php'); // Grab the custom-style.php file
    $css = ob_get_clean(); // Store output in a variable, then flush the buffer
    file_put_contents($ss_dir . '/css/custom-styles.css', $css, LOCK_EX); // Save it as a css file
}
add_action( 'acf/save_post', 'generate_options_css' ); //Parse the output and write the CSS file on post save

wp_enqueue_style( 'custom-styles', get_template_directory_uri() . '/css/custom-styles.css' );
 */
/* End Of new ACF css */


/*

  //Start Of deleting Booking And Payment Records
  function delsql()
  {
  global $wpdb;
  $allpos = $wpdb->get_results( "SELECT ID FROM `wp_posts` WHERE `post_type` = 'payment' OR `post_type` = 'booking'", "ARRAY_A" );

  for($i=0;$i<count($allpos);$i++)
  {
  $del = "";
  $del = $wpdb->query("DELETE FROM `wp_postmeta` WHERE `post_id` = '".$allpos[$i]['ID']."'");
  echo $allpos[$i]['ID']."<br />".$del;

  $del = "";
  $del = $wpdb->query("DELETE FROM `wp_posts` WHERE `ID` = '".$allpos[$i]['ID']."'");
  echo $allpos[$i]['ID']."<br />".$del."<br />";
  }
  echo "<pre>";
  print_r($allpos);
  echo "</pre>";
  }

  add_action( 'admin_init', 'delsql' );
  //End Of deleting Booking And Payment Records
 */



/* start of Removing The admin bar for non-admin user */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
       if (!current_user_can('administrator') && !is_admin())
       {
              show_admin_bar(false);
       }
}

/* end of Removing The admin bar for non-admin user */



/* Start Of Function for changing the Forgot password mail content */
add_filter( 'retrieve_password_message', 'modify_forgot_mail_contnet', 10, 2 );
function modify_forgot_mail_contnet($message, $key){
    
    $user_data = '';
    // If no value is posted, return false
    if( ! isset( $_POST['user_login'] )  ){
            return '';
    }
    // Fetch user information from user_login
    if ( strpos( $_POST['user_login'], '@' ) ) {

        $user_data = get_user_by( 'email', trim( $_POST['user_login'] ) );
    } else {
        $login = trim($_POST['user_login']);
        $user_data = get_user_by('login', $login);
    }
    if( ! $user_data  ){
        return '';
    }
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;
    
    $site_url = get_site_url();
    
    $reset_url = network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login');
    
          // here $message it the mail content , which you can modify as per your requirment and $key is activation key

         // after modifying you must return $message
          return $message."- <a href=' ".$reset_url." '> click Here </a>";
}
/* End Of Function for changing the Forgot password mail content */


/* Start Of Joining Custom Menu */
function join_custom_menu()
{
       /* remove form main menu */
//       remove_menu_page('edit.php?post_type=facility');
//       remove_menu_page('edit.php?post_type=yacht_section');
//       remove_menu_page('edit.php?post_type=payment');
     //  remove_menu_page('edit.php'); /* Removing Post from Menu */
     //  remove_menu_page('edit-comments.php'); /* Removing Comments from Menu */
       /* end of remove form main menu */

//       add_submenu_page('edit.php?post_type=package', 'Package Facility', 'Package Facility', 'manage_options', 'edit.php?post_type=facility');
//       add_submenu_page('edit.php?post_type=yacht', 'Yacht Section', 'Yacht Section', 'manage_options', 'edit.php?post_type=yacht_section');
//       add_submenu_page('edit.php?post_type=booking', 'Payment', 'Payment', 'manage_options', 'edit.php?post_type=payment');
}
/* End Of Joining Custom Menu */

/* Start Of Register Menu */
function register_mytheme_menus() {
  register_nav_menus(
    array(
      'header_menu'       => __( 'Header Menu' ),
      'sub_menu'          => __( 'Sub Menu' ),
      'user_reg_menu'     => __( 'Register Menu' ),
      'user_profile_menu' => __( 'Profile Menu' ),
      'footer_menu'       => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_mytheme_menus' );
/* Start Of Register Menu */
?>