<?php
/**
 * Main Pricing Section of Pricing page
 */
$fulltime = get_field('full_time_employees');
$parttime = get_field('part_time_employees');
$minimaltime = get_field('minimal_time_employees');
?>
    <section class="padding-3">
        <span class="backgroundaqua-pr"></span>
        <span class="backgroundyellow-pr"></span>
        <span class="backgroundpink-pr"></span>
        <span class="backgroundbigyellow-pr"></span>
        <h1 class="pricing_main_title"><?php the_field('pricing_page_title'); ?></h1>
        <p class="pricing_main_subtitle"><?php the_field('pricing_page_subtitile'); ?></p>
    
            <div class="tab pricing-switch">
                <button class="tablinks tab-fulltime pricing-switcher-btn active" onclick="openPrice(event, 'Full-time')"><?php echo ( $fulltime['full_time_title']); ?></button>
                <button class="tablinks tab-parttime pricing-switcher-btn" onclick="openPrice(event, 'Part-time')"><?php echo ( $parttime['part_time_title']); ?></button>
                <button class="tablinks tab-minimum pricing-switcher-btn" onclick="openPrice(event, 'Minimal')"><?php echo ( $minimaltime['minimal_time_title']); ?></button>
            </div>

            <div id="Full-time" class="tabcontent" style="display: block;">
            <p><?php echo get_field('full-time_description_text', 'option');?></p>
            <div class="pricing-cards pricing-cards-full">
                
                    <?php
                    if (have_rows('prices_and_skills_full_time', 'option')) :
                        while (have_rows('prices_and_skills_full_time', 'option')) : the_row(); ?>
                            <div class="card">
                                <h3><?php the_sub_field('employee_name'); ?></h3>
                                <ul class="card-props">
                                    <div class="subcat">
                                    <?php
                                    $skills_field = get_sub_field('employee_description');
                                    $skills_array = explode(';', $skills_field);
                                    foreach ($skills_array as $skill) : ?>
                                        <li><?php echo $skill; ?></li>
                                    <?php endforeach; ?>
                                    </div>
                                    <div class="subprice">
                                    <li class="card-price">
                                        <?php the_field('currency', 'option'); ?><?php the_sub_field('employee_full_price'); ?>
                                    </li>
                                    <li class="card-price-per-hour">
                                    ≈ <?php the_field('currency', 'option'); ?><?php $perh = get_sub_field('employee_full_price'); echo $perh / 160;?>
                                     per hour
                                    </li>
                                    </div>
                                </ul>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

            <div id="Part-time" class="tabcontent" style="display: none;">
            <p><?php echo get_field('part-time_description_text', 'option');?></p>
                <div class="pricing-cards pricing-cards-part">
                    <?php
                    if (have_rows('prices_and_skills_part_time', 'option')) :
                        while (have_rows('prices_and_skills_part_time', 'option')) : the_row(); ?>
                            <div class="card">
                                <h3><?php the_sub_field('employee_name'); ?></h3>

                                <ul class="card-props">
                                    <div class="subcat">
                                    <?php
                                    $skills_field = get_sub_field('employee_description');
                                    $skills_array = explode(';', $skills_field);
                                    foreach ($skills_array as $skill) : ?>
                                        <li><?php echo $skill; ?></li>
                                    <?php endforeach; ?>
                                    </div>
                                    <div class="subprice">
                                    <li class="card-price">
                                        <?php the_field('currency', 'option'); ?><?php the_sub_field('employee_full_price'); ?>
                                    </li>
                                    <li class="card-price-per-hour">
                                    ≈ <?php the_field('currency', 'option'); ?><?php $perh = get_sub_field('employee_full_price'); echo $perh / 80;?>
                                     per hour
                                    </li>
                                    </div>
                                </ul>
                                
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

            <div id="Minimal" class="tabcontent" style="display: none;">
            <p><?php echo get_field('minimal-time_description_text', 'option');?></p>
                <div class="pricing-cards pricing-cards-min">
                    <?php
                    if (have_rows('minimum_pricing', 'option')) :
                        while (have_rows('minimum_pricing', 'option')) : the_row(); ?>
                            <div class="card">
                                <h3><?php the_sub_field('employee_name'); ?></h3>

                                <ul class="card-props">
                                    <div class="subcat">
                                    <?php
                                    $skills_field = get_sub_field('employee_description');
                                    $skills_array = explode(';', $skills_field);
                                    foreach ($skills_array as $skill) : ?>
                                        <li><?php echo $skill; ?></li>
                                    <?php endforeach; ?>
                                    </div>
                                    <div class="subprice">
                                    <li class="card-price">
                                        <?php the_field('currency', 'option'); ?><?php the_sub_field('minimum_price'); ?>
                                    </li>
                                    <li class="card-price-per-hour">
                                    ≈ <?php the_field('currency', 'option'); ?><?php $perh = get_sub_field('minimum_price'); echo $perh / 40;?>
                                     per hour
                                    </li>
                                    </div>
                                </ul>
                                
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
       
    </section>