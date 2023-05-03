<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

?>
<!--<div class="gallery-backdrop">-->
<!--    <i class="fas fa-times gallery-close"></i>-->
<!--    <i class="fas fa-arrow-left gallery-prev"></i>-->
<!--    <i class="fas fa-arrow-right gallery-next"></i>-->
<!--    <div class="gallery-container">-->
<!--        <img class="gallery-image" src="">-->
<!--    </div>-->
<!--    <div class="gallery-thumbnails"></div>-->
<!--</div>-->

<!-- <div class="white-backdrop">

    <i class="fas fa-times"></i>

    <div class="backdrop-center">

        <div class="popup-calendar">
            Calendly inline widget begin
            <div class="calendly-inline-widget"
                 data-url="https://calendly.com/gagarinbrood/book-a-meeting?primary_color=ff5252"
                 style="min-width:320px;height:650px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
            Calendly inline widget end
        </div>

    </div>

</div> -->

<div class="container" itemscope itemtype="https://schema.org/Product">

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

        <?php get_template_part('template-parts/employee-single-page/employee-sidebar/single-product-sidebar'); ?>

        <?php get_template_part('template-parts/employee-single-page/employee-body/single-product-body'); ?>

    </div>

</div>

<div class="rh-related">
        <?php

        // getRandomCategory(6);
        // getSimilarProduct(6)
        // getProductsByAcf('current_position', 'Lead generation manager');
        global $product;

        if( ! is_a( $product, 'WC_Product' ) ){
            $product = wc_get_product(get_the_id());
        }

        woocommerce_related_products( array(
            'posts_per_page' => 12,
            'columns'        => 4,
            'orderby'        => 'rand'
        ) );
       
        ?>
    <canvas></canvas>
</div>


<?php
//        /** Hook: woocommerce_after_single_product_summary.
//         *
//         * @hooked woocommerce_output_product_data_tabs - 10
//         * @hooked woocommerce_upsell_display - 15
//         * @hooked woocommerce_output_related_products - 20
//         */
//        do_action( 'woocommerce_after_single_product_summary' );
//    ?>



<?php //do_action( 'woocommerce_after_single_product' );

// * Hook: woocommerce_before_single_product.
// *
// * @hooked woocommerce_output_all_notices - 10
// */
//do_action( 'woocommerce_before_single_product' );


//     * Hook: woocommerce_before_single_product_summary.
//     *
//     * @hooked woocommerce_show_product_sale_flash - 10
//     * @hooked woocommerce_show_product_images - 20
//     */
//    do_action( 'woocommerce_before_single_product_summary' );


//         * Hook: woocommerce_single_product_summary.
//         *
//         * @hooked woocommerce_template_single_title - 5
//         * @hooked woocommerce_template_single_rating - 10
//         * @hooked woocommerce_template_single_price - 10
//         * @hooked woocommerce_template_single_excerpt - 20
//         * @hooked woocommerce_template_single_add_to_cart - 30
//         * @hooked woocommerce_template_single_meta - 40
//         * @hooked woocommerce_template_single_sharing - 50
//         * @hooked WC_Structured_Data::generate_product_data() - 60
//         */
//        do_action( 'woocommerce_single_product_summary' );


//     * Hook: woocommerce_after_single_product_summary.
//     *
//     * @hooked woocommerce_output_product_data_tabs - 10
//     * @hooked woocommerce_upsell_display - 15
//     * @hooked woocommerce_output_related_products - 20
//     */
//    do_action( 'woocommerce_after_single_product_summary' );

$var_full = 0;
$var_part = 0;
$var_min = 0;
if ( $product->is_type('variable-subscription') ) {
    $available_variations = $product->get_available_variations();
    foreach ( $available_variations as $variation_data ) {
        $variation_id = $variation_data['variation_id'];
        $variation_obj = new WC_Product_variation($variation_id);
        $sub_type = $variation_data["attributes"]["attribute_pa_choose-type-of-employment"];
        $stock = $variation_obj->get_stock_quantity();
           if ($sub_type == "full-time"){
                  $var_full = $stock;
               };
            if ($sub_type == "part-time"){
                    $var_part = $stock;
                };  
            if ($sub_type == "minimum"){
                    $var_min = $stock;
                };       
    }
}
// print_r($var_full);
// print_r($var_part);
// print_r($var_min);
if($var_full <= 0 && $var_part <= 0 && $var_min <= 0) {
    ?>
        <style>
            .rh-single-product > .container {filter: grayscale(1);pointer-events: none;}
            #page .hired {background: var(--rh-green-color);}
            #page p.hired_message {margin: 0 auto;padding: 1rem;max-width: 80rem;color: #fff;}
            #page p.hired_message a {color: var(--rh-accent-color);text-decoration: underline;}
        </style>
        <p class="hired_message">Sorry, the <?php echo $product->get_name(); ?> is not available at the moment. You can select a similar one in the <?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'category:', 'categories:', sizeof( get_the_terms( $post->ID, 'product_cat' ) ), 'woocommerce' ) . ' ', '</span>' ); ?>  or <a href="/employees/">see all</a> available employees with convenient filtering.</p>
        <script>
            jQuery(document).ready(function() {
                jQuery('.hired').append( jQuery('.hired_message') );
                jQuery('.product-price-and-buttons .variations').remove();
                jQuery('.product-price-and-buttons .limited-subscription-notice').remove();
                jQuery('.cart-btn-group button span').text( "Hired" );
            })
        </script>
    <?php
    } 
if($var_part <= 0) {
    ?>
    <script>
        jQuery("#pa_choose-type-of-employment option[value='part-time']").remove();
    </script>
    <?php
    }
if($var_min <= 0 ) {
    ?>
    <script>
        jQuery("#pa_choose-type-of-employment option[value='minimum']").remove();
    </script>
    <?php
    }
if($var_full <= 0 ) {
    ?>
    <script>
        jQuery("#pa_choose-type-of-employment option[value='full-time']").remove();
    </script>
    <?php
    }  


// elseif ($product_quantity < 2 and $product_quantity !== 0) {
//     echo '<script>jQuery(document).ready(() => jQuery("table.variations tr:nth-child(2) .value option:nth-child(3)").remove())</script>';
// }
?>
<script src='/wp-content/themes/clean/js/canvas.js'></script>
<script>
    // notifications script after clicking "add to cart" button
    jQuery(document).ready(function(){
        jQuery('.single_add_to_cart_button.button.alt').on('click', function() {
            if (jQuery(this).hasClass('disabled')) {
                return;
            } else if (jQuery(this).hasClass('added')) {
                return;
            } else {
                jQuery('.rh-notices-wrapper').append('<a href="/cart"><div class="ajax-woocommerce-message" role="alert">Check your cart</div></a>')
                setTimeout(() => {
                    jQuery('.ajax-woocommerce-message').hide();
                }, 3000);
            }
        })
    })
</script>