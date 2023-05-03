<?php
/**
 * Management Section of FAQ page
 */
?>
        <section class="split padding-3">
            <img class="reverse" src="<?php the_field('faq_staff_management'); ?>">
            <div class="faq-block">
                <h2 class="block-title"><?php the_field('faq_staff_management_title') ?></h2>
                <p class="block-subtitle"><?php the_field('faq_staff_management_first_subtitle') ?></p>
                <p><?php the_field('faq_staff_management_first_description') ?></p>
                <p class="block-subtitle"><?php the_field('faq_staff_management_second_subtitle') ?></p>
                <p><?php the_field('faq_staff_management_second_description') ?></p>
            </div>
        </section>

        <section class="split padding-3">
            <img src="<?php the_field('faq_billing_&_invoicing'); ?>">
            <div class="faq-block">
                <h2 class="block-title"><?php the_field('faq_billing_&_invoicing_title') ?></h2>
                <p class="block-subtitle"><?php the_field('faq_billing_&_invoicing_first_subtitle') ?></p>
                <p><?php the_field('faq_billing_&_invoicing_first_description') ?></p>
                <p class="block-subtitle"><?php the_field('faq_billing_&_invoicing_second_subtitle') ?></p>
                <p><?php the_field('faq_billing_&_invoicing_second_description') ?></p>
                <p class="block-subtitle"><?php the_field('faq_billing_&_invoicing_third_subtitle') ?></p>
                <p><?php the_field('faq_billing_&_invoicing_third_description') ?></p>
            </div>
        </section>