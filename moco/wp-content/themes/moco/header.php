<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; minimum-scale=1.0; user-scalable=0;" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="handheldfriendly" content="true" />
        <meta name="MobileOptimized" content="width" />
            <title>
                <?php
                global $page, $paged;

                wp_title('-', true, 'right');

                bloginfo('name');

                $site_description = get_bloginfo('description', 'display');
                if ($site_description && ( is_home() || is_front_page() ))
                    echo " | $site_description";

                if ($paged >= 2 || $page >= 2)
                    echo ' | ' . sprintf(__('Page %s', 'mytheme'), max($paged, $page));
                ?>
            </title>
            <link rel="icon" type="image/png" href="<?php echo get_option('my_favicon_icon'); ?>"/>
            <link rel="profile" href="http://gmpg.org/xfn/11" />

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

            <!--- Theme CSS File --->
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

            <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox.css" type="text/css" />
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/tooltipster.css" type="text/css" />
            
            <!--- Font Awesome Icons Fonts and CSS --->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/FontAwesome.otf" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/fontawesome-webfont.woff2" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/fontawesome-webfont.woff" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/fontawesome-webfont.ttf" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/fontawesome-webfont.svg" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/fontawesome-webfont.eot" />
            
            <?php
            if (is_singular())
                wp_enqueue_script('comment-reply');
            wp_enqueue_script('jquery');
            wp_head();
            ?>

            <!-- HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!-- [if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <!-- [endif]-->
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <header style="margin: 0 -15px;">
                <?php $header_banner_image = get_option('header_banner_image'); ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="Monroe County Bicentennial 1816-2016 header graphic in black and gold with Benard MD Condensed font"
                                                                     src="<?php echo $header_banner_image; ?>" class="img-responsive"></a>
                <div class="nav-inner">
                    <nav>
                        <?php
                        if (has_nav_menu("header_menu")) {
                            wp_nav_menu(array(
                                'theme_location' => "header_menu",
                                'menu_class' => 'nav nav-pills',
                                'container' => ''
                            ));
                        } else {
                            wp_page_menu();
                        }
                        ?>
                    </nav>
                    <div class="social_icons pull-right">
                        <ul>
                            <li>
                                <a href="<?php echo get_option('facebook_val'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/fb.png" alt="Facebook link" width="29" height="29" class="img-rounded"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>