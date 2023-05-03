<?php
/**
 * Template All Stuff categories Section on home page
 */
?>
<section class="padding-3 staff">
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="background-decoration element-hidden"></div>
                <div class="section-title-box element-hidden">
                    <h2 class="section-title">Choose remote staff in different categories</h2>
                </div>
            <div class="category_section">
            <?php
                $terms = get_terms(['taxonomy' => 'product_cat','hide_empty' => true, 'parent' => 0]);
                foreach ($terms as $term ) {
                    $cat_id = $term->term_id;

                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $cat_id,
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
                    
                    if ( $products->have_posts() ) {
                        // category has in-stock products
                        $cat_name = $term->name;
                        $cat_descr = $term->description;
                        $category_thumbnail_id = get_term_meta($cat_id, 'thumbnail_id', true);
                        $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
                        $link = get_term_link( $cat_id, 'product_cat' );
                        $termsubcat = get_terms('product_cat',array('hide_empty' => true, 'child_of' => $cat_id));
                        echo '<div class="category_block_wrapper">';
                        echo '<div class="category_main_info">';
                        if($term->slug == 'sales'){
                            foreach ($termsubcat as $subcat ) {
                            $subcat_id = $subcat->term_id;
                            $subcat_name = $subcat->name;
                            $subcat_descr = $subcat->description;
                            $sublink = get_term_link( $subcat_id, 'product_cat' );
                            $subcategory_thumbnail_id = get_term_meta($subcat_id, 'thumbnail_id', true);
                            $subthumbnail_image_url = wp_get_attachment_url($subcategory_thumbnail_id);
                            echo '<a class="categoty_link" href="' . $sublink . '">';
                            echo '<div class="staff__image-container">';
                            echo '<img class="lozad" data-src="' . $subthumbnail_image_url . '"/>';
                            echo '</div>';
                            echo '<span class="card__title">' . $subcat_name . '</span>';
                            echo '</a>';
                            echo '<p class="cat-desc">' . $subcat_descr . '</p>';
                            }
                        } else {
                            echo '<a class="categoty_link" href="' . $link . '">';
                            echo '<div class="staff__image-container">';
                            echo '<img class="lozad" data-src="' . $thumbnail_image_url . '"/>';
                            echo '</div>';
                            echo '<span class="card__title">'. $cat_name .'</span>';
                            echo '</a>';
                            echo '<p class="cat-desc">'. $cat_descr .'</p>';
                        }
                        $termsubcat = get_terms('product_cat',array('hide_empty' => true, 'child_of' => $cat_id));
                        echo '<ul class="staff__card-tags">';
                        foreach ($termsubcat as $subcat ) {
                            $subcat_id = $subcat->term_id;
                            $subcat_name = $subcat->name;
                            $sublink = get_term_link( $subcat_id, 'product_cat' );
                            echo '<li class="staff__card-tags-item"><a href="' . $sublink . '">' . $subcat_name . '</a></li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                        $args = array(
                            'post_type' => 'product',
                            'product_cat'    => $cat_name,
                            'meta_query' => array(
                                array(
                                    'key' => '_stock_status',
                                    'value' => 'instock'
                                )
                            )
                        );
                        echo '<div class="category-home-slider">';
                        woocommerce_product_loop_start();
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        global $product; 
                        get_template_part('/woocommerce/content-product');
                        endwhile;
                        wp_reset_query();
                        woocommerce_product_loop_end();
                        echo '</div>';
                        echo '</div>';
                        
                    }
                }
            ?>
            </div>    
</section>