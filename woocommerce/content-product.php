<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
$variations = $product->get_available_variations();
$var_stock = 0;
foreach($variations as $variation){
    $variation_id = $variation['variation_id'];
    $variation_obj = new WC_Product_variation($variation_id);
    $stock = $variation_obj->get_stock_quantity();
    $stock;
    if ($stock > 0){
        $var_stock++;
    };
}

// Ensure visibility.
// if (empty($product) || !$product->is_visible() || $var_stock == 0) {
//     return;
// }



$skill_count = 0;

$args = array(
    'post_type'     => 'product_variation',
    'post_status'   => array( 'private', 'publish' ),
    'numberposts'   => -1,
    // 'orderby'       => 'menu_order',
    // 'order'         => 'ASC',
    'post_parent'   => get_the_ID()
);

$variations = get_posts( $args );

?>

<div>
<?php
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
if($var_full <= 0 && $var_part <= 0 && $var_min <= 0) {
    ?>
        <article class="card 1 out_of_stock_card" id="card">
            <div class="out_wrapper">
                <p>Hired</p>
            </div>
    <?php
} else {
    ?>
        <article class="card 1" id="card">
    <?php
}
?>
<!-- <article class="card 1" id="card"> -->
        <header class="card_top">
<!--            <div class="tooltip_price card__product-price" data-title="Full-time 160 hours (8h per day...)">-->
            <div class="tooltip_price card__product-price">
                <span class="card_corner_price">

<!--                --><?php //echo get_woocommerce_currency_symbol() . $product->get_price() . '' ?>

                    <?php

                    foreach ( $variations as $variation ) {

                        $variation_ID = $variation->ID;

                        $product_variation = new WC_Product_Variation( $variation_ID );

                        $variation_price = $product_variation->get_price();

                        $variation_name = $product_variation->get_variation_attributes();

                        if ( ($variation_name['attribute_choose-work-period'] ?? null) === '1 month' && strpos($variation_name['attribute_choose-type-of-employment'], 'Full time') !== false) {
                            echo get_woocommerce_currency_symbol() . $variation_price . '';
                        } else {
                            echo '';
                        }

                        if ( ($variation_name['attribute_pa_choose-work-period'] ?? null) === '1-month' && $variation_name['attribute_pa_choose-type-of-employment'] === 'full-time') {
                            echo get_woocommerce_currency_symbol() . substr($variation_price, 0, 5) . '';
                        } else {
                            echo '';
                        }
                    }

                    ?>

                </span>

                <?php
                        echo '<div class="popup-price">';
                        echo '<span class="popup-price-info">';
                        echo '<ul class="popup-price-list">';
                        $show_message = 0;
                    foreach ($variations as $variation) {

                        $variation_ID = $variation->ID;

                        $product_variation = new WC_Product_Variation($variation_ID);

                        $variation_price = $product_variation->get_price_html();
                        $price_without_decimlas = preg_replace('/\.00/', '', $variation_price);
                        $price_without_decimlas = preg_replace("/'/", '', $price_without_decimlas);



                        $variation_name = $product_variation->get_variation_attributes();
                    $human_variation_priod = $variation_name['attribute_pa_choose-work-period'] ?? null;
                    $human_variation_priod = preg_replace("/-/", ' ', $human_variation_priod);
                    $human_variation_priod = ucwords($human_variation_priod);

                    $human_variation_priod_second = $variation_name['attribute_choose-work-period'] ?? null;
                    $human_variation_priod_second = preg_replace("/-/", ' ', $human_variation_priod_second);
                    $human_variation_priod_second = ucwords($human_variation_priod_second);

                    $human_variation_type = $variation_name['attribute_pa_choose-type-of-employment'] ?? null;
                    $human_variation_type = preg_replace("/-/", ' ', $human_variation_type);
                    $human_variation_type = ucwords($human_variation_type);
                    
                    $human_variation_type_second = $variation_name['attribute_choose-type-of-employment'] ?? null;
                    $human_variation_type_second = preg_replace("/-/", ' ', $human_variation_type_second);
                    $human_variation_type_second = ucwords($human_variation_type_second);
                    
                    if (!empty($human_variation_priod) && $human_variation_priod === "1 Month" && $human_variation_type != "Full Time" && !empty($variation_price)) {
                        echo "<li style='display:flex;'>";
                        echo  $human_variation_priod . " - " . $human_variation_type  . ": " . $price_without_decimlas;
                        echo "</li>";
                        $show_message++;
                    }

                    elseif (!empty($human_variation_priod_second) && $human_variation_priod_second  === "1 Month" && $human_variation_type_second != "Full Time" && !empty($variation_price)) {
                        echo "<li style='display:flex;'>";
                        echo $variation_name['attribute_choose-work-period'] . " - " . $variation_name['attribute_choose-type-of-employment'] . ": " .  $price_without_decimlas;
                        echo "</li>";
                        $show_message++;
                    }

                    

                        // if ($variation_name['attribute_choose-work-period'] === '1 month' && strpos($variation_name['attribute_choose-type-of-employment'], 'Part time') !== false) {
                        //     echo '<div class="popup-price">';
                        //     echo '<span class="popup-price-info">';
                        //     echo $variation_name['attribute_choose-work-period'] . " - " . $variation_name['attribute_choose-type-of-employment'] . ": " . $variation_price;
                        //     echo "</span>";
                        //     echo '</div>';
                        // } if ($variation_name['attribute_pa_choose-work-period'] === '1-month' && strpos($variation_name['attribute_pa_choose-type-of-employment'], 'part-time') !== false && !empty($variation_price))
                        // {
                        //     echo '<div class="popup-price">';
                        //     echo '<span class="popup-price-info">';
                        //     echo "1 month - " . $variation_name['attribute_pa_choose-type-of-employment'] . ": " . $variation_price;
                        //     echo "</span>";
                        //     echo '</div>';
                        // }
                        // if ($variation_name['attribute_pa_choose-work-period'] === '1-month' && strpos($variation_name['attribute_pa_choose-type-of-employment'], 'part-time') !== false && empty($variation_price)) {
                        //     echo '<div class="popup-price">';
                        //     echo '<span class="popup-price-info">';
                        //     echo "1 month - " . $variation_name['attribute_pa_choose-type-of-employment'] . " is unavailable for this employee ";
                        //     echo "</span>";
                        //     echo '</div>';
                        // }
                    }
                    if ($show_message === 0) {
                        echo "<li style='display:flex;'>Sorry, there are no other price options for this employee</li>";
                    }
                    echo '</ul>';
                    echo "</span>";
                    echo '</div>';
                ?>

                <span>/month</span>
                
                
            </div>
            <div class="woocommerce-product-rating">
            <?php
                        $average_rating = $product->get_average_rating();
                        $rating = round($average_rating);
                        echo printStars($rating, 5);
                        ?>
            </div>

        </header>
        <div class="card_content">
            <a class="card_link" href="<?php echo get_post_permalink() ?>">
                <div class="card__img-container">
                    <span class="woocommerce-product-onsale">
    <?php if ($product->is_on_sale()) : ?>
        <div class="product-sale" style="background-color: <?php echo get_field('current_work_status') ?>">

            <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('%', 'woocommerce') . '</span>', $post, $product); ?>

        </div>
    <?php

    endif;
    ?>
