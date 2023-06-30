<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header();
///**
// * Hook: woocommerce_before_main_content.
// *
// * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
// * @hooked woocommerce_breadcrumb - 20
// * @hooked WC_Structured_Data::generate_website_data() - 30
// */
//do_action('woocommerce_before_main_content');
?>
<?php 
$term = get_queried_object();
// get category type
?>
<!-- START OF MAIN SHOP PAGE IF -->
<?php if (is_shop()): ?>
    <section class="employees_section">
        <span class="bc-circle aqua"></span>
        <span class="bc-circle pink"></span>
        <span class="bc-circle big blue"></span>
            <h1 class="employees_title"><?php echo get_field('employees_title', 'option'); ?></h1>
                <?php if( get_field('show_proposition_slider_employees', 'option') == 'Yes' ): ?>
                    <section class="category spacial_offer">
                        <?php if( have_rows('employees_page_proposition_slides', 'option') ): ?>
                            <?php  while( have_rows('employees_page_proposition_slides', 'option') ) : the_row(); ?>
                                <?php if(get_sub_field('proposition_background_gradient', 'option')) : ?>
                                    <div class="category__slider" style="<?php echo get_sub_field('proposition_background_gradient', 'option'); ?>">
                                <?php else: ?>
                                    <div class="category__slider">
                                <?php endif; ?>
                                        <div class="sl_title"><h2 class="slider_block__title"><?php echo get_sub_field('proposition_title', 'option'); ?></h2></div>
                                            <div class="sl_sub"><h3 class="slider_block__subtitle"><?php echo get_sub_field('proposition_description', 'option'); ?></h3></div>
                                                <div class="slider_block__btns">
                                                    <span class="slider_block__btns_text"><?php echo get_sub_field('proposition_price', 'option'); ?></span>
                                                    <button type="submit" class="slider_block__btn"><?php echo get_sub_field('proposition_button', 'option'); ?> <i class="fa-solid fa-arrow-right"></i></button>
                                                </div>
                                            <div class="category__slider_block slider__block_photo">
                                                <img src="<?php echo get_sub_field('proposition_image', 'option'); ?>" alt="">
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                    </section>
                    <?php endif; ?>
    </section>
        <?php if( get_field('show_proposition_slider_employees', 'option') == 'Yes' ): ?>
            <h2 class="section__title employees_subtitle"><?php echo get_field('employees_sub_title', 'option'); ?></h2>
            <?php endif; ?>
            <div class="content-with-sidebar">
                <div class="sidebar">
                    <div class="sticky-filter">
                         <?php echo do_shortcode('[pwf_filter id="323"]'); ?>
                    </div>
                    <div class="btn-container">
                        <div class="hide-btn only-desktop">
                            <i class="fa fa-filter"></i>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <span class="bc-circle pink"></span>
                    <span class="bc-circle big yellow"></span>
                    <span class="bc-circle big blue"></span>
					                    <!-- ya shop -->

                        <?php
                        if (woocommerce_product_loop()) {
                            woocommerce_product_loop_start();
                                if (wc_get_loop_prop('total')) {
                                    while (have_posts()) {
                                        the_post();
                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action('woocommerce_shop_loop');
                                        wc_get_template_part('content', 'product');
                                    }
                                }
                            woocommerce_product_loop_end();
                            /**
                             * Hook: woocommerce_after_shop_loop.
                             *
                             * @hooked woocommerce_.archive-pagepagination - 10
                             */
                            do_action('woocommerce_after_shop_loop');
                        } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action('woocommerce_no_products_found');
                        }
                        ?>
                </div>
            </div>
            <?php elseif (is_product_tag()): 
    
    get_template_part('/template-parts/employee-tag-page/employees-tag-page');

?>
<?php else: ?>
    <?php
        $parent = get_term($term->parent, get_query_var('taxonomy') );
        $children = get_term_children($term->term_id, get_query_var('taxonomy'));
        $maincategory = (sizeof((array)$children)>0);
        $subcategory = (sizeof((array)$children)==0);
    ?>
    <!-- SPARENT CATEGORY TEMPLATE -->
        <?php if($maincategory) : ?>
            <?php get_template_part('/woocommerce/archive-product-parent-category'); ?>
        <?php endif; ?>

    <!-- CHILD CATEGORY TMPLATE -->
        <?php if($subcategory) : ?>
            <?php get_template_part('/woocommerce/archive-product-child-category'); ?>
            <?php endif; ?>

<?php endif; ?>
<!-- END OF MAIN SHOP PAGE IF -->

<?php if (!is_shop()): ?>
    <?php if(!$subcategory) : ?>
        <?php
            $url = 'ulr';
        if($url === true ){
            echo 'true';
        }else{?>
        <?php }?>
        <?php endif; ?>
        <?php endif; ?>

    <script>
        document.querySelectorAll('.notcur').forEach(e => e.remove());
    </script>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
///**
// * Hook: woocommerce_sidebar.
// *
// * @hooked woocommerce_get_sidebar - 10
// */
//do_action('woocommerce_sidebar');
get_footer();