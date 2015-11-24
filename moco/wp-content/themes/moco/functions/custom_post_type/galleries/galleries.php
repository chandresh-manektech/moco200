<?php
register_post_type('galleries', array(
    'labels' => array(
        'name' => __('Gallery'),
        'singular_name' => __('Gallery'),
        'add_new' => __('Add Gallery Item'),
        'all_items' => __('All Gallery Items'),
        'add_new_item' => __('Add Gallery Item'),
        'edit_item' => __('Edit Gallery Item'),
        'new_item' => __('New Gallery Item'),
        'view_item' => __('View Gallery Item'),
        'search_items' => __('Search Gallery Item'),
        'not_found' => __('No Gallery item found'),
        'not_found_in_trash' => __('No Gallery item found in Trash')
    ),
    'public' => true,
    'has_archive' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-format-video',
    'menu_position' => 24,
    'rewrite' => array('slug' => 'galleries'),
    'supports' => array('title', 'editor', 'thumbnail')
        )
);
include 'galleries_columns.php';
?>