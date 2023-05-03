<?php
/**
 * Template Child Categories Rewiew Section of Parent Category
 */
?>
<?php
    $prod_cat_args = array(
        'taxonomy'    => 'product_cat',
        'orderby'     => 'name', 
        'hide_empty'  => true,
        // 'parent'      => 0 //get parent category
        'parent'      => get_queried_object_id() //get subcategory
        );
        $woo_categories = get_categories( $prod_cat_args );
        foreach ( $woo_categories as $woo_cat ) {
            $woo_cat_id = $woo_cat->term_id;

            //Check Category if contains only out of stock products
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $woo_cat_id,
                    )
                ),
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock',
                    )
                )
            );

            $products = new WP_Query( $args );

            // category has in-stock products
            if ( $products->have_posts() ) {
                ?>
                    <?php if($woo_cat->count > 0) { ?>
                        <?php if(get_field('subcategory_title', 'category_'.$woo_cat_id)) : ?> 
                            <section class="category__component">
                                <div class="category__component component__section">
                                    <?php $prodcategory = get_field('subcategoty_employees_slider', 'category_'.$woo_cat_id);?>
                                        <div class="category__repiater" id="<?php echo ( $term_name = get_term( $prodcategory )->name ); ?>">
                                            <div class="component__hero">
                                                <div class="component__block component__textbox element-hidden">
                                                    <div class="component_container">
                                                        <div class="component__title">
                                                            <div class="title__icon">
                                                                <?php
                                                                    $thumb_sub = get_term_meta( $prodcategory, 'thumbnail_id', true );
                                                                    $images_sub = wp_get_attachment_url( $thumb_sub );
                                                                    $link = get_term_link( $woo_cat_id, 'product_cat' );
                                                                ?>
                                                                    <img class="lozad" data-src="<?php echo $images_sub ?> " alt="category">
                                                            </div>
                                                            <div class="title__text">
                                                                <?php echo get_field('subcategory_title', 'category_'.$woo_cat_id); ?>
                                                            </div>
                                                        </div>
                                                            <?php if( get_field('show__hide_description', 'category_'.$woo_cat_id) == 'show' ): ?> 
                                                                <div class="component__subtitle">
                                                                    <?php echo get_field('subcategory_description', 'category_'.$woo_cat_id); ?>
                                                                </div>
                                                                <?php endif; ?> 
                                                            <?php if( get_field('show__hide_responsibilites_tags', 'category_'.$woo_cat_id) == 'show' ): ?> 
                                                                <div class="component__sub_respons_tags">
                                                                    <p class="component__sub_respons_tags_list">
                                                                        <?php
                                                                        $args = array(
                                                                            'post_type' => 'product',
                                                                            'numberposts' => -1,
                                                                            'post_status' => 'publish',
                                                                            'fields'      => 'ids',
                                                                            'tax_query' => array(
                                                                            array(
                                                                                'taxonomy' => 'product_cat',
                                                                                'terms'     =>  $woo_cat_id,
                                                                                'operator' => 'IN',
                                                                                )
                                                                            )
                                                                        );
                                                                            $products = new WP_Query($args);
                                                                            $ids = $products->posts;
                                                                            $respons = array();
                                                                                foreach ( $ids as $id ) {
                                                                                    $detail = wc_get_product( $id );
                                                                                    $current_id = $detail->get_id();
                                                                                    ?>
                                                                                    <?php if (!empty(have_rows('work_experience', $current_id))): ?>
                                                                                        <?php if (have_rows('work_experience', $current_id)) : ?>
                                                                                            <?php while (have_rows('work_experience', $current_id)) : the_row(); ?>
                                                                                                <?php if (!empty(have_rows('features', $current_id))): ?>
                                                                                                    <?php while( have_rows('features', $current_id)) : the_row(); ?>
                                                                                                        <?php $all_respons = get_sub_field('feature_item', $current_id);?>
                                                                                                        <?php array_push($respons, $all_respons); ?>
                                                                                                    <?php endwhile; ?>
                                                                                                <?php endif ?>
                                                                                            <?php endwhile; ?>
                                                                                        <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                    <?php
                                                                                }
                                                                                    $unic_respons = array_unique($respons);
                                                                                    $list_comma = implode(', ', $unic_respons) . '.';
                                                                                    print_r($list_comma);
                                                                                    ?>
                                                                    </p>
                                                                </div>
                                                                <?php endif; ?> 
                                                                <div class="component__btn">
                                                                    <a href="<?php echo $link; ?>"><?php echo get_field('subcategory_button', 'category_'.$woo_cat_id); ?></a>
                                                                </div>
                                                    </div>
                                                </div>


                                                <div class="component__block component__slider element-hidden dub_slider_wrap">
                                                        <div class="component_cards_slider element-hidden">
                                                            <?php echo do_shortcode('[products class="instock" category="' . $prodcategory . '"]'); ?> 
                                                        </div> 
                                                    <?php $product_cats = wp_get_post_terms( $prodcategory, 'product_cat' );?>  
                                                </div>




                                            </div>







                                                <!-- //FORM UNDER SLIDER BLOCK -->
                                                    <!-- <?php if( get_field('sub_view_form', 'category_'.$woo_cat_id) == 'Show' ): ?> 
                                                            <div class="component__email">
                                                                <div class="email__title element-hidden">
                                                                <?php the_field('middle_email_form_title', 'option', $term); ?>
                                                                </div>
                                                                <div class="email__form element-hidden">
                                                                    <input type="email" name="" id="" placeholder="Your Email adress">
                                                                    <button type="submit"><?php the_field('middle_email_form_button', 'option', $term); ?></button>
                                                                </div>
                                                                </div>
                                                                <?php endif; ?> -->
                                        </div>
                                </div>
                            </section>
                            <?php endif; ?> 
                    <?php
                    }
                

            }





        }
    ?>