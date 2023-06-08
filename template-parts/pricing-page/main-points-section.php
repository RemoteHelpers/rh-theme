<?php
/**
 * Template Main Points Section of Pricing page
 */
?>
        <section>
            <div class="section-title-box">
                <h2 class="section-title"><?php the_field('outstaffing_title'); ?></h2>
            </div>
            <div class="outstaffing__content">
                <?php
                if (have_rows('outstaffing_group')) :
                    $counter = 1;
                    while (have_rows('outstaffing_group')) : the_row(); ?>
                        <div class="outstaffing__card">
                            <div class="outstaffing__card-top">
                                <img class="lozad outstaffing__img" data-src="<?php the_sub_field('outstaffing_icon'); ?>" alt="icon">
                                <p class="outstaffing__text"><?php the_sub_field('outstaffing_text'); ?></p>
                            </div>
                            <span class="outstaffing__description"><?php the_sub_field('outstaffing_description'); ?></span>
                        </div>
                        <?php $counter++; ?>
                    <?php
                    endwhile;
                endif
                ?>
            </div>
        </section>