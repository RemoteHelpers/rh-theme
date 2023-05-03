<?php
/**
 * Templat part for displaying Portfolio section in single product page
 */

defined('ABSPATH') || exit;

global $product;

?>

    <!--=======================
    // Portfolio section
    //========================-->
            
    <?php
        $empid = $product->get_sku();
        $args = array(
            'post_type' => 'cases',
            'eployeeid' => $empid,
        );
        $query = new WP_Query($args);
        if (!empty($query->have_posts())): ?>
            <div class="product-body-section-title portfolio__title red">
                <span>Portfolio</span>
            </div>

            <div class="portfolio__cv">
                <!-- Move frome here and connect with functiom.php -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
                <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

                <div class="filter_portfolio">
                    <?php
                    if ($query->have_posts()):
                        $alreadyDisplayed = [];
                        $cats_check = get_the_terms(get_the_id(), 'case_tag');
                        ?>
                        <button class="select_tag_case filter-button active_portfolio_filret active"
                            data-filter="All">All</button>
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                            $cats = get_the_terms(get_the_id(), 'case_tag');

                            if (is_array($cats)) {

                                foreach ($cats as $cat) {
                                    if (!in_array($cat->term_id, $alreadyDisplayed)) {
                                        ?>
                                        <button class="select_tag_case filter-button" data-filter="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></button>
                                        <?php
                                        $alreadyDisplayed[] = $cat->term_id;
                                    }
                                }
                            }
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="portfolio_items">
            <!-- Portfolio list -->
            <?php
            $empid = $product->get_sku();
            $args = array(
                'post_type' => 'cases',
                'eployeeid' => $empid,
            );
            $query = new WP_Query($args);
            if (!empty($query->have_posts())):
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        $cats = get_the_terms(get_the_id(), 'case_tag');
                        $cat_classes = '';
                        if (is_array($cats)) {
                            foreach ($cats as $cat) {
                                $cat_classes .= $cat->slug . ' ';
                            }
                        }
                        ?>
                        <div class="popup_main filter <?php echo $cat_classes; ?>">
                            <a class="open_popup play-video">
                                <?php
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail');
                                ?>
                                <img width="156" height="156" data-src="<?php echo $image[0]; ?>" class="lozad" />
                            </a>
                            <h2 class="portfolio_cover_title">
                                <?php echo get_the_title(); ?>
                            </h2>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            <?php endif; ?>
            <a href="#" id="seeMore">More Works</a>

            <!--Prtfolio slides-->
            <div class="popup_body">
                <div class="popup_back stop-video">
                    <div style="--swiper-navigation-color: red; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-wrapper">
                            <?php
                            $empid = $product->get_sku();
                            $args = array(
                                'post_type' => 'cases',
                                'eployeeid' => $empid,
                            );
                            $query = new WP_Query($args);
                            if (!empty($query->have_posts())):
                                if ($query->have_posts()):
                                    while ($query->have_posts()):
                                        $query->the_post();
                                        ?>
                                        <?php if (get_field('choose_layout_of_case') == 'Padding (Text/Info)'): ?>
                                            <div class="swiper-slide short_padding">
                                            <?php else: ?>
                                                <div class="swiper-slide full_no_padding">
                                                <?php endif; ?>
                                                <span class="close_portfolio"></span>
                                                <div class="porfolio_employee_cover">
                                                    <?php
                                                    $custom_ids = get_the_terms($post->ID, 'eployeeid');
                                                    foreach ($custom_ids as $custom_id) {
                                                        $sku = $custom_id->name;
                                                        $product_id = wc_get_product_id_by_sku($sku);
                                                        $product_inf = wc_get_product($product_id);
                                                        $name = $product_inf->get_title();
                                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                                                        $permalink = $product_inf->get_permalink();
                                                        ?>
                                                        <a href="<?php echo $permalink ?>">
                                                            <div class="porfolio_employee_info">
                                                                <div class="emp_cover"><img class="emp_photo" src="<?php echo $image[0]; ?>"></div>
                                                                <p class="emp_sku">ID:
                                                                    <?php echo $sku ?>
                                                                </p>
                                                                <p class="emp_name">
                                                                    <?php echo $name ?>
                                                                </p>
                                                            </div>
                                                        </a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                </a>

                                                <div class="cover_all">
                                                    <div class="popup_heading padding_heading">
                                                        <h3 class="single_case_title padding_title">
                                                            <?php echo get_the_title(); ?>
                                                        </h3>
                                                    </div>
                                                    <div id="modal-ready">
                                                        <?php echo the_content(); ?>
                                                    </div>
                                                    <a href="<?php echo $permalink ?>">
                                                        <div class="porfolio_employee_cover_mobile">
                                                            <?php
                                                            $custom_ids = get_the_terms($post->ID, 'eployeeid');
                                                            foreach ($custom_ids as $custom_id) {
                                                                $sku = $custom_id->name;
                                                                $product_id = wc_get_product_id_by_sku($sku);
                                                                $product_inf = wc_get_product($product_id);
                                                                $name = $product_inf->get_title();
                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                                                                ?>
                                                                <div class="porfolio_employee_info">
                                                                    <div class="emp_cover">
                                                                        <img class="emp_photo" src="<?php echo $image[0]; ?>">
                                                                    </div>
                                                                    <p class="emp_sku">ID:
                                                                        <?php echo $sku ?>
                                                                    </p>
                                                                    <p class="emp_name">
                                                                        <?php echo $name ?>
                                                                    </p>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                    <!-- Thumb Bottom Slides -->
                                                    <div class="works_title">
                                                        <h3 class="another_works">Another works</h3>
                                                        <span class="lemon_line"></span>
                                                    </div>
                                                    <div thumbsSlider="" class="swiper mySwiper5">
                                                        <div class="swiper-wrapper some1">
                                                        </div>
                                                        <div class="swiper-button-next5"></div>
                                                        <div class="swiper-button-prev5"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" id="seeMore">More Works</a>
            </div>