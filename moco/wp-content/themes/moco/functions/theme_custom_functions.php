<?php 
    /*Include google map function*/
    include ("theme_custom_functions/my_map.php");
    /*end of Include google map function*/

    


function load_more_posts() {

    // The $_REQUEST contains all the data sent via ajax
    if (isset($_REQUEST)) {
        $coupon_code        = $_REQUEST['coupon_code'];
        $total_amt          = $_REQUEST['total_amt'];
        $product_id         = $_REQUEST['product_id'];
        $before_facility    = floatval($total_amt);
        
    }
    die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
//add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
/* End function for applying coupon code  */

?>