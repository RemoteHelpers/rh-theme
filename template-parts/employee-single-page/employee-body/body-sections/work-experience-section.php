<?php
/**
 * Templat part for displaying Work experience in single product page
 */

defined('ABSPATH') || exit;

global $product;

?>

    <!--=======================
    // Work experience section
    //========================-->
<?php if (!empty(have_rows('work_experience'))): ?>

<div class="product-body-section-title experience__title red">
    <span>Work experience</span>
</div>

<ul class="portfolio-list">
    <?php
    if (have_rows('work_experience')): ?>

        <?php
        while (have_rows('work_experience')):
            the_row(); ?>
            <li>
                <ul>
                    <li class = "work_exp_list">
                        <div class="work_exp_title">
                            <span class="portfolio-title">
                                <?php echo get_sub_field('organization_name'); ?>
                            </span>
                            <span class="portfolio-position">
                                <?php echo " (" . get_sub_field('work_position'); ?>)
                            </span>
                        </div>
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
                    </li>
                    <li class="years">
                        <?php the_sub_field('years_of_work'); ?>
                    </li>
                    <li>
                        <?php the_sub_field('short_description'); ?>
                    </li>
                </ul>
            </li>
        <?php endwhile; ?>

    <?php endif; ?>
</ul>
<?php endif; ?>