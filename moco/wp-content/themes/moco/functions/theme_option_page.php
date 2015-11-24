<?php
$main_page = array(
    array(  "page_slug"     => "social_links_options_page", 
            "menu_name"     => "Site Options", 
            "create_page"   => "no", 
            "php_page_name" => "social_links_options_page.php", 
            "is_procted"    => "no"
        ),
    array(  "page_slug"     => "header_section_options_page", 
            "menu_name"     => "Header Section", 
            "create_page"   => "no", 
            "php_page_name" => "header_section_options_page.php", 
            "is_procted"    => "no"
        ),
    array(  "page_slug"     => "footer_section_options_page", 
            "menu_name"     => "Footer Section", 
            "create_page"   => "no", 
            "php_page_name" => "footer_section_options_page.php", 
            "is_procted"    => "no"
        ),
    array(  "page_slug"     => "contact_options_page", 
            "menu_name"     => "Contact Section", 
            "create_page"   => "no", 
            "php_page_name" => "contact_options_page.php", 
            "is_procted"    => "no"
        ),
    array(  "page_slug"     => "register_menu_options_page", 
            "menu_name"     => "Register Menus", 
            "create_page"   => "no", 
            "php_page_name" => "register_menu_options_page.php", 
            "is_procted"    => "yes"
        ),
    array(  "page_slug"     => "admin_menu_options_page", 
            "menu_name"     => "Admin Menus", 
            "create_page"   => "no", 
            "php_page_name" => "admin_menu_options_page.php", 
            "is_procted"    => "yes"
        ),
    array(  "page_slug"     => "template_options_page", 
            "menu_name"     => "Template Pages", 
            "create_page"   => "no", 
            "php_page_name" => "template_options_page.php", 
            "is_procted"    => "yes"
        )
);

/* Adding other pages to the main pages list array */

$all_main_pages = array_merge($main_page, $other_pages);

//do not remove this include
include 'theme_option_page/option_main.php';
?>