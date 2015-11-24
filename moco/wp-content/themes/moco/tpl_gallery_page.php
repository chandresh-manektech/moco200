<?php
/*
Template Name: Gallery Page
*/
session_start();

get_header();
?>

    <main class="row main-moco">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="gallery_section">
                    <ul>
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'galleries',
                            'post_status' => 'publish'
                        );
                        $gallery_pagination = get_posts($args);
                    $args = array(
                        'posts_per_page' => 9,
                        'post_type' => 'galleries',
                        'post_status' => 'publish',
                        'paged' => $paged
                    );
                        $gallery_posts = get_posts($args);
                        foreach ($gallery_posts as $post) {
                            $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'gal-thumb');
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            ?>
                            <li class="col-md-4 col-sm-4 col-xs-6 gallery_img" > <a ><img src="<?php echo $thumb_url[0]; ?>" alt="<?php echo basename($thumb_url[0]); ?>" /> </a>
                                <div class="content_hover">
                                    <a class="fancybox-button" href="<?php echo $image[0]; ?>" data-fancybox-group="gallery" title="<?php echo $post->post_title; ?>">
                                        <div class="inner_content">
                                        <div class="gallery_content">
                                            <span><?php echo $post->post_title; ?></span>
                                            <span class="search"><img src="<?php bloginfo('template_url'); ?>/images/search-icon.png" /></span>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
            <?php
                    $big = 999999999; // need an unlikely integer

                    $count = count($gallery_pagination);
                    $offset = 9;

                    $max = $count / $offset;
                    if (is_float($max)) {
                        $max = (int) $max + 1;
                    }

                    $mypagei = paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'prev_text' => __('<i class="fa fa-long-arrow-left"></i>'),
                        'next_text' => __('<i class="fa fa-long-arrow-right"></i>'),
                        'current' => max(1, get_query_var('paged')),
                        'total' => $max
                    ));
                    if ($mypagei != '') {
                        ?>
                        <div class="pagination">
                            <?php echo get_previous_posts_link('<i class="fa fa-long-arrow-left"></i>', $max); ?>
                            <?php // echo $mypagei; ?>                            
                            <?php echo get_next_posts_link('<i class="fa fa-long-arrow-right"></i>', $max); ?>
                        </div>   
                    <?php } ?>  
        </section>
        <?php
    endwhile;
else:
    ?>    
    <div class="error"><?php _e('Not found.'); ?></div> 
<?php endif; ?>
   

      

<?php get_footer(); ?>