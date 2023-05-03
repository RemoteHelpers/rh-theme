<?php
/**
 * Template Employees List of Child Category
 */
$term = get_queried_object();
$sub_tag_title= get_field('sub_heading', $term);
$sub_tag_subtitle= get_field('sub_description', $term);
?>
        <?php
            // SHOW FILTER ONLY OF HAVE PRODUCTS
                if (woocommerce_product_loop()) {
                    if (wc_get_loop_prop('total')) {
                        if (have_posts()) {
                            ?>
                            <div class="content-with-sidebar">
                                <div class="sidebar">
                                    <div class="sticky-filter">
                                        <?php echo do_shortcode('[pwf_filter id="3144"]'); ?>
                                    </div>
                                    <div class="btn-container">
                                        <div class="hide-btn only-desktop">
                                            <i class="fa fa-filter"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                } else {
                                ?>
                                <!-- PRODUCT LOOP OF CURRENT CATEGORY -->
                                <div class="content">
                                <?php
                                }}} 
                                ?>
                                    <div class="content current_category_products">
                                        <span class="bc-circle aqua"></span>
                                        <span class="bc-circle pink"></span>
                                        <span class="bc-circle big yellow"></span>
                                        <span class="bc-circle big blue"></span>
                                        <?php
                                        if (woocommerce_product_loop()) {
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
                                            // do_action('woocommerce_no_products_found');
                                        ?>
                                            <div class="no_products">
                                                <h3><?php echo get_field('no_employees_title', 'option'); ?></h3>
                                                <h4><?php echo get_field('no_employees_subtitle', 'option'); ?></h4>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>