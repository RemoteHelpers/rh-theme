<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clean
 */

get_header();

$term = get_queried_object();
$circle_bg = get_field('circle_background');
acf_localize_data(array('circleQuantity' => $circle_bg));

?>
 <main>
    <!-- Hero section template -->
    <?php get_template_part('/template-parts/home-page/hero-section'); ?>

    <!-- Avaliable assistants template slider -->
    <?php get_template_part('/template-parts/home-page/avaliable-assistants-section'); ?>

    <!-- Staff categories template -->
    <?php get_template_part('/template-parts/home-page/stuff-categories-section'); ?>

    <!-- Blog section template -->
    <?php get_template_part('/template-parts/home-page/blog-section'); ?>

    <!-- Testimonials section template -->
    <?php get_template_part('/template-parts/home-page/testimonials-section'); ?>
    
 </main>
<?php

get_footer();