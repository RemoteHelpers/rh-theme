<?php
/**
 * Templat part for displaying Employee responibilities in single product page
 */

defined('ABSPATH') || exit;

global $product;

?>
    <!--=======================
    // Employee responibilities section
    //========================-->
<div class="employee_respons">
            <?php $respons = array(); ?>
            <?php if (!empty(have_rows('work_experience'))): ?>
                <?php if (have_rows('work_experience')): ?>
                    <?php while (have_rows('work_experience')):
                        the_row(); ?>
                        <?php if (!empty(have_rows('features'))): ?>
                            <?php while (have_rows('features')):
                                the_row(); ?>
                                <?php $all_respons = get_sub_field('feature_item'); ?>
                                <?php array_push($respons, $all_respons); ?>
                            <?php endwhile; ?>
                        <?php endif ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php
            $unic_respons = array_unique($respons);
            $upperc_resp = array_map('ucfirst', $unic_respons);
            ?>
            <div class="product-respons">
                <div class="skill-items respons">
                    <?php
                    foreach ($upperc_resp as $upperc) {
                        echo '<p>' . $upperc . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>