<?php

if (isset($_GET['activated']) && is_admin()){
        /* Start of Home Page */
        $new_page_title = 'Home Page';
        $new_page_content = '';
        $new_page_template = 'tpl_home.php'; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                $new_page_url = get_permalink($new_page_id);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                update_option( "show_on_front","page" );
                update_option( "page_on_front",$new_page_id );
                $home_page = $new_page_id;
        }
        /* End of Home Page */
        
       
        /* Start of Registration Page */
        $new_page_title = 'Registration';
        $new_page_content = '';
        $new_page_template = 'tpl_registration.php'; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                update_option( "reg_page_val", $new_page_id );
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);                
                }
                $register_page = $new_page_id;
        }
        /* End of Registration Page */
        
        
        
        /* Start of Login Page */
        $new_page_title = 'Login';
        $new_page_content = '';
        $new_page_template = 'tpl_login.php'; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                update_option( "log_page_val", $new_page_id );
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $login_page = $new_page_id;
        }
        /* End of Login Page */
        
        /* Start of Profile Page */
        $new_page_title = 'Profile';
        $new_page_content = '';
        $new_page_template = 'tpl_userprofile.php'; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                update_option( "profile_page_val", $new_page_id );
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $profile_page = $new_page_id;
        }
        /* End of Profile Page */
        
        /* Start of Logout Page */
        $new_page_title = 'Logout';
        $new_page_content = '';
        $new_page_template = 'tpl_logout.php'; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                update_option( "logout_page_val", $new_page_id );
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $logout_page = $new_page_id;
        }
        /* End of Logout Page */
        
        /* Start of Forgot Password Page */
        $new_page_title = 'Forgot Password';
        $new_page_content = '';
        $new_page_template = 'tpl_forgotpass.php'; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                update_option( "forgotpass_page_val", $new_page_id );
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $forgotpass = $new_page_id;
        }
        /* End of Forgot Password Page */
        
        /* Start of Blog Page */
        $new_page_title = 'Blogs';
        $new_page_content = '';
        $new_page_template = 'tpl_bloglisting.php'; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $blog_page = $new_page_id;
        }
        /* End of Blog Page */
        
                
        /* Start of Contact Page */
        $new_page_title = 'Contact Us';
        $new_page_content = '';
        $new_page_template = ''; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $contact_page = $new_page_id;
        }
        /* End of Contact Page */
        
                
        /* Start of About Page */
        $new_page_title = 'About Us';
        $new_page_content = '';
        $new_page_template = ''; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $about_page = $new_page_id;
        }
        /* End of About Page */
               
        /* Start of Terms And Conditions Page */
        $new_page_title = 'Terms And Conditions';
        $new_page_content = '';
        $new_page_template = ''; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $terms_page = $new_page_id;
        }
        /* End of Terms And Conditions Page */
               
        /* Start of Privacy Policy Page */
        $new_page_title = 'Privacy Policy';
        $new_page_content = '';
        $new_page_template = ''; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $privacy_page = $new_page_id;
        }
        /* End of Privacy Policy Page */
        
        /* Start of FAQ Page */
        $new_page_title = 'FAQ';
        $new_page_content = '';
        $new_page_template = ''; 
        //don't change the code bellow, unless you know what you're doing
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
                $faq_page = $new_page_id;
        }
        /* End of FAQ Page */
        
        
        

        $run_once = get_option('menu_check');
//        if (!$run_once){
        
            /* Start Of Header Menu */
            $name = 'Header Menu';
            //create the menu
            $menu_id = wp_create_nav_menu($name);
            
            $mymenu = wp_get_nav_menu_object("Header Menu");
            $menuID = (int) $mymenu->term_id;
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $home_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $home_page ),
                                'menu-item-url' => get_permalink($home_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $blog_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $blog_page ),
                                'menu-item-url' => get_permalink($blog_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $about_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $about_page ),
                                'menu-item-url' => get_permalink($about_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $contact_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $contact_page ),
                                'menu-item-url' => get_permalink($contact_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            update_option('menu_check', true);
            
            $locations = get_theme_mod('nav_menu_locations');
            $locations['header_menu'] = $menuID;  //$menuID is term_id of menu
            set_theme_mod('nav_menu_locations', $locations);
            /* End Of Header Menu */
            
            
            /* Start Of Footer Menu */
            $name = 'Footer Menu';
            //create the menu
            $menu_id = wp_create_nav_menu($name);
            
            $mymenu = wp_get_nav_menu_object("Footer Menu");
            $menuID = (int) $mymenu->term_id;
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $home_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $home_page ),
                                'menu-item-url' => get_permalink($home_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $about_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $about_page ),
                                'menu-item-url' => get_permalink($about_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $faq_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $faq_page ),
                                'menu-item-url' => get_permalink($faq_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $privacy_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $privacy_page ),
                                'menu-item-url' => get_permalink($privacy_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $terms_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $terms_page ),
                                'menu-item-url' => get_permalink($terms_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            update_option('menu_check', true);
            
            $locations = get_theme_mod('nav_menu_locations');
            $locations['footer_menu'] = $menuID;  //$menuID is term_id of menu
            set_theme_mod('nav_menu_locations', $locations);
            /* End Of Footer Menu */
            
            
            
            
            /* Start Of Register Menu*/
            $name = 'Register Menu';
            //create the menu
            $menu_id = wp_create_nav_menu($name);
            
            $mymenu = wp_get_nav_menu_object("Register Menu");
            $menuID = (int) $mymenu->term_id;
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $register_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $register_page ),
                                'menu-item-url' => get_permalink($register_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $login_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $login_page ),
                                'menu-item-url' => get_permalink($login_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            update_option('menu_check', true);
            $locations = get_theme_mod('nav_menu_locations');
            $locations['user_reg_menu'] = $menuID;  //$menuID is term_id of menu
            set_theme_mod('nav_menu_locations', $locations);
            /* End Of Register Menu */
            
            
            /* Start Of Profile Menu*/
            $name = 'Profile Menu';
            //create the menu
            $menu_id = wp_create_nav_menu($name);
            
            $mymenu = wp_get_nav_menu_object("Profile Menu");
            $menuID = (int) $mymenu->term_id;
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $profile_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $profile_page ),
                                'menu-item-url' => get_permalink($profile_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
            
            $itemData = array(
                                'menu-item-db-id' => 0,
                                'menu-item-object-id' => $logout_page,
                                'menu-item-object' => 'page',
                                'menu-item-type'  => 'post_type',
                                'menu-item-parent-id' => 0,
                                'menu-item-title' => get_the_title( $logout_page ),
                                'menu-item-url' => get_permalink($logout_page),
                                'menu-item-status' => 'publish',
                        );
            $thisMenuItem = wp_update_nav_menu_item($menuID, 0, $itemData);
                        
            update_option('menu_check', true);
            $locations = get_theme_mod('nav_menu_locations');
            $locations['user_profile_menu'] = $menuID;  //$menuID is term_id of menu
            set_theme_mod('nav_menu_locations', $locations);
            /* End Of Profile Menu */
            
//        }      
            
            
}
