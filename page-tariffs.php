<?php
$fulltime = get_field('full_time_employees');
$parttime = get_field('part_time_employees');
?>


<div class="pricing">
    <div class="pricing_acc_header">
    <div class="pricing_acc_title"><h1>Tariffs</h1></div>
<div class="pricing-switch">
                <span class="active" data-switch="fullTime">Full-time</span>
              
                <input class="switch" data-switch="fullTime" type="checkbox">
                <span data-switch="partTime">Part-time</span>
            </div>
            </div>
<section class="padding-tariffs">
            
            <div class="switch-desc active" data-desc="fullTime">
                <div class="pricing-cards">
                    <?php
                    if (have_rows('prices_and_skills_full_time', 'option')) :
                        while (have_rows('prices_and_skills_full_time', 'option')) : the_row(); ?>
                            <div class="card">
                                <ul class="card-props">
                                    <div class="cat_icon"><img src="<?php the_sub_field('category_logo'); ?>" alt="<?php the_sub_field('employee_name'); ?>"></div>
                                    <div class="subcat">
                                    <h4 class="cat_tariff_title"><?php the_sub_field('employee_name'); ?></h4>
                                    <div class="list_cat_tar">
                                    <?php
                                    $skills_field = get_sub_field('employee_description');
                                    $skills_array = explode(';', $skills_field);
                                    
                                    foreach ($skills_array as $skill) : ?>
                                    
                                        <li><p class="dot_list"></p><?php echo $skill; ?></li>
                                        
                                    <?php endforeach; ?>
                                    </div>
                                    </div>
                                </ul>
                                <div class="subprice">
                                    <li class="card-price">
                                        <?php the_field('currency', 'option'); ?><?php the_sub_field('employee_full_price'); ?>
                                    </li>
                                    <li class="card-price-per-hour">
                                    ≈ <?php the_field('currency', 'option'); ?><?php $perh = get_sub_field('employee_full_price'); echo $perh / 160;?>
                                     per hour
                                    </li>
                                    </div>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="switch-desc" data-desc="partTime">
                <div class="pricing-cards">
                    <?php
                    if (have_rows('prices_and_skills_part_time', 'option')) :
                        while (have_rows('prices_and_skills_part_time', 'option')) : the_row(); ?>
                            <div class="card">
                                

                                <ul class="card-props">
                                <div class="cat_icon"><img src="<?php the_sub_field('category_logo'); ?>" alt="<?php the_sub_field('employee_name'); ?>"></div>
                                    <div class="subcat">
                                    <h4 class="cat_tariff_title"><?php the_sub_field('employee_name'); ?></h4>
                                    <div class="list_cat_tar">
                                    <?php
                                    $skills_field = get_sub_field('employee_description');
                                    $skills_array = explode(';', $skills_field);
                                    
                                    foreach ($skills_array as $skill) : ?>
                                    
                                        <li><p class="dot_list"></p><?php echo $skill; ?></li>
                                        
                                    <?php endforeach; ?>
                                    </div>
                                    </div>
                                </ul>
                                <div class="subprice">
                                    <li class="card-price">
                                        <?php the_field('currency', 'option'); ?><?php the_sub_field('employee_full_price'); ?>
                                    </li>
                                    <li class="card-price-per-hour">
                                    ≈ <?php the_field('currency', 'option'); ?><?php $perh = get_sub_field('employee_full_price'); echo $perh / 80;?>
                                     per hour
                                    </li>
                                    </div>
                            </div>
                        <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </section>
        </div>
