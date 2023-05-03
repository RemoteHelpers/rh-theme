<?php
$term = get_queried_object();
?>
<?php if(get_field('title_over_category_list', $term)) : ?> 
                                <section class="category categoty-grid">
                                    <span class="bc-circle aqua element-hidden"></span>
                                    <span class="bc-circle yellow element-hidden"></span>
                                    <span class="bc-circle pink element-hidden"></span>
                                    <span class="bc-circle big yellow element-hidden"></span>
                                    <span class="bc-circle big blue element-hidden"></span>
                                    <div class="category__subtabs">
                                        <?php 
                                        $prod_cat_args = array(
                                        'taxonomy'    => 'product_cat',
                                        'orderby'     => 'name', 
                                        'hide_empty'  => true,
                                        // 'parent'      => 0 //get parent category
                                        'parent'      => get_queried_object_id() //get subcategory
                                        );
                                            $woo_categories = get_categories( $prod_cat_args );
                                            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                foreach ( $woo_categories as $woo_cat ) {
                                                $woo_cat_id = $woo_cat->term_id;
                                                $woo_cat_name = $woo_cat->name;
                                                $woo_cat_slug = $woo_cat->slug;
                                                $woo_cat_descr = $woo_cat->description;
                                                $category_thumbnail_id = get_term_meta($woo_cat_id, 'thumbnail_id', true);
                                                $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);
                                                ?>
                                            <?php if($woo_cat->count > 0) { ?>
                                                <div class="category__subtabs_item element-hidden">
                                                    <div class="subtabs_item_header">
                                                        <div class="subtabs_item_header_img">
                                                            <?php
                                                                echo '<img class="lozad" data-src="' . $thumbnail_image_url . '"/>';
                                                            ?>
                                                        </div>
                                                            <?php
                                                                echo '<div class="subtabs_item_header_text">'. $woo_cat_name .'</div>';
                                                            ?>
                                                    </div>
                                                        <?php
                                                            echo '<a class="subtabs_item_hover" href="#'. $woo_cat_name .'">';
                                                            echo '<div class="subtabs_hover_text">More about ' . $woo_cat_name .'</div>';
                                                        ?>
                                                        <div>
                                                            <svg width="78" height="23" viewBox="0 0 78 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M77.0371 12.8124C77.6229 12.2266 77.6229 11.2768 77.0371 10.691L67.4911 1.14511C66.9054 0.55932 65.9556 0.55932 65.3698 1.14511C64.784 1.73089 64.784 2.68064 65.3698 3.26643L73.8551 11.7517L65.3698 20.237C64.784 20.8228 64.784 21.7725 65.3698 22.3583C65.9556 22.9441 66.9054 22.9441 67.4911 22.3583L77.0371 12.8124ZM0.0234375 13.2517H75.9764V10.2517H0.0234375V13.2517Z" fill="#0066CC"/>
                                                            </svg>
                                                        </div>
                                                            <?php
                                                            echo '</a>';
                                                            ?>
                                                </div>
                                            <?php } ?>
                                            <?php
                                                }
                                                ?>
                                    </div>
                                </section>
                                <?php endif; ?>
                            <section class="category__component">
                                    <div class="category__component component__section">
                                    </div>
                                </section>