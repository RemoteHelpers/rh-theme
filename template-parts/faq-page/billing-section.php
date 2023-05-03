<?php
/**
 * Billing and Invoice Section of FAQ page
 */
?>
        <section class="padding-3">
            <ul class="faq-accordion">
               <?php
                    if (have_rows('faq_billing_&_invoicing_accordion')) :
                        while (have_rows('faq_billing_&_invoicing_accordion')) : the_row(); ?>
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