<?php
add_action( 'admin_init', 'register_contact_settings' );
function register_contact_settings() 
{ 
    register_setting( 'my-own-theme-options-for-contact', 'contact_tel_val' );
    register_setting( 'my-own-theme-options-for-contact', 'contact_mob_val' );
    register_setting( 'my-own-theme-options-for-contact', 'contact_fax__val' );
    register_setting( 'my-own-theme-options-for-contact', 'contact_email_val' );
    register_setting( 'my-own-theme-options-for-contact', 'contact_add_val' ); 
}
function contact_options_page() {
?>

<div class="wrap">
    <h2>Contact Page</h2>
    <?php settings_errors(); ?> 
    <form method="post" action="options.php">
        <?php settings_fields( 'my-own-theme-options-for-contact' ); ?>
        <?php do_settings_sections( 'my-own-theme-options-for-contact' ); ?>
        <?php include('bootstrap_theme_includes.php'); ?>
        <br />
        <div class="row">
            
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contact Details</h3>
                    </div>
                    <div class="panel-body">
                        
                        <label for="contact_tel_val">Telephone</label>
                        <input id="contact_tel_val" type="text" name="contact_tel_val" value="<?php echo get_option('contact_tel_val'); ?>" class="form-control" />
                        
                        <br />
                        
                        <label for="contact_mob_val">Mobile</label>
                        <input id="contact_mob_val" type="text" name="contact_mob_val" value="<?php echo get_option('contact_mob_val'); ?>" class="form-control" />
                        
                        <br />
                        
                        <label for="contact_fax__val">FAX</label>
                        <input id="contact_fax__val" type="text" name="contact_fax__val" value="<?php echo get_option('contact_fax__val'); ?>" class="form-control" />
                        
                        <br />
                        
                        <label for="contact_email_val">Contact Email</label>
                        <input id="contact_email_val" type="text" name="contact_email_val" value="<?php echo get_option('contact_email_val'); ?>" class="form-control" />
                        
                        <br />
                        
                        <label for="contact_add_val">Address</label>
                        <textarea class="form-control"  id="contact_add_val" type="text" name="contact_add_val"><?php echo get_option('contact_add_val'); ?></textarea>
                        <br />
                        
                    </div>
                </div>
            </div>
            
            <?php include 'option_page_sidebar.php'; ?>
            
        </div>
   
        <?php submit_button(); ?>
        
    </form>
</div>
<?php } 
/*My Theme Option*/
?>
