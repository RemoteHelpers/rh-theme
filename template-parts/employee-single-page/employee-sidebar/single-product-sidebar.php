<?php
/**
 * Template part for displaying sidebar in single product page
 */

defined('ABSPATH') || exit;

global $product;
?>

<div class="product-sidebar">

    <div class="sticky-sidebar">
        <span class="bc-circle blue"></span>
        <div class="only-mobile">
            <div class="breadcrumb-container">
                <div class="breadcrumb-arrow-left"><i class="fas fa-chevron-left"></i></div>
                <div class="breadcrumb-window">
                    <?php
                    /**
                     * Hook: rh_before_product_meta
                     *
                     * @hooked woocommerce_breadcrumb - 20
                     */
                    do_action('rh_before_product_meta');
                    ?>
                </div>
                <div class="breadcrumb-arrow-right"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>

        <!-- Hero meta section template-->
        <?php get_template_part('template-parts/employee-single-page/employee-sidebar/sidebar-sections/hero-meta-section'); ?>

        <!-- Languages section template-->
        <?php get_template_part('template-parts/employee-single-page/employee-sidebar/sidebar-sections/languages-section'); ?>

        <!-- Skils section template-->
        <?php get_template_part('template-parts/employee-single-page/employee-sidebar/sidebar-sections/skills-section'); ?>


        <!-- Order Epmloyee section -->
        <div class="product-price-and-buttons">
            <h4>Employment configurator</h4>
            <?php
                // woocommerce hook for buttons and price
                do_action( 'woocommerce_single_product_summary' );
            ?>
            <div class="bc-circle yellow"></div>
            <div class="bc-circle yellow"></div>
        </div>
    </div>
</div>