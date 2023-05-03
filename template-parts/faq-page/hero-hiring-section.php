<?php
/**
 * Hero Hiring Section of FAQ page
 */
?>
    <h1><?php the_field('faq_title') ?></h1>
        <p class="subtitle"><?php the_field('faq_subtitle') ?></p>

        <section class="split padding-3">
            <img src="<?php the_field('faq_hiring_process'); ?>">
            <div class="faq-block">
                <h2 class="block-title"><?php the_field('faq_hiring_process_title') ?></h2>
                <p class="block-subtitle"><?php the_field('faq_hiring_process_subtitle') ?></p>
                <p><?php the_field('faq_hiring_process_description') ?></p>
            </div>
        </section>

        <section class="padding-3">
            <ul class="faq-accordion">
               <?php
                    if (have_rows('faq_hiring_process_accordion')) :
                        while (have_rows('faq_hiring_process_accordion')) : the_row(); ?>
                            <li>
                                <div class="accordion-header">
                                <i class="fas fa-caret-down"></i>
                                <span class="block-subtitle"><?php the_sub_field('question'); ?></span>
                                </div>
                                <div class="accordion-body"><?php the_sub_field('answer'); ?>
                                </div>
                            </li>
                        <?php
                        endwhile;
                    endif
                ?>
            </ul>
        </section>