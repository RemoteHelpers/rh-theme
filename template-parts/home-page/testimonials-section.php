<?php
/**
 * Template Testimonials Section on home page
 */
?>
<!-- <section class="padding-3 testimonials">
            <div class="container">
                <div class="section-title-box element-hidden">
                    <h2 class="section-title">Reviews</h2>
                </div>
                <ul class="testimonials-slider">
                <?php
                    if (have_rows('home_page_client_reviews')) :
                        while (have_rows('home_page_client_reviews')) : the_row(); ?>
                            <li class="testimonial-card element-hidden">
                                <img src="<?php
                                if (get_sub_field('client_image')) {
                                    the_sub_field('client_image');
                                } else {
                                    echo get_template_directory_uri() . '/img/Elon-Mask-group.jpg';
                                } ?>">
                                <div class="testimonial-content">
                                    <h3 class="testimonial-title"><?php the_sub_field('client_title'); ?></h3>
                                    <p class="testimonial-text"><?php the_sub_field('client_message'); ?></p>
                                    <div class="testimonial-footer">
                                        <p class="client-name"><?php the_sub_field('client_name'); ?></p>
                                        <p class="client-position"><?php the_sub_field('client_pos'); ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
</section> -->