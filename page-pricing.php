<?php
/**
 * Pricing page
 */
get_header(); 
?>
    <div class="pricing">

        <!-- Main Pricing section template -->
        <?php get_template_part('/template-parts/pricing-page/pricing-section'); ?>

        <!-- Main Point Outstaffing section template -->
        <?php get_template_part('/template-parts/pricing-page/main-points-section'); ?>

        <?php if( get_field('show_hide_offers') == 'Show' ): ?>    
        <!-- Special Offer section template -->
        <?php get_template_part('/template-parts/pricing-page/special-offer-section'); ?> 
        <?php endif; ?>

        <?php get_template_part('/template-parts/pricing-page/questions-section'); ?>
    </div>


<?php get_footer();