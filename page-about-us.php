<?php
/**
 * Aboute Us page
 */

get_header();
?>
    <div class="about-us-page">

        <!-- Hero Outstaffing section template -->
        <?php get_template_part('/template-parts/about-us-page/hero-outstaffing-section'); ?>

        <!-- Founders and Managing Team section template -->
        <?php get_template_part('/template-parts/about-us-page/our-head-team'); ?>

        <!-- Our Clients section template -->
        <?php get_template_part('/template-parts/about-us-page/our-clients'); ?>

        <!-- Abouye us section template -->
        <?php get_template_part('/template-parts/about-us-page/aboute-us-info'); ?>

        <!-- Our Photo Gallery section template -->
        <?php get_template_part('/template-parts/about-us-page/our-gallery'); ?>

    </div>
<?php
get_footer();