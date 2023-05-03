<?php
/**
 * Templat part for displaying About section in single product page
 */

defined('ABSPATH') || exit;

global $product;

?>

    <!--=============
    // About section
    //==============-->

    <?php if ($product->get_description() !== ''): ?>
        <section class="single-product-about">
            <div class="about-text showReadMore" itemprop="description">
                <?php echo $product->get_description(); ?>
            </div>
        </section>
    <?php endif; ?>