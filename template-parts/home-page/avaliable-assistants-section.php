<?php
/**
 * Template Assistants Slider Section on home page
 */
?>
<section class="padding-3 d-fl-colmn assistants">
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="section-title-box element-hidden" id="all-cvs">
                <h2 class="section-title"><?php the_field('assistants_title'); ?></h2>
                <span class="section-subtitle"><?php the_field('assistants_subtitle'); ?></span>
            </div>
            <!-- the cards loop -->
            <div class="card-container padding-3 element-hidden">
                <canvas class="canvas-bg"></canvas>
                <?php
                global $product;
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),
                    'meta_query' => array(
                        array(
                            'key' => '_stock_status',
                            'value' => 'instock'
                        )
                    )
                );
                woocommerce_product_loop_start();
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    do_action('woocommerce_shop_loop');
                    get_template_part('/woocommerce/content-product');
                endwhile;
                wp_reset_query();
                woocommerce_product_loop_end(); ?>
            </div>
            <a class="rh-button margin-auto link-button element-hidden" href='<?php echo get_site_url(); ?>/employees'>Watch all available employees</a>
</section>