<?php
/**
 * Template Pricing Cards of Child Category
 */
$term = get_queried_object();
$sub_pricing_title = get_field('pricing_section_title', $term)
?>
<?php 
    $term = get_queried_object();
        $parent_id = $term->parent;
            function get_product_category_by_id( $category_id ) {
                $term = get_term_by( 'id', $category_id, 'product_cat', 'ARRAY_A' );
                return $term['name'];
            }
                $product_category = get_product_category_by_id( $parent_id );
                $product_subcategory = $term->slug;
                $sub_pricing_title = get_field('pricing_section_title', $term);
                ?>
    <!-- PRICING CARD OF CHILD CATEGORY -->
    <section id="pricing-cards" class="<?php echo ($product_category); ?>-category">
        <span class="bc-circle aqua-pricng1"></span>
        <span class="bc-circle aqua-pricng2"></span>
        <span class="bc-circle violet-pricng"></span>
        <span class="bc-circle blue-pricng"></span>
        <span class="bc-circle yellow-pricng"></span>
            <h2 class="pricing-cards__title"><?php echo $sub_pricing_title; ?></h2>
                <div class="pricing-cards-wrapper">
                    <?php if( have_rows('subcategory_pricng_cards_repeater', 'option') ):  ?>
                        <?php  while( have_rows('subcategory_pricng_cards_repeater', 'option') ) : the_row(); ?>
                            <article class="price-card <?php  $curentcat = get_sub_field('subcategory_name', 'option'); 
                                if (strnatcmp($curentcat, $product_subcategory) !==0 ) {
                                    echo 'notcur'; 
                                };
                                ?> 
                                <?php echo get_sub_field('subcategory_name', 'option'); ?>" id="<?php echo get_sub_field('subcategory_name', 'option'); ?>-parttime">    
                                    <header>
                                        <h3 class="pricing-card-name">Part-time</h3>
                                    </header>
                                        <div class="pricing-card-body">
                                            <h5 class="price-card__price-month"><?php echo get_field('currency', 'option');?> <?php echo get_sub_field('part-time_price', 'option');?><span class="price-small-postfix">/month</span></h5>
                                                <h6 class="price-card__price-hour">or just <?php echo get_field('currency', 'option');?><?php $partHour = get_sub_field('part-time_price', 'option'); echo $partHour / 80;?> per hour</h6>
                                        </div>   
                                    <footer>
                                        <h5 class="price-card__description"><?php echo get_field('description_part-time', 'option');?></h5>
                                    </footer> 
                            </article>
                            <article class="price-card <?php  $curentcat = get_sub_field('subcategory_name', 'option'); 
                                if (strnatcmp($curentcat, $product_subcategory) !==0 ) {
                                    echo 'notcur';
                                };
                                ?> 
                                <?php echo get_sub_field('subcategory_name', 'option'); ?>" id="<?php echo get_sub_field('subcategory_name', 'option'); ?>-parttime">    
                                    <header>
                                        <h3 class="pricing-card-name">Full-time</h3>
                                    </header>
                                        <div class="pricing-card-body">
                                            <h5 class="price-card__price-month"><?php echo get_field('currency', 'option');?> <?php echo get_sub_field('full-time_price', 'option');?><span class="price-small-postfix">/month</span></h5>
                                                <h6 class="price-card__price-hour">or just <?php echo get_field('currency', 'option');?><?php $partHour = get_sub_field('full-time_price', 'option'); echo $partHour / 80;?> per hour</h6>
                                        </div>   
                                    <footer>
                                        <h5 class="price-card__description"><?php echo get_field('description_full-time', 'option');?></h5>
                                    </footer> 
                            </article>
                            <article class="price-card <?php  $curentcat = get_sub_field('subcategory_name', 'option'); 
                                if (strnatcmp($curentcat, $product_subcategory) !==0 ) {
                                    echo 'notcur';
                                };
                                ?> 
                                <?php echo get_sub_field('subcategory_name', 'option'); ?>" id="<?php echo get_sub_field('subcategory_name', 'option'); ?>-parttime">    
                                    <header>
                                        <h3 class="pricing-card-name">Minimal-time</h3>
                                    </header>
                                        <div class="pricing-card-body">
                                            <h5 class="price-card__price-month"><?php echo get_field('currency', 'option');?> <?php echo get_sub_field('minimal-time_price', 'option');?><span class="price-small-postfix">/month</span></h5>
                                                <h6 class="price-card__price-hour">or just <?php echo get_field('currency', 'option');?><?php $partHour = get_sub_field('minimal-time_price', 'option'); echo $partHour / 80;?> per hour</h6>
                                        </div>   
                                    <footer>
                                        <h5 class="price-card__description"><?php echo get_field('description_minimal-time', 'option');?></h5>
                                    </footer> 
                            </article>
                            <?php endwhile; ?>
                            <?php endif; ?>
                </div>
    </section>