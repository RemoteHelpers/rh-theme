<?php
/**
 * Template Hero Section of Parent Category
 */
?>
<?php
$term = get_queried_object();
$hero_title = get_field('hero_title', $term);
$hero_subtitle = get_field('hero_subtitle', $term);
$hero_banner = get_field('hero_banner', $term);
$hero_video = get_field('hero_video', $term);
?>
<?php if($hero_title) : ?>
    <section class="category hero__section">
        <span class="bc-circle aqua element-hidden"></span>
            <span class="bc-circle yellow element-hidden"></span>
                <span class="bc-circle pink element-hidden"></span>
                    <span class="bc-circle big yellow element-hidden"></span>
                        <span class="bc-circle big blue element-hidden"></span>
                        <!-- CHECK FOR BANNER OR VIDEO -->
                        <?php
                                if (($hero_banner) || ($hero_video)){
                                    ?>
                                    <div class="category__section">
                                    <?php
                                } else {
                                    ?>
                                    <div class="category__section category_section_no_banner">
                                    <?php
                                }
                            ?>
                        <div class="cat_title"><h1 class="category__title"><?php echo $hero_title; ?></h1></div>

                        <div class="cat_sub"><p class="category__subtitle"><?php echo $hero_subtitle; ?></p>
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
                                            echo '<ul class="sub_cat-list">';
                                                foreach ( $woo_categories as $woo_cat ) {
                                                $woo_cat_id = $woo_cat->term_id;
                                                $woo_cat_name = $woo_cat->name;

                                                ?>
                                            <?php if($woo_cat->count > 0) { ?>
                                                        <?php
                                                            echo '<li class="sub_cat-item"><a href="#' . $woo_cat_name . '">' . $woo_cat_name . '</a></li>';
                                                            ?>

                                            <?php } ?>
                                            <?php
                                                }
                                            echo '</ul>';
                                                ?>
                            </div>
                            
                        <div class="category__block category_video">
                            <div class="video__block">
                            <?php
                                if (strpos($hero_video, "iframe") === false) {
                                    ?>
                                    <img src="<?php echo $hero_banner; ?>" alt="">
                                   <?php
                                } else { 
                                    echo $hero_video; 
                                }
                            ?>
                            </div>
                        </div>
                    </div>
    </section>
    <?php endif; ?>
    <?php if(!$hero_title) : ?>
        <h1 class="employees_title"><?php echo get_field('employees_title', 'option'); ?></h1>
            <?php if( get_field('show_proposition_slider', $term) == 'Yes' ): ?> 
                <section class="category spacial_offer element-hidden">
                    <?php if( have_rows('proposition_slides', $term) ): ?>
                        <?php  while( have_rows('proposition_slides', $term) ) : the_row(); ?>
                            <div class="category__slider" style="<?php echo get_sub_field('proposition_background_gradient', $term); ?>">
                                <div class="sl_title"><h2 class="slider_block__title"><?php echo get_sub_field('proposition_title', $term); ?></h2></div>
                                <div class="sl_sub"><h3 class="slider_block__subtitle"><?php echo get_sub_field('proposition_description', $term); ?></h3></div>
                                <div class="slider_block__btns">
                                <span class="slider_block__btns_text"><?php echo get_sub_field('proposition_price', $term); ?></span>
                                <button type="submit" class="slider_block__btn"><?php echo get_sub_field('proposition_button', $term); ?> <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                            <div class="category__slider_block slider__block_photo">
                                <img src="<?php echo get_sub_field('proposition_image', $term); ?>" alt="">
                            </div>
                            </div>
                            <?php endwhile; ?>
                            <?php elseif( have_rows('employees_page_proposition_slides', 'option') ): ?>
                        <?php  while( have_rows('employees_page_proposition_slides', 'option') ) : the_row(); ?>
                            <div class="category__slider" style="<?php echo get_sub_field('proposition_background_gradient', 'option'); ?>">
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
                <?php endif; ?>