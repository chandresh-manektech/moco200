<?php

/* This is file for adding the payment gateway to the site */



/* Start of adding Paypal Payment Gateway */
$paypal_pages =
    array(  "page_slug"     => "paypal_options_page", 
            "menu_name"     => "Paypal Options", 
            "create_page"   => "no", 
            "php_page_name" => get_template_directory()."/functions/payment/paypal/paypal_options_page.php", 
            "is_procted"    => "no"
        );

array_push($other_pages,$paypal_pages);
/* End of adding Paypal Payment Gateway */


/*custom post type*/
add_action( 'init', 'create_post_type_payment' );

function create_post_type_payment()
{	
	register_post_type( 'payment',
		array(
		'labels'       	   => array(
		'name'               => __('Payment'                 ),
		'singular_name'      => __('Payment'                 ),
		'add_new'            => __('Add Payment'             ),
		'all_items'          => __('All Payment'             ),
		'add_new_item'       => __('Add New Payment'         ),
		'edit_item'          => __('Edit Payment'            ),
		'new_item'           => __('New  Payment'            ),
		'view_item'          => __('View Payment'            ),
		'search_items'       => __('Search Payment'          ),
		'not_found'          => __('No Payment'         	),
		'not_found_in_trash' => __('No Payment found in Trash')
						),	
		'public'        => true,
		'exclude_from_search'=> true,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => false,		
		'has_archive'   => false,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-clipboard',
		'rewrite'       => array('slug'=>'payment'),
		'supports'      => array( 'title' ))
	); 
}
/*end of custom post type*/


/* Start of adding category of the payment */
add_action( 'init', 'create_payment_taxonomies', 0 );

// create two taxonomies, recipes and writers for the post type "recipe"
function create_payment_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Payment Gateway', 'Recipe Types' ),
		'singular_name'     => _x( 'Payment Gateway', 'Recipe Types' ),
		'search_items'      => __( 'Search Payment Gateway' ),
		'all_items'         => __( 'All Payment Gateway' ),
		'parent_item'       => __( 'Parent Payment Gateway' ),
		'parent_item_colon' => __( 'Parent Payment Gateway:' ),
		'edit_item'         => __( 'Edit Payment Gateway' ),
		'update_item'       => __( 'Update Payment Gateway' ),
		'add_new_item'      => __( 'Add New Payment Gateway' ),
		'new_item_name'     => __( 'New Payment Gateway Name' ),
		'menu_name'         => __( 'Payment Gateway' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'payment_gateway' ),
	);

	register_taxonomy( 'payment_gateway', array( 'payment' ), $args );

}
/* End of adding category of the payment */


/*Add custom colum*/
function add_payment_columns($columns) {
  	unset($columns['date']);
	return array_merge($columns, 
	array(
		'payment_status' => __('Payment Status'),
		'payment_gross' => __('Total Amount'),
		'payment_date' => __('Payment Date'),
	));
	
}
add_filter('manage_payment_posts_columns' , 'add_payment_columns'); // remeber that "payment" is your custom post type name
/*end of Add custom colum*/

/*add data in custom culom*/


add_action('manage_posts_custom_column', 'show_payment_column_for_listing_list',10,2); // remeber that "payment" is your custom post type name
function show_payment_column_for_listing_list( $columns,$post_id ) {
    global $typenow;
    if ($typenow=='payment') 
    { 
    	switch ($columns) 
	{
		case 'payment_status':
		echo get_post_meta($post_id, 'payment_status', true);
		break;
		case 'payment_gross':
		echo get_post_meta($post_id, 'payment_given', true)."&nbsp;".get_post_meta($post_id, 'mc_currency', true);
		break;
		case 'payment_date':
		echo get_post_meta($post_id, 'payment_date', true);
	}
	 
    }
}
/*end of add data in custom culom*/



/*Meta Box for payer detil*/
add_action("admin_init", "payer_detail");

function payer_detail(){
 	add_meta_box("payer_detail_id", "Payer Detail", "payer_detail_out", "payment", "advanced", "high");	
} 

function payer_detail_out(){
 	global $post,$wpdb;	
	$payer_email = get_post_meta($post->ID, 'payer_email', true);
	$first_name = get_post_meta($post->ID, 'first_name', true);
	$last_name = get_post_meta($post->ID, 'last_name', true);
	$payer_id = get_post_meta($post->ID, 'payer_id', true);
	
$payment_method = get_post_meta($post->ID, 'payment_method');

if($payment_method[0]=="jcc"){
	?>
    <style type="text/css">
	#payer_detail_id , #payer_address_detail_id{
		display:none;		
	}
	#jcc_detail_id{
		display:block;		
	}
	</style>
