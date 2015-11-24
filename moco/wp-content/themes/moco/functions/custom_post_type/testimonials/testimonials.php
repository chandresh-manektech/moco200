<?php 
register_post_type( 'testimonials',
    array(
    'labels'             => array(
    'name'               => __('Testimonial'            	),
    'singular_name'      => __('Testimonial'                    ),
    'add_new'            => __('Add Testimonial'                ),
    'all_items'          => __('All Testimoniala'               ),
    'add_new_item'       => __('Add New Testimonial'            ),
    'edit_item'          => __('Edit Testimonial'               ),
    'new_item'           => __('New Testimonial'                ),
    'view_item'          => __('View Testimonial'               ),
    'search_items'       => __('Search Testimonial'             ),
    'not_found'          => __('No Testimonial found'           ),
    'not_found_in_trash' => __('No Testimonial found in Trash'  )
    ),
    'public'       => true,
    'has_archive'  => true,
    'menu_icon'    => 'dashicons-format-quote',
    'rewrite'      => array('slug'=>'testimonials'),
    'supports'     => array( 'title','editor','thumbnail'),
    )
); 
include 'testimonials_columns.php';
?>