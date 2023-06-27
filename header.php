<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clean
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed%3Awght%40300&amp;display=swap&amp;ver=1.1" rel="preload" as="style" onload="this.rel='stylesheet'">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800;900&amp;display=fallback" rel="preload" as="style" onload="this.rel='stylesheet'">
    <link href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css?ver=1.1" rel="preload" as="style" onload="this.rel='stylesheet'">
    <?php wp_head();?>
</head>
<body <?php body_class();?>> <?php wp_body_open();?>

<div id="page" class="site">
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i>&nbsp;UP</button>
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'clean');?></a>
    <div class="background-header <?php if (is_front_page()) echo 'black-header'; ?>">
        <header id="masthead" class="site-header">
            <section class="site-branding">
                    <?php echo get_custom_logo();?>
            </section>
            <nav id="site-navigation" class="main-navigation">
                <div class="menu-cart-btn
                <?php
                $cart_contents = WC()->cart->get_cart_contents_count();
                if (is_front_page()) echo 'cart-dark-theme ';
                if (!$cart_contents == 0) echo 'cart-not-empty'
                ?>" id="menu-cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="counter" style="display: none;"></span>
                </div>
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu' => 'Main-header-menu',
                        'menu_class' => 'main-menu',
                    )
                );
                ?>
                
                <li id="header-social-icons">
                    <?php
                    if (have_rows('soc_media', 'option')) :
                        while (have_rows('soc_media', 'option')) : the_row();
                            ?>
                            <!-- <a href="<?php the_sub_field('contact_link'); ?>">
                                <i class="<?php the_sub_field('icon'); ?>"></i></a> -->
                        <?php
                        endwhile;
                    endif;
                    ?>
                </li>
               
            </nav>
            
        </header>
        <div class="widget_shopping_cart_content" id="mini-cart"><?woocommerce_mini_cart();?></div>
        <!-- <div class="lang-switcher"><?php pll_the_languages( array( 'dropdown' => 1 ) ); ?></div> -->
        <div class="social__fixed">
            <?php
            if (have_rows('fixed_social', 'option')) :
                while (have_rows('fixed_social', 'option')) : the_row();
                    ?>
                    <a href="<?php the_sub_field('social_fixed_link'); ?>" class="social__item">
                        <i class="<?php the_sub_field('social_fixed_icon'); ?>"></i>
                    </a>
                <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
    