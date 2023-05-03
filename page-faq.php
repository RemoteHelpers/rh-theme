<?php
/**
 * FAQ page
 */
get_header(); ?>

    <div class="faq">

        <!-- Hiring section template -->
        <?php get_template_part('/template-parts/faq-page/hero-hiring-section'); ?>

        <!-- Management section template -->
        <?php get_template_part('/template-parts/faq-page/management-section'); ?>

        <!-- Billing section template -->
        <?php get_template_part('/template-parts/faq-page/billing-section'); ?>

    </div>

<?php get_footer();