<?php 
/*Start of clients column*/
function add_clients_columns($columns) {
  
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('Client Name', 'column name');
	$new_columns['image'] = __('Image');
	$new_columns['date'] = _x('Date', 'column name');
	
	return $new_columns;
}
add_filter('manage_clients_posts_columns' , 'add_clients_columns');

add_action('manage_posts_custom_column', 'show_clients_column_for_listing_list',10,2);
function show_clients_column_for_listing_list( $columns,$post_id ) {
    global $typenow;
    if ($typenow=='clients') 
    { 
        switch ($columns) 
        {
            case 'image':
                echo get_the_post_thumbnail( $post_id, array(50,50) );	
            break;
        }
    }
}
/*End of clients Column*/
?>