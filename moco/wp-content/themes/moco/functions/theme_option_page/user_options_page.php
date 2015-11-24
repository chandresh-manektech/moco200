<?php
add_action('admin_init', 'register_user_settings');

function register_user_settings() {
    register_setting('my-own-theme-options-for-user', 'reg_page_val');
    register_setting('my-own-theme-options-for-user', 'log_page_val');
    register_setting('my-own-theme-options-for-user', 'profile_page_val');
    register_setting('my-own-theme-options-for-user', 'forgotpass_page_val');
    register_setting('my-own-theme-options-for-user', 'logout_page_val');
}

function user_options_page() {
    ?>

    <div class="wrap">
        <h2>Contact Page</h2>
            <?php settings_errors(); ?> 
        <form method="post" action="options.php">
            <?php settings_fields('my-own-theme-options-for-user'); ?>
            <?php do_settings_sections('my-own-theme-options-for-user'); ?>
    <?php include('bootstrap_theme_includes.php'); ?>
            <br />
            <div class="row">

                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">User Pages</h3>
                        </div>
                        <div class="panel-body">

                            <label for="reg_page_val">Registration Page</label>
                            
                            <?php
                            $args = array(
                                'post_type' => 'page',
                                'post_status' => 'publish'
                            );
                            $pages = get_pages($args);
                            ?>
                            <?php $reg_page_val = get_option('reg_page_val'); ?>
                            
                            <select class="form-control" name="reg_page_val" >
                                <option>Select</option>
                                <?php for($i = 0 ; $i < count($pages) ; $i++) {?>
                                <option value="<?php echo $pages[$i]->ID; ?>" <?php if($pages[$i]->ID==$reg_page_val) {  ?> selected="selected" <?php } ?>  ><?php echo $pages[$i]->post_title; ?></option>
                                <?php } ?>
                            </select>
                            <br />
                            

                            <label for="log_page_val">Login Page</label>
                            <?php $log_page_val = get_option('log_page_val'); ?>
                            <select class="form-control" name="log_page_val" >
                                <option>Select</option>
                                <?php for($i = 0 ; $i < count($pages) ; $i++) {?>
                                <option value="<?php echo $pages[$i]->ID; ?>" <?php if($pages[$i]->ID==$log_page_val) {  ?> selected="selected" <?php } ?>  ><?php echo $pages[$i]->post_title; ?></option>
                                <?php } ?>
                            </select>
                            <br />
                            

                            <label for="profile_page_val">Profile Page</label>
                            <?php $profile_page_val = get_option('profile_page_val'); ?>
                            <select class="form-control" name="profile_page_val" >
                                <option>Select</option>
                                <?php for($i = 0 ; $i < count($pages) ; $i++) {?>
                                <option value="<?php echo $pages[$i]->ID; ?>" <?php if($pages[$i]->ID==$profile_page_val) {  ?> selected="selected" <?php } ?>  ><?php echo $pages[$i]->post_title; ?></option>
                                <?php } ?>
                            </select>
                            <br />

                            <label for="forgotpass_page_val">Forgot Password Page</label>
                            <?php $forgotpass_page_val = get_option('forgotpass_page_val'); ?>
                            <select class="form-control" name="forgotpass_page_val" >
                                <option>Select</option>
                                <?php for($i = 0 ; $i < count($pages) ; $i++) {?>
                                <option value="<?php echo $pages[$i]->ID; ?>" <?php if($pages[$i]->ID==$forgotpass_page_val) {  ?> selected="selected" <?php } ?>  ><?php echo $pages[$i]->post_title; ?></option>
                                <?php } ?>
                            </select>
                            <br />
                            
                            <label for="logout_page_val">Logout Page</label>
                            <?php $logout_page_val = get_option('logout_page_val'); ?>
                            <select class="form-control" name="logout_page_val" >
                                <option>Select</option>
                                <?php for($i = 0 ; $i < count($pages) ; $i++) {?>
                                <option value="<?php echo $pages[$i]->ID; ?>" <?php if($pages[$i]->ID==$logout_page_val) {  ?> selected="selected" <?php } ?>  ><?php echo $pages[$i]->post_title; ?></option>
                                <?php } ?>
                            </select>
                            <br />

                        </div>
                    </div>
                </div>

    <?php include 'option_page_sidebar.php'; ?>

            </div>

    <?php submit_button(); ?>

        </form>
    </div>
<?php
}

/* My Theme Option */
?>