</span>
                    <img class="lozad" data-src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                     alt="Person image">
                </div>
                <div class="product__id">
                    <span class="product__id_name">ID: <?php echo $product->get_sku(); ?></span>
                    <span class="tooltip product__id_time" data-title="Employee Work Shift"><i
                                class="<?php echo get_field('shifts') ?>"> </i></span>
                </div>
                <?php the_title('<h3 class="product__first_name" >', '</h3>'); ?>
                <div class="product__position"><?php the_field('current_position') ?></div>
            </a>
            <div class="skill-items" id="skillCount">

                <?php $skill_count = wc_get_product_tag_list($product->get_id(), ';');
                $skill_array = explode(';', $skill_count);

                $card_width = 288;
                $card_padding = 16;
                $padding = 16;
                $gap = 8;
                $lower_char = 5;
                $upper_char = 8;

                $row_width = $card_width - ($card_padding * 2);
                $skill_length = 0;
                $hidden_skills = $skill_array;

                foreach ($skill_array as $key => $skill) {
                    if ($skill_length > ($row_width * 1.4)) {
                        break;
                    }

                    $stripped = strip_tags($skill);
                    $lowercase = mb_strtolower($stripped);
                    $uppercase_chars = strlen($lowercase) - similar_text($stripped, $lowercase);
                    $lowercase_chars = strlen($stripped) - $uppercase_chars;

                    $length = ($uppercase_chars * $upper_char) + ($lowercase_chars * $lower_char) + ($padding * 2) + $gap;

                    echo $skill;

                    $skill_length += $length;
                    unset($hidden_skills[$key]);
                }
                ?>

                <?php
                $hidden_skills_count = count($hidden_skills);

                if (!empty($hidden_skills_count)) : ?>
                    <span class="count">+<?php echo $hidden_skills_count; ?></span>
                <?php endif; ?>
            </div>
        </div>
        <footer class="card_bottom">
            <div class="card_line"></div>
            <a href="<?php echo get_post_permalink() ?>">View Profile</a>
            <div class="card_line"></div>
        </footer>
</article>
</div>


<?php
?>
