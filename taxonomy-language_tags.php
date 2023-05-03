<?php
/**
 * The template for displaying Custom Tags
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clean
 */

get_header();
?>
<section class="category tag__section">
    <h1 class="employees_title">Tags Title</h1>
        <div class="content current_category_products">
            <span class="bc-circle aqua"></span>
                <span class="bc-circle pink"></span>
                    <span class="bc-circle big yellow"></span>
                        <span class="bc-circle big blue"></span>
            <?php if (woocommerce_product_loop()) { ?>
            <?php
                woocommerce_product_loop_start();
                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();
                        do_action('woocommerce_shop_loop');
                        wc_get_template_part('content', 'product');
                    }
                }
                woocommerce_product_loop_end();
                        do_action('woocommerce_after_shop_loop');
                } else {
                        do_action('woocommerce_no_products_found');
                }
            ?>
        </div>
</section>
<section id="footer_form_faq" class="padding-4r home-contact">
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="container">
                    <?php if( have_rows('footer_section', 'option') ): ?>
                    <?php while( have_rows('footer_section', 'option') ) : the_row(); ?>
                    <div class="form_question_container element-hidden">
                        <div class="form_container">
                            <div class="form_header">
                                <span>Leave your message</span>
                            </div>
                            <div class="form_content">
                                <div class="crm-form"></div>
                            </div>
                        </div>
                        <div class="question_container_heading">
                                <h2 class="form_title element-hidden">We’d Love to Hear from You!</h2>
                                <p class="form_subtitle element-hidden">If you have any questions or need any additional information, please leave your details and message, we will contact you as soon as possible</p>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
                </div>
                </div>
            </section>
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