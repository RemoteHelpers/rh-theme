<?php
/**
 * Template part for displaying Employee Languages in single product page
 */

defined('ABSPATH') || exit;

global $product;
?>

    <!--=======================
    // Employee Languages section
    //========================-->
    
    <?php
        $terms = wp_get_post_terms( get_the_id(), 'language_tags' );
        if( count($terms) > 0 ){
        ?>
        <div class="product-langset">
            <div class="accordion-title">
                <h4>Languages:</h4>
            </div>
            
            <div class="skill-items">
                    <?php
                    foreach($terms as $term){
                        $term_name = $term->name;
                        $term_link = get_term_link( $term, 'product_tag' );
                        echo '<p>' . $term_name .'</p>';
                        //if tag_link needed
                        // echo '<a href=' . $term_link .'> ' . $term_name . ' </a>';
                    }
                    ?>
            </div>
        </div>
        <?php
        }
        ?>