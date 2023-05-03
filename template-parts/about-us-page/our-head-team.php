<?php
/**
 * Template Our Team Section of Aboute Us
 */
?>
<!-- Company Founders Section -->
        <section class="padding-3">
            <h2 class="element-hidden"><?php the_field('company_founders_title') ?></h2>
            <p class="element-hidden"><?php the_field('company_founders_subtitle') ?></p>
            <div class="split-two element-hidden">
                <?php
                if (have_rows('company_founders_card')) :
                    $counter = 1;
                    while (have_rows('company_founders_card')) : the_row(); ?>
                        <div class="staff-card element-hidden">
                            <div class="staff-card__img-container">
                                <img src="<?php the_sub_field('company_founders_card_photo') ?>" class="staff-card__photo" alt="Company Founder">
                            </div>
                            <h3><?php the_sub_field('company_founders_card_name') ?></h3>
                            <span class="position"><?php the_sub_field('company_founders_card_position') ?></span>
                            <p class="quote"><?php the_sub_field('company_founders_card_text') ?></p>
                        </div>
                        <?php $counter++; ?>
                    <?php
                    endwhile;
                endif
                ?>
            </div>
        </section>
<!-- Managing Team Section -->
        <section class="padding-3">
            <h2 class="element-hidden"><?php the_field('managing_team_title') ?></h2>
            <p class="element-hidden"><?php the_field('managing_team_subtitle') ?></p>
            <div class="split-three element-hidden">
                <?php
                if (have_rows('managing_team_card')) :
                    $counter = 1;
                    while (have_rows('managing_team_card')) : the_row(); ?>
                        <div class="staff-card manager-card element-hidden">
                        <div class="staff-card__img-container">
                                <img src="<?php the_sub_field('managing_team_card_photo') ?>" class="staff-card__photo" alt="<?php the_sub_field('managing_team_card_position') ?>">
                            </div>
                            <h3><?php the_sub_field('managing_team_card_name') ?></h3>
                            <p class="position-wrapper"><span class="position"><?php the_sub_field('managing_team_card_position') ?></span></p>
                            <i class="fas fa-quote-left"></i>
                            <p class="quote"><?php the_sub_field('managing_team_card_text') ?>
                            </p>
                            <ul>
                                <li><a href="<?php the_sub_field('managing_team_card_contact_link') ?>" target="_blank"><i class="<?php the_sub_field('managing_team_card_icon') ?>"></i></a></li>
                                <li><a href="mailto:<?php the_sub_field('managing_team_card_email') ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                </li>
                            </ul>
                        </div>
                        <?php $counter++; ?>
                    <?php
                    endwhile;
                endif
                ?>
            </div>
        </section>