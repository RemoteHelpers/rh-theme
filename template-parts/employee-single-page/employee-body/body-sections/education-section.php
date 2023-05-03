<?php
/**
 * Templat part for displaying Education section in single product page
 */

defined('ABSPATH') || exit;

global $product;

?>

    <!--=======================
    // Education section
    //========================-->

    <?php if (!empty(have_rows('education'))): ?>
            <div class="product-body-section-title education__title red">
                <span id="portfolio-close">Education</span>
            </div>

            <ul class="portfolio-list">
                <?php
                if (have_rows('education')): ?>

                    <?php
                    while (have_rows('education')):
                        the_row(); ?>
                        <li class="portfolio-list-li">
                            <ul>
                                <li>
                                    <span class="portfolio-title">
                                        <?php echo get_sub_field('institution_name'); ?>
                                    </span>
                                    <?php echo " (" . get_sub_field('specialization'); ?>)
                                </li>
                                <li class="years">
                                    <?php the_sub_field('years_of_education'); ?> |
                                    <?php the_sub_field('degree'); ?>
                                </li>
                                <div class="industry-items">
                                    <?php
                                        $value = get_sub_field("industry_tag");
                                            if (is_array($value)) {
                                                foreach ($value as $val) {
                                                    $tempObj = $val;
                                                    ?>
                                                    <a href="/industry_tags/<?php echo $tempObj->slug ?>"><?php echo $tempObj->name ?></a>
                                                    <?php }
                                            }
                                    ?>
                                </div>
                            </ul>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
    <?php endif; ?>