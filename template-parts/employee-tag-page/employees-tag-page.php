<?php
/**
 * Template Employees Tag Page
 */
$term = get_queried_object();
$tag_title= get_field('title-tag-page', $term);
$tag_subtitle= get_field('description-tag-page', $term);
?>
    <section class="category tag__section">
        <?php if($tag_title) : ?>
            <h1 class="category__title tag_title"><?php echo $tag_title; ?></h1>
                <p class="category__subtitle tag_sub"><?php echo $tag_subtitle; ?></p>
        <?php else: ?>
            <h1 class="employees_title"><?php echo get_field('employees_title', 'option'); ?></h1>
        <?php endif; ?>
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