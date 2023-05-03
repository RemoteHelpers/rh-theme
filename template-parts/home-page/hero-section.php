<?php
/**
 * Template Hero Section on home page
 */
?>
<section class="hero">
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <div class="background-decoration element-hidden"></div>
            <!-- Words Text Slider -->
            <div class="cta">
                <h1>
                    <?php echo get_field('home_page_hero_heading') ?>
                    <div class="word-slider">
                        <?php
                        if (have_rows('word_slider')) :
                            $counter = 1;
                            while (have_rows('word_slider')) : the_row(); ?>
                                <div class="slide"><?php the_sub_field('word_slide'); ?></div>
                                <?php $counter++; ?>
                            <?php
                            endwhile;
                        endif
                        ?>
                    </div>
                </h1>
                <h2>
                    <?php the_field('home_page_hero_subtitle') ?><span><?php the_field('home_page_hero_subtitle_span') ?></span>
                </h2>
                <div class="action">
                    <div class="btn-wrapper">
                        <a class="rh-button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                            <?php echo do_shortcode('[product_count]') ?> available employees!
                        </a>
                    </div>
                </div>
            </div>
            <!-- Top 3 Reviewed Cards -->
            <div class="hero__right">
                <div class="hero__popular">
                    <?php
                    global $product;
                    $tax_query[] = array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN', // or 'NOT IN' to exclude feature products
                    );

                    $loop = new WP_Query( array(
                        'post_type'           => 'product',
                        'posts_per_page'      => 3,
                        'tax_query'           => $tax_query,
                        'meta_query' => array(
                            array(
                                'key' => '_stock_status',
                                'value' => 'instock'
                            )
                        )
                    ) );
                    while ($loop->have_posts()) : $loop->the_post();
                        do_action('woocommerce_shop_loop');

                        get_template_part('/woocommerce/content-product');

                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
</section>