<?php }
else  { ?>
	<style type="text/css">
	#payer_detail_id , #payer_address_detail_id{
		display:block;		
	}
	</style>

<?php } ?>
	<style type="text/css">
		.fulldiv, .fulldiv input[type='text'], .myinputes
		{
			width:100%;
		}
		.fulldiv input[type='button']
		{
			margin-top:5px;
			
		}
		.fulldiv input[type='text']
		{
			margin-top:5px;
		}
	</style>
      
      
	<p>
            
            <div class="fulldiv">
                  <div class="myinputes">
                        <table class="repatertab" width="100%" cellpadding="5" cellspacing="5">
                        	
                              <tr>
                              	<td>
                                    	<label for="first_name">First Name</label><br />
                                    	<input id="first_name" name="first_name" type="text" value="<?php echo $first_name; ?>" />
                                    </td>
                                    <td>
                                    	<label for="last_name">Last Name</label><br />
                                    	<input id="last_name" name="last_name" type="text" value="<?php echo $last_name; ?>" />
                                    </td>
					</tr>
                              <tr>
                              	<td>
                                    	<label for="payer_id">Payer ID</label><br />
                                    	<input id="payer_id" name="payer_id" type="text" value="<?php echo $payer_id; ?>" />
                                    </td>
                                    <td>
                                    	<label for="payer_email">Email</label><br />
                                    	<input id="payer_email" name="payer_email" type="text" value="<?php echo $payer_email; ?>" />
                                    </td>
                              </tr>
                        
                        </table>                 
                  </div> 
            </div>         
	</p> 
<?php
}
add_action('save_post', 'payer_detail_save');
function payer_detail_save($post_id)
{
	$post = get_post( $post_id ); 
	if ($post->post_type == 'payment') 
	{  	
		update_post_meta($post->ID, 'first_name', $_POST['first_name']);
		update_post_meta($post->ID, 'last_name', $_POST['last_name']);
		update_post_meta($post->ID, 'payer_email', $_POST['payer_email']);		
	} 
}
/*end of Meta Box for payer detil*/




/*Meta Box for payer Package*/
add_action("admin_init", "payer_package");

function payer_package(){
 	add_meta_box("payer_package_id", "Package Detail", "payer_package_out", "payment", "advanced", "high");	
} 

function payer_package_out(){
 	global $post,$wpdb;	
	$package_name = get_post_meta($post->ID, 'package_name', true);
	$package_cost = get_post_meta($post->ID, 'package_cost', true);
	$package_start_date = get_post_meta($post->ID, 'package_start_date', true);
	$package_end_date = get_post_meta($post->ID, 'package_end_date', true);
?> 
      
	<p>
            
            <div class="fulldiv">
                  <div class="myinputes">
                        <table class="repatertab" width="100%" cellpadding="5" cellspacing="5">
                        	
                              <tr>
                              	<td>
                                    	<label for="package_name">Package</label><br />
                                    	<input id="package_name" name="package_name" type="text" value="<?php echo $package_name; ?>" />
                                    </td>
                                    <td>
                                    	<label for="package_cost">Package Cost</label><br />
                                    	<input id="package_cost" name="package_cost" type="text" value="<?php echo $package_cost; ?>" style="color:#0074A2;" />
                                    </td>
					</tr>
                              <tr>
                              	<td>
                                    	<label for="package_start_date">Starting Date</label><br />
                                    	<input id="package_start_date" name="package_start_date" type="text" value="<?php echo $package_start_date; ?>" />
                                    </td>
                                    <td>
                                    	<label for="package_end_date">Ending Date</label><br />
                                    	<input id="package_end_date" name="package_end_date" type="text" value="<?php echo $package_end_date; ?>" />
                                    </td>
					</tr>
                        
                        </table>                 
                  </div> 
            </div>         
	</p> 
<?php
}
add_action('save_post', 'payer_package_save');
function payer_package_save($post_id)
{
	$post = get_post( $post_id ); 
	if ($post->post_type == 'payment') 
	{  	
		update_post_meta($post->ID, 'package_name', $_POST['package_name']);
		update_post_meta($post->ID, 'package_cost', $_POST['package_cost']);
		update_post_meta($post->ID, 'package_start_date', $_POST['package_start_date']);
		update_post_meta($post->ID, 'package_end_date', $_POST['package_end_date']);
	} 
}
/*end of Meta Box for payer Package*/





