<?php
add_action( 'admin_init', 'register_mymail_settings' );
function register_mymail_settings() 
{ 
    register_setting( 'my-own-theme-options-for-mymail', 'mymail_header' );
    register_setting( 'my-own-theme-options-for-mymail', 'mymail_footer' );
    register_setting( 'my-own-theme-options-for-mymail', 'mymail_register_con' );
    register_setting( 'my-own-theme-options-for-mymail', 'mymail_register_footer' );
	
}
function mail_section_options_page() {
?>

<div class="wrap">
    <h2>Mail Settings</h2>
    <?php settings_errors(); ?> 
    <form method="post" action="options.php">
        <?php settings_fields( 'my-own-theme-options-for-mymail' ); ?>
        <?php do_settings_sections( 'my-own-theme-options-for-mymail' ); ?>
        <?php include('bootstrap_theme_includes.php'); ?>
        <br />
        <div class="row">
            
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mail Section</h3>
                    </div>
                    <div class="panel-body">
                        <style type="text/css">
                                #mymail_header , #mymail_footer, #mymail_register_con , #mymail_quote_signed , #mymail_register_footer , #mymail_quote_signed_footer{
                                        height:150px;
                                }
                        </style>
                        
                        
                        <label for="mymail_header">Mail Header</label>
                        <p>Insert Mail Header Here</p>
                        <?php
                            $content = get_option('mymail_header');
                            $editor_id = 'mymail_header';
                            wp_editor( $content, $editor_id );
                        ?>
                        <br />
                        
                        
                        <label for="mymail_footer">Mail Footer</label>
                        <p>Insert Mail Footer Here</p>
                        <?php
                            $content = get_option('mymail_footer');
                            $editor_id = 'mymail_footer';
                            wp_editor( $content, $editor_id );
                        ?>
                        
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration Mail Content</h3>
                    </div>
                    <div class="panel-body">
                        
                        <label for="mymail_register_con">Registration Mail Top Content</label>
                        <p>Insert Registration Mail Top Content Here</p>
                        <?php
                            $content = get_option('mymail_register_con');
                            $editor_id = 'mymail_register_con';
                            wp_editor( $content, $editor_id );
                        ?>
                        <br />
                        <br />
                        
                        <label for="mymail_register_footer">Registration Mail Footer Content</label>
                        <p>Insert Registration Mail Footer Content Here for displaying after login details..</p>
                        <?php
                            $content = get_option('mymail_register_footer');
                            $editor_id = 'mymail_register_footer';
                            wp_editor( $content, $editor_id );
                        ?>  
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
