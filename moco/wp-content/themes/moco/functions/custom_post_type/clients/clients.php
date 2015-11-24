<?php 
register_post_type( 'clients',
    array(
    'labels'             => array(
    'name'               => __('Client'                    ),
    'singular_name'      => __('Client'                    ),
    'add_new'            => __('Add Client'                ),
    'all_items'          => __('All Clients'               ),
    'add_new_item'       => __('Add New Client'            ),
    'edit_item'          => __('Edit Client'               ),
    'new_item'           => __('New Client'                ),
    'view_item'          => __('View Client'               ),
    'search_items'       => __('Search Client'             ),
    'not_found'          => __('No Client found'           ),
    'not_found_in_trash' => __('No Client found in Trash'  )
    ),
    'public'       => true,
    'has_archive'  => true,
    'show_ui'      => true,
    'show_in_menu' => true,
    'menu_icon'    => 'dashicons-groups',
    'rewrite'      => array('slug'=>'clients'),
    'supports'     => array( 'title','editor','thumbnail','excerpt','author'),
    )
); 
include 'clients_columns.php';
?>