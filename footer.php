<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clean
 */

?>





<footer id="colophon" class="site-footer">
    <div class="footer-logo"><?php the_custom_logo() ?></div>
    <div class="bottom-menu">
        <div class="menu"><?php wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu' => 'Footer menu',
                    'menu_class' => 'footer-menu',
                )
            ) ?>
        </div>
    </div>
    <div class="footer-icon">
        <?php get_template_part('/template-parts/contact-fixed') ?>
    </div>

</footer><!-- #colophon -->
<hr class="footer_hr">
<div class="footer-privacy-policy">
    <span>2018-<?php echo date("Y"); ?> © All rights reserved</span>
    <a href="<?php echo get_permalink(3) ?>" class="privacy-page">Privacy Policy</a>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

 <script type="text/javascript" src="//videochat.rhelpers.com/widget.js"></script>
<!-- <script type="text/javascript" src="//chat.vamsite.today/widget.js"></script> -->


</body>
</html>