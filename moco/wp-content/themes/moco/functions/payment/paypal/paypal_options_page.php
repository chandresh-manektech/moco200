<?php
add_action( 'admin_init', 'register_paypal_settings' );
function register_paypal_settings() 
{ 
    register_setting( 'my-own-theme-options-for-paypal', 'paypal_mode' );
    register_setting( 'my-own-theme-options-for-paypal', 'paypal_merchant_email' );
    register_setting( 'my-own-theme-options-for-paypal', 'paypal_success_page' );
    register_setting( 'my-own-theme-options-for-paypal', 'paypal_fail_page' );
}
function paypal_options_page() {
?>

<div class="wrap">
    <h2>Paypal Setting</h2>
    <?php settings_errors(); ?> 
    <form method="post" action="options.php">
        <?php settings_fields( 'my-own-theme-options-for-paypal' ); ?>
        <?php do_settings_sections( 'my-own-theme-options-for-paypal' ); ?>
        <?php include(get_template_directory() .'/functions/theme_option_page/bootstrap_theme_includes.php'); ?>
        <br />
        <div class="row">
            
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Paypal Details</h3>
                    </div>
                    <div class="panel-body">
                        
                        <label for="paypal_mode">Payment Mode</label>
                        
                        <br />
                        
                        <label for="demo_mode"> 
                            <input id="demo_mode" type="radio" value="sandbox" name="paypal_mode" class="form-control" <?php if(get_option('paypal_mode')=="sandbox") { ?> checked="checked" <?Php } ?> /> Sandbox
                        </label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="live_mode"> 
                            <input id="live_mode" type="radio" value="live" name="paypal_mode" class="form-control" <?php if(get_option('paypal_mode')=="live") { ?> checked="checked" <?Php } ?> /> Live
                        </label>
                        
                        <br />
                        <br />
                        
                        <div class="paypal_merchant_email_div" <?php if(get_option('paypal_mode')=="sandbox") { ?> style="display: none;" <?Php } ?> >
                            
                        <label for="paypal_merchant_email">Merchant Email</label>
                        <input id="paypal_merchant_email" type="text" name="paypal_merchant_email" value="<?php echo get_option('paypal_merchant_email'); ?>" class="form-control" />
                        
                        <br />
                        </div>
                        
                            <?php
                            $args = array(
                                'post_type' => 'page',
                                'post_status' => 'publish'
                            );
                            $pages = get_pages($args);
                            ?>
                            <?php $paypal_success_page = get_option('paypal_success_page'); ?>
                            
                        <label for="paypal_success_page">Success Page URL</label>
                        <select class="form-control" name="paypal_success_page" >
                            <option>Select</option>
                            <?php for($i = 0 ; $i < count($pages) ; $i++) {?>
                            <option value="<?php echo $pages[$i]->ID; ?>" <?php if($pages[$i]->ID==$paypal_success_page) {  ?> selected="selected" <?php } ?>  ><?php echo $pages[$i]->post_title; ?></option>
                            <?php } ?>
                        </select>
                        
                        <br />
                        
                        <label for="paypal_fail_page">Fail Page URL</label>
                            <?php $paypal_fail_page = get_option('paypal_fail_page'); ?>
                        <select class="form-control" name="paypal_fail_page" >
                            <option>Select</option>
                            <?php for($i = 0 ; $i < count($pages) ; $i++) {?>
                            <option value="<?php echo $pages[$i]->ID; ?>" <?php if($pages[$i]->ID==$paypal_fail_page) {  ?> selected="selected" <?php } ?>  ><?php echo $pages[$i]->post_title; ?></option>
                            <?php } ?>
                        </select>
                        
                        <br />
                        <script type="text/javascript">
                        jQuery(document).ready(function($){
                               $("input[name=paypal_mode]:radio").change(function () {
                                    if ($("#demo_mode").attr("checked")) {
                                        $( ".paypal_merchant_email_div" ).slideUp("slow");
                                    }
                                    else {
                                        $( ".paypal_merchant_email_div" ).slideDown("slow");
                                    }
                               });
                        });
                        </script>
                        
                    </div>
                </div>
            </div>
            
            <?php include get_template_directory() .'/functions/theme_option_page/option_page_sidebar.php'; ?>
            
        </div>
   
        <?php submit_button(); ?>
        
    </form>
</div>
<?php } 
/*My Theme Option*/
?>