/*Meta Box for payer address*/
add_action("admin_init", "payer_address_detail");

function payer_address_detail(){
 	add_meta_box("payer_address_detail_id", "Payer Address Detail", "payer_address_detail_out", "payment", "advanced", "high");	
} 

function payer_address_detail_out(){
 	global $post,$wpdb;	
	$address_street = get_post_meta($post->ID, 'address_street', true);
	$address_zip = get_post_meta($post->ID, 'address_zip', true);
	$address_city = get_post_meta($post->ID, 'address_city', true);
	$address_state = get_post_meta($post->ID, 'address_state', true);
	$address_country = get_post_meta($post->ID, 'address_country', true);
	$address_country_code = get_post_meta($post->ID, 'address_country_code', true);
?>
	<style type="text/css">
		.fulldiv, .fulldiv input[type='text'], .myinputes
		{
			width:100%;
		}
		.fulldiv input[type='button']
		{
			margin-top:5px;
			
		}
		.fulldiv input[type='text']
		{
			margin-top:5px;
		}
	</style>
      
      
	<p>
            <div class="fulldiv">
                  <div class="myinputes">
                        <table class="repatertab" width="100%" cellpadding="5" cellspacing="5">
                        	<tr>
                              	<td>
                                    	<label for="address_street">Street</label><br />
                                    	<input id="address_street" name="address_street" type="text" value="<?php echo $address_street; ?>" />
                                    </td>
                              
                              	<td>
                                    	<label for="address_zip">Zip Code</label><br />
                                    	<input id="address_zip" name="address_zip" type="text" value="<?php echo $address_zip; ?>" />
                                    </td>
                              </tr>
                              
                              <tr>
                              	<td>
                                    	<label for="address_city">City</label><br />
                                    	<input id="address_city" name="address_city" type="text" value="<?php echo $address_city; ?>" />
                                    </td>
                            
                              	<td>
                                    	<label for="address_state">State</label><br />
                                    	<input id="address_state" name="address_state" type="text" value="<?php echo $address_state; ?>" />
                                    </td>
                              </tr>
                              
                              <tr>
                              	<td>
                                    	<label for="address_country">Country</label><br />
                                    	<input id="address_country" name="address_country" type="text" value="<?php echo $address_country; ?>" />
                                    </td>
                             
                              	<td>
                                    	<label for="address_country_code">Country Code</label><br />
                                    	<input id="address_country_code" name="address_country_code" type="text" value="<?php echo $address_country_code; ?>" />
                                    </td>
                              </tr>
                              
                        </table>                 
                  </div> 
            </div>         
	</p> 
<?php
}
add_action('save_post', 'payer_address_detail_save');
function payer_address_detail_save($post_id)
{
	$post = get_post( $post_id ); 
	if ($post->post_type == 'payment') 
	{  	
		update_post_meta($post->ID, 'address_street', $_POST['address_street']);
		update_post_meta($post->ID, 'address_zip', $_POST['address_zip']);
		update_post_meta($post->ID, 'address_city', $_POST['address_city']);
		update_post_meta($post->ID, 'address_state', $_POST['address_state']);	
		update_post_meta($post->ID, 'address_country', $_POST['address_country']);
		update_post_meta($post->ID, 'address_country_code', $_POST['address_country_code']);		
	} 
}
/*end of Meta Box for payer detil*/


/*Meta Box for Payment detil*/
add_action("admin_init", "payment_detail");

function payment_detail(){
 	add_meta_box("payment_detail_id", "Payment Detail", "payment_detail_out", "payment", "advanced", "high");	
} 

