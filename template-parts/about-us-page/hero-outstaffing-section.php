<?php
/**
 * Template Outstaffing Section of Aboute Us
 */
?>
<!-- LOGO IMAGE -->
<h1 class="logo-img">
    <?php echo get_custom_logo();?>
</h1>
<!-- Main points of Outstaffing aboute section -->
        <section class="outstaffing">
                <div class="container">
                    <div class="section-title-box">
                        <h2 class="section-title element-hidden"><?php the_field('outstaffing_title'); ?></h2>
                    </div>
                    <div class="outstaffing__top element-hidden">
                        <div class="video__block element-hidden">
                            <?php the_field('outstaffing_video_url'); ?>
                        </div>
                        <div class="outstaffing__content element-hidden">
                            <?php
                            if (have_rows('outstaffing_group')) :
                                $counter = 1;
                                while (have_rows('outstaffing_group')) : the_row(); ?>
                                    <div class="outstaffing__container">
                                        <div class="outstaffing__card">
                                            <div class="outstaffing__card-front">
                                                <div class="outstaffing__card-icon">
                                                    <img class="lozad" data-src="<?php the_sub_field('outstaffing_icon'); ?>" alt="icon">
                                                </div>
                                                <p class="outstaffing__text"><?php the_sub_field('outstaffing_text'); ?></p>
                                            </div>
                                            <div class="outstaffing__card-back">
                                                <span><?php the_sub_field('outstaffing_description'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++; ?>
                                <?php
                                endwhile;
                            endif
                            ?>
                        </div>
                    </div>
                </div>
        </section>