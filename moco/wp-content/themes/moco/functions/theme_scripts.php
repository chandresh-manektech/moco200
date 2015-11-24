<?php

function wp_theme_script()
{
    // Register the script like this for a theme:
   
    //wp_register_script( 'jquery-min', get_template_directory_uri() . '/js/jquery.js');
    //wp_register_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', '', '', 'true');
    
    //wp_enqueue_script( 'jquery-min' );
}
add_action( 'wp_enqueue_scripts', 'wp_theme_script' );



// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_theme_styles' );

/**
 * Register style sheet.
 */
function register_theme_styles() {
	//wp_register_style( 'mytheme', get_template_directory_uri() . '/css/sample.css' );
	//wp_enqueue_style( 'mytheme' );
}

?>