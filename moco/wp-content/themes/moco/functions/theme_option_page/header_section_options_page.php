<?php 
add_action( 'admin_init', 'register_myheader_settings' );
function register_myheader_settings() 
{
    register_setting( 'my-own-theme-options-for-header', 'logo_image' );
    register_setting( 'my-own-theme-options-for-header', 'my_favicon_icon' );
    register_setting( 'my-own-theme-options-for-header', 'header_banner_image' ); 
    register_setting( 'my-own-theme-options-for-header', 'google_analytics_val' );
}
function header_section_options_page() {
?>

<div class="wrap">
    <h2>Header Section</h2>
    <?php settings_errors(); ?> 
    <form method="post" action="options.php">
        <?php settings_fields( 'my-own-theme-options-for-header' ); ?>
        <?php do_settings_sections( 'my-own-theme-options-for-header' ); ?>
        <?php include('bootstrap_theme_includes.php'); ?>
        <br />
        <div class="row">
            
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Header Options</h3>
                    </div>
                    
                    <div class="panel-body">
                        
                        
                        
                        <label style="width: 100%;" for="upload_image">Logo Image</label>
                        <?php echo my_image_uploader('logo_image', 'Upload Image'); ?>
                        
                        <br />
                        <br />
                        
                        <label style="width: 100%;" for="upload_image">Favicon Icon</label>                            
                        <?php echo my_image_uploader('my_favicon_icon', 'Upload Image'); ?>
                        
                       
                        <br />
                        <br />
                        
                        <label style="width: 100%;" for="header_banner_image">Header Banner Image</label>                            
                        <?php echo my_image_uploader('header_banner_image', 'Upload Image'); ?>
                        
                       
                        <br />
                        <br />
                        
                        <label for="google_analytics_val">Google Analytics Code</label>
                        <textarea class="form-control"  id="google_analytics_val" type="text" name="google_analytics_val"><?php echo get_option('google_analytics_val'); ?></textarea>
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
