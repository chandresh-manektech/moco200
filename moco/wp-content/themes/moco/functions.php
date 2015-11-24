<?php

/* This cariable is used for addding pages to the site options */
$other_pages = array();

/* Start of Payment Gateway */
//include("functions/theme_payment_gateway.php");
/* End of Payment Gateway */

/* include theme commun codes */
include("functions/theme_commun_code.php");
/* end of include theme commun codes */

/* include theme widget area */
include("functions/theme_widget_areas.php");
/* end of include theme widget area */

/* include the Menu Registration page */
include("functions/register_menus.php");
/* end of include the Menu Registration page */

/* include the option page */
include("functions/theme_option_page.php");
/* end of include the option page */

/* Include the custom post type */
include("functions/custom_post_type.php");
/*end ov Include the custom post type*/

/* Include the theme's custom functions */
include("functions/theme_custom_functions.php");
/*end of theme's custom functions */

/* Include the theme's custom widgets */
include("functions/widgets.php");
/*end of theme's custom widgets */

/* Include the theme's custom users */
include("functions/custom_users.php");
/*end of theme's custom users */

/* Include the theme's Init functions for initialization */
include("functions/theme_init.php");
/* End of the theme's Init functions for initialization */

/* Start of theme Dashboard Functions */
include("functions/theme_dashboard.php");
/* End of theme Dashboard Functions */

/* Start of theme Dashboard Functions */
include("functions/theme_scripts.php");
/* End of theme Dashboard Functions */
if ( function_exists( 'add_image_size' ) ) { 
    add_image_size('gal-thumb', 390, 244,true);
}
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
?>