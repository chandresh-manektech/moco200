<section class="col-md-12">
    <h3>Committee Contacts</h3>
    <div class="col-md-3">
        <div class="table-condensed">
            <table class="table">
                <caption>Bicentennial Co-Chairmen</caption>
                <tbody>
                    <tr>
                        <td>
                            Dennis Knobloch
                        </td>
                        <td>
                            <a href="mailto:moclerk@htc.net">moclerk@htc.net</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mike Kovarik
                        </td>
                        <td>
                            <a href="mailto:mekovarik@hotmail.com">mekovarik@hotmail.com</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="table-condensed">
            <table class="table">
                <caption>Special Events</caption>
                <tbody>
                    <tr>
                        <td>
                            Shawn Kennedy
                        </td>
                        <td>
                            <a href="mailto:skennedy@waterloo.il.us">skennedy@waterloo.il.us</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sarah Deutch
                        </td>
                        <td>
                            <a href="mailto:SDeutch@waterloo.il.us">SDeutch@waterloo.il.us</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="table-condensed">
            <table class="table">
                <caption>Public Relations</caption>
                <tbody>
                    <tr>
                        <td>
                            Sandy Benyo
                        </td>
                        <td>
                            <a href="mailto:benyo@htc.net">benyo@htc.net</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sevgi Kovarik
                        </td>
                        <td>
                            <a href="mailto:sev@gibaultonline.com">sev@gibaultonline.com</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        <div class="table-condensed">
            <table class="table">
                <caption>Website Feedback &amp; Suggestions</caption>
                <tbody>
                    <tr>
                        <td>
                            Lois Gregson
                        </td>
                        <td>
                            <a href="mailto:Gregson4@htc.net">Gregson4@htc.net</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Manav Misra
                        </td>
                        <td>
                            <a href="mailto:manavm@visionwebsoft.com">manavm@visionwebsoft.com</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

</main>

<footer>
    <?php
    if (has_nav_menu("footer_menu")) {
        wp_nav_menu(array(
            'theme_location' => "footer_menu",
            'menu_class' => 'list-inline',
            'container' => ''
        ));
    }
    ?>
    <small><?php echo get_option('footer_designby_text'); ?></small>
</footer>
</div>
<?php wp_footer(); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- Bootstrap minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.tooltipster.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".fancybox-button").fancybox({
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: true,
            helpers: {
                title: {type: 'inside'},
                buttons: {}
            }
        });
        jQuery(document).on('click', '.scroll_sec', function (event) {
            event.preventDefault();
            var target = "#" + this.getAttribute('data-target');
            jQuery('html, body').animate({
                scrollTop: jQuery(target).offset().top - 30
            }, 2000);
        });
        jQuery('.tooltip').tooltipster();
    });
</script>
</body>
</html>