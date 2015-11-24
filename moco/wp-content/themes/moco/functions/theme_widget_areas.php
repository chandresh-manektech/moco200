<?php 
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</span></li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2><span class="sidebar">',
        'name' => 'Search',
        'id' => 'search'
    ));
    
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</span></li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2><span class="sidebar">',
        'name' => 'Sidebar',
        'id' => 'sidebar'
    ));
}
?>