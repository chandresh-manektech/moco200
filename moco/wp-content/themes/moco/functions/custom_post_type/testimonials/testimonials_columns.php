<?php 
/*Slider colum*/
function add_testimonials_columns($columns) {
  
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('Testimonials Name', 'column name');
	$new_columns['image'] = __('Image');
	$new_columns['date'] = _x('Date', 'column name');
	
	return $new_columns;
}
add_filter('manage_testimonials_posts_columns' , 'add_testimonials_columns');

add_action('manage_posts_custom_column', 'show_testimonials_column_for_listing_list',10,2);
function show_testimonials_column_for_listing_list( $columns,$post_id ) {
    global $typenow;
    if ($typenow=='testimonials') 
    { 
        switch ($columns) 
        {
            case 'image':
                echo get_the_post_thumbnail( $post_id, array(50,50) );	
            break;
        }
    }
}
/*end of Slider Colum*/
?>