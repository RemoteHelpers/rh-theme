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
        <div class="menu">
            <?php 
                if (pll_current_language() == 'en') {
                    echo wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu' => 'Footer menu',
                            'menu_class' => 'footer-menu',
                        )
                    );
                } else if (pll_current_language() == 'de') {
                    echo wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu' => 'Footer menu de',
                            'menu_class' => 'footer-menu',
                            'menu_id' => 'menu-footer-menu',
                            'container_class' => 'menu-footer-menu-container',
                        )
                    );
                }
            ?>
        </div>
    </div>
    <div class="footer-icon">
        <?php get_template_part('/template-parts/contact-fixed') ?>
    </div>

</footer><!-- #colophon -->
<hr class="footer_hr">
<div class="footer-privacy-policy">
    <span>
        2018-<?php echo date("Y"); ?>
        <?php
            if (pll_current_language() == 'en') {
                echo "© All rights reserved";
            } else if (pll_current_language() == 'de') {
                echo "Alle Rechte vorbehalten";
            }
        ?>
    </span>
    <a href="<?php echo get_permalink(3) ?>" class="privacy-page">
        <?php
            if (pll_current_language() == 'en') {
                echo "Privacy Policy";
            } else if (pll_current_language() == 'de') {
                echo "Datenschutzrichtlinie";
            }
        ?>
    </a>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- <script type="text/javascript" src="//testnine.rh-s.com/en/widget.js"></script> -->
<!-- <script type="text/javascript" src="//chat.vamsite.today/widget.js"></script> -->


</body>
</html>