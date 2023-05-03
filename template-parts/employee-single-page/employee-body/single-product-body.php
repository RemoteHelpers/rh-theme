<?php
/**
 * Templat part for displaying Employee body in single product page
 */

defined('ABSPATH') || exit;

global $product;

?>
<div class="product-body">

    <!--Breadcrumb -->
    <div class="only-desktop">
        <div class="breadcrumb-container">
            <div class="breadcrumb-window">
                <?php
                /**
                 * Hook: rh_before_product_body
                 *
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action('rh_before_product_body');
                ?>
            </div>
        </div>
    </div>

 
   <!-- Video interview section template-->
   <?php get_template_part('template-parts/employee-single-page/employee-body/body-sections/video-baner-section'); ?>

   <!-- About section template-->
   <?php get_template_part('template-parts/employee-single-page/employee-body/body-sections/about-employee-section'); ?>


    <section class="portfolios">

        <!-- Employee responibilities section template-->
        <?php get_template_part('template-parts/employee-single-page/employee-body/body-sections/responsibilities-section'); ?>

        <!-- Work experience section template-->
        <?php get_template_part('template-parts/employee-single-page/employee-body/body-sections/work-experience-section'); ?>

        <!-- Education section template-->
        <?php get_template_part('template-parts/employee-single-page/employee-body/body-sections/education-section'); ?>

        <!-- Portfolio section template-->
        <?php get_template_part('template-parts/employee-single-page/employee-body/body-sections/portfolio-section'); ?>

    </section>


    <!--===============
    // Comment section
    //================-->
    <section id="reviews">
        <div class="product-body-section-title red">
            <span>Reviews</span>
        </div>

        <?php
        comments_template('CV-comments.php');
        ?>

    </section>

</div>