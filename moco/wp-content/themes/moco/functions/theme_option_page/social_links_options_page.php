<?php
add_action( 'admin_init', 'register_mysocial_settings' );
function register_mysocial_settings() 
{ 
    register_setting( 'my-own-theme-options-for-social', 'developermode' );
    register_setting( 'my-own-theme-options-for-social', 'facebook_val' );  
}
function social_links_options_page() {
?>

<div class="wrap">
    <h2>Social Links</h2>
    <?php settings_errors(); ?> 
    <form method="post" action="options.php">
        <?php settings_fields( 'my-own-theme-options-for-social' ); ?>
        <?php do_settings_sections( 'my-own-theme-options-for-social' ); ?>
        <?php include('bootstrap_theme_includes.php'); ?>
        <br />
        <div class="row">
            
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Social Links</h3>
                    </div>
                    <div class="panel-body">
                        
                        <label for="facebook_val">Facebook</label>
                        <input id="facebook_val" type="text" name="facebook_val" value="<?php echo get_option('facebook_val'); ?>" class="form-control" />
                        
                        <br />
                        
                        <?php if(get_option('developermode')=='enable' OR $_GET['developermode']=='enable') { ?>
                        <br />
                        
                        <label for="developermode">
                            Developer Mode
                            <br />
                            <input style="margin: 0px;" <?php if(get_option('developermode')=='enable') { ?> checked="checked" <?php } ?> type="checkbox" name="developermode" id="developermode" value="enable" />
                            <span style="font-weight: normal;">Enable</span>
                        </label>
                        <?php } ?>
                        
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
