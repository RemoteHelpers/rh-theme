<?php
/**
 * Template part for displaying Skills in single product page
 */

defined('ABSPATH') || exit;

global $product;
?>

    <!--=======================
    // Employee Skills section
    //========================-->

            <div class="product-skillset">
                <div class="accordion-title active">
                    <h4>Most used skills and tools:</h4>
                </div>
                <div class="employee-skills skill-items active">
                    <?php
                    $id = $product->get_id();
                    echo wc_get_product_tag_list($id, " "); ?>
                </div>
            </div>