function payment_detail_out(){
 	global $post,$wpdb;	
	$payment_status = get_post_meta($post->ID, 'payment_status', true);
	$payment_type = get_post_meta($post->ID, 'payment_type', true);
	$payment_given = get_post_meta($post->ID, 'payment_given', true);
	$payment_date = get_post_meta($post->ID, 'payment_date', true);
	$mc_fee = get_post_meta($post->ID, 'mc_fee', true);
	$payment_gross = get_post_meta($post->ID, 'payment_gross', true);
	$payment_currency = get_post_meta($post->ID, 'mc_currency', true);
	$verify_sign = get_post_meta($post->ID, 'verify_sign', true);
	$business = get_post_meta($post->ID, 'business', true);
	$receiver_email = get_post_meta($post->ID, 'receiver_email', true);
	$receiver_id = get_post_meta($post->ID, 'receiver_id', true);
	$payment_given = get_post_meta($post->ID, 'payment_given', true);
	$payment_type = get_post_meta($post->ID, 'payment_type', true);
	
	
	$package_cost = get_post_meta($post->ID, 'package_cost', true);
	$total_booking_amount = get_post_meta($post->ID, 'total_booking_amount', true);
        
	
	
?>
	<style type="text/css">
		.fulldiv, .fulldiv input[type='text'], .myinputes , .fulldiv select
		{
			width:100%;
		}
		.fulldiv input[type='button']
		{
			margin-top:5px;
			
		}
		.fulldiv input[type='text']
		{
			margin-top:5px;
		}
	</style>
      
      
	<p>
            <div class="fulldiv">
                  <div class="myinputes">
                        <table class="repatertab" width="100%" cellpadding="5" cellspacing="5">
                        	<tr>
                              	<td>
                                    	<label for="payment_status">Payment Status</label><br />
                                    	<input id="payment_status" name="payment_status" type="text" value="<?php echo $payment_status; ?>" />
                                    </td>
                              	<td>
                                    	<label for="payment_type">Payment Type</label><br />
                                        <select id="payment_type" name="payment_type">
                                        	<option value="PARTIAL" <?php if($payment_type=="PARTIAL") { ?> selected="selected"  <?php } ?> >PARTIAL</option>
                                        	<option value="FULL"  <?php if($payment_type=="FULL") { ?> selected="selected"  <?php } ?> >FULL</option>
                                        </select>
                                    </td>
                              </tr>
                              
                              <tr>
                              	<td>
                                    	<label for="payment_date">Payment Date</label><br />
                                    	<input id="payment_date" name="payment_date" type="text" value="<?php echo $payment_date; ?>" />
                                    </td>
                              	<td>
                                    	<label for="payment_given">Payment Given</label><br />
                                    	<input id="payment_given" name="payment_given" type="text" value="<?php echo $payment_given; ?>" style="color:#0074A2;" />
                                    </td>
                              </tr>
                              
                              <tr>
                              <?php
								$payment_method = get_post_meta($post->ID, 'payment_method');
								if($payment_method[0]!="jcc"){
									?>
                              	<td>
                                    	<label for="mc_fee">Transaction fee</label><br />
                                    	<input id="mc_fee" name="mc_fee" type="text" value="<?php echo $mc_fee; ?>" />
                                    </td>
                                    
								<?php } ?>
                            
                              	<td>
                                    	<label for="payment_gross">Remaining Amount</label><br />
                                    	<input id="payment_gross" name="payment_gross" type="text" value="<?php echo floatval($total_booking_amount-$payment_given); ?>" style="color:#0074A2;" />
                                    </td>
                              </tr>
                              
                              <?php
                                $payment_method = get_post_meta($post->ID, 'payment_method');
                                if($payment_method[0]!="jcc"){
                                        ?>
                              <tr>
                              	<td colspan="2">
                                    	<label for="verify_sign">Verify Sign</label><br />
                                    	<input id="verify_sign" name="verify_sign" type="text" value="<?php echo $verify_sign; ?>" />
                                    </td>
                              </tr>
                              
                              <tr>
                              	<td colspan="2">
                                    	<label for="business">Receiver Business Name</label><br />
                                    	<input id="business" name="business" type="text" value="<?php echo $business; ?>" />
                                    </td>
                              
                              </tr>
                              
                              <tr>
                              	<td>
                                    	<label for="receiver_id">Receiver ID</label><br />
                                    	<input id="receiver_id" name="receiver_id" type="text" value="<?php echo $receiver_id; ?>" />
                                    </td>
                                    <td>
                                    	<label for="receiver_email">Receiver Email</label><br />
                                    	<input id="receiver_email" name="receiver_email" type="text" value="<?php echo $receiver_email; ?>" />
                                    </td>
                              </tr>
								<?php } ?>
                              
                              
                              
                        </table>                 
                  </div> 
            </div>         
	</p> 
<?php
}
add_action('save_post', 'payment_detail_save');
function payment_detail_save($post_id)
{
	$post = get_post( $post_id ); 
	if ($post->post_type == 'payment') 
	{  	
		update_post_meta($post->ID, 'payment_status', $_POST['payment_status']);
		update_post_meta($post->ID, 'payment_type', $_POST['payment_type']);
		update_post_meta($post->ID, 'payment_given', $_POST['payment_given']);
		update_post_meta($post->ID, 'payment_date', $_POST['payment_date']);
		update_post_meta($post->ID, 'mc_fee', $_POST['mc_fee']);
		update_post_meta($post->ID, 'payment_gross', $_POST['payment_gross']);	
		update_post_meta($post->ID, 'verify_sign', $_POST['verify_sign']);
		update_post_meta($post->ID, 'business', $_POST['business']);
	} 
}
/*end of Meta Box for Payment detil*/


/*Meta Box for JCC detail*/
add_action("admin_init", "jcc_detail");

function jcc_detail(){
 	add_meta_box("jcc_detail_id", "JCC Payment Detail", "jcc_detail_out", "payment", "advanced", "high");	
} 

function jcc_detail_out(){
 	global $post,$wpdb;	
	$jcc_merchant_id = get_post_meta($post->ID, 'jcc_merchant_id', true);
	$jcc_acquirer_id = get_post_meta($post->ID, 'jcc_acquirer_id', true);
	$jcc_order_id = get_post_meta($post->ID, 'jcc_order_id', true);
	$jcc_ref_no = get_post_meta($post->ID, 'jcc_ref_no', true);
	$jcc_card_no = get_post_meta($post->ID, 'jcc_card_no', true);
	$jcc_auth_code = get_post_meta($post->ID, 'jcc_auth_code', true);
	$jcc_response_sign = get_post_meta($post->ID, 'jcc_response_sign', true);
?> 
      
	<p>
            
            <div class="fulldiv">
                  <div class="myinputes">
                        <table class="repatertab" width="100%" cellpadding="5" cellspacing="5">
                        	
                              <tr>
                              	<td>
                                    	<label for="jcc_merchant_id">Merchant ID</label><br />
                                    	<input id="jcc_merchant_id" name="jcc_merchant_id" type="text" value="<?php echo $jcc_merchant_id; ?>" />
                                    </td>
                                    <td>
                                    	<label for="jcc_acquirer_id">Acquirer ID</label><br />
                                    	<input id="jcc_acquirer_id" name="jcc_acquirer_id" type="text" value="<?php echo $jcc_acquirer_id; ?>" />
                                    </td>
					</tr>
                              <tr>
                              	<td>
                                    	<label for="jcc_order_id">Order ID</label><br />
                                    	<input id="jcc_order_id" name="jcc_order_id" type="text" value="<?php echo $jcc_order_id; ?>" />
                                    </td>
                                    <td>
                                    	<label for="jcc_ref_no">Reference Number</label><br />
                                    	<input id="jcc_ref_no" name="jcc_ref_no" type="text" value="<?php echo $jcc_ref_no; ?>" />
                                    </td>
					</tr>
                              <tr>
                              	<td>
                                    	<label for="jcc_card_no">Padded Card Number</label><br />
                                    	<input id="jcc_card_no" name="jcc_card_no" type="text" value="<?php echo $jcc_card_no; ?>" />
                                    </td>
                                    <td>
                                    	<label for="jcc_auth_code">Authorization Code</label><br />
                                    	<input id="jcc_auth_code" name="jcc_auth_code" type="text" value="<?php echo $jcc_auth_code; ?>" />
                                    </td>
					</tr>
                              <tr>
                              	<td colspan="2">
                                    	<label for="jcc_response_sign">Response Signature</label><br />
                                    	<input id="jcc_response_sign" name="jcc_response_sign" type="text" value="<?php echo $jcc_response_sign; ?>" />
                                    </td>
					</tr>
                        
                        </table>                 
                  </div> 
            </div>         
	</p> 
<?php
}
add_action('save_post', 'jcc_detail_save');
function jcc_detail_save($post_id)
{
	$post = get_post( $post_id );
	if ($post->post_type == 'payment') 
	{  	
		update_post_meta($post->ID, 'jcc_merchant_id', $_POST['jcc_merchant_id']);
		update_post_meta($post->ID, 'jcc_acquirer_id', $_POST['jcc_acquirer_id']);
		update_post_meta($post->ID, 'jcc_order_id', $_POST['jcc_order_id']);
		update_post_meta($post->ID, 'jcc_ref_no', $_POST['jcc_ref_no']);
		update_post_meta($post->ID, 'jcc_card_no', $_POST['jcc_card_no']);
		update_post_meta($post->ID, 'jcc_auth_code', $_POST['jcc_auth_code']);
		update_post_meta($post->ID, 'jcc_response_sign', $_POST['jcc_response_sign']);
	} 
}
/*end of Meta Box for JCC detail*/


?>