<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;
global $product;
?>

<div class="basket_container">
    <div class="basket_top">
        <h2><?php the_title(); ?></h2>
        <div class="error-container">
            <?php do_action('woocommerce_before_cart'); ?>
            <a href="#" class="undo-btn">Undo?</a>
        </div>
    </div>
    <div class="basket_bottom">
        <div class="basket_right">
            <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">

                <?php do_action('woocommerce_before_cart_contents'); ?>

                <?php
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                    $product_undo = wc_get_cart_undo_url($cart_item_key);

                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        ?>
                        <div class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                            <div class="basket_front">
                                <div class="product-remove delete-item-js" data-undo="<?php echo $product_undo; ?>">
                                    <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;
                                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <line x1="18.2482" y1="1.16125" x2="2.06094" y2="17.3485" stroke="white" stroke-width="3"/>
                                                        <line x1="17.9393" y1="17.3487" x2="1.75212" y2="1.16153" stroke="white" stroke-width="3"/>
                                                        </svg>
                                                    </a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            esc_html__('Remove this item', 'woocommerce'),
                                            esc_attr($product_id),
                                            esc_attr($_product->get_sku())
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </div>
                                <div class="product-about">
                                    <a href="#">i</a>
                                </div>
                                <div class="card_content">
                                    <div class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                        if (!$product_permalink) {
                                            echo $thumbnail; // PHPCS: XSS ok.
                                        } else {
                                            printf('<a href="%s" target="_blank">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                        }
                                        ?>
                                    </div>
                                    <div class="product__id">
                                        <span class="product__id_name">ID: <?php echo $product_id = $cart_item['data']->get_sku(); ?></span>
                                        <span class="tooltip product__id_time" data-title="Employee Work Shift"><i
                                                    class="<?php the_field('shifts',$product_id = $cart_item['product_id']); ?>"> </i></span>
                                    </div>
                                    <div class="woocommerce-product-rating">
                                        <?php
                                        $average_rating = $product_id = $cart_item['data']->get_average_rating();
                                        $rating = round($average_rating);
                                        echo printStars($rating, 5);
                                        ?>
                                    </div>
                                    <div class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                        <?php
                                        if (!$product_permalink) {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                        } else {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                        }
                                        ?>
                                    </div>
                                    <div class="product__position"><?php echo get_field('current_position',$cart_item['product_id']) ?></div>
                                    <?php
                                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                    // Meta data.
                                    echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                    // Backorder notification.
                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                    }
                                    ?>
                                </div>
                                <div class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                                    ?>
                                </div>

        <!--                        <td class="product-quantity" data-title="--><?php //esc_attr_e('Quantity', 'woocommerce'); ?><!--">-->
        <!--                            --><?php
        //                            if ($_product->is_sold_individually()) {
        //                                $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
        //                            } else {
        //                                $product_quantity = woocommerce_quantity_input(
        //                                    array(
        //                                        'input_name' => "cart[{$cart_item_key}][qty]",
        //                                        'input_value' => $cart_item['quantity'],
        //                                        'max_value' => $_product->get_max_purchase_quantity(),
        //                                        'min_value' => '0',
        //                                        'product_name' => $_product->get_name(),
        //                                    ),
        //                                    $_product,
        //                                    false
        //                                );
        //                            }
        //
        //                            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
        //                            ?>
        <!--                        </td>-->

        <!--                        <td class="product-subtotal" data-title="--><?php //esc_attr_e('Subtotal', 'woocommerce'); ?><!--">-->
        <!--                            --><?php
        //                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
        //                            ?>
    <!--                        </td>-->
                            </div>
                            <div class="basket_back">
                                <div class="basket_close">
                                    <a href="#">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <line x1="18.2482" y1="1.16125" x2="2.06094" y2="17.3485" stroke="white" stroke-width="3"/>
                                            <line x1="17.9393" y1="17.3487" x2="1.75212" y2="1.16153" stroke="white" stroke-width="3"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="skill-items" id="skillCount">

                                    <?php $skill_count = wc_get_product_tag_list($cart_item['product_id'], ';');
                                    $skill_array = explode(';', $skill_count);

                                    $card_width = 170;
                                    $card_padding = 16;
                                    $padding = 16;
                                    $gap = 8;
                                    $lower_char = 1;
                                    $upper_char = 8;

                                    $row_width = $card_width - ($card_padding * 2);
                                    $skill_length = 0;
                                    $hidden_skills = $skill_array;

                                    foreach ($skill_array as $key => $skill) {
                                        if ($skill_length > ($row_width * 2)) {
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
                        </div>
                        <?php
                    }
                }
                ?>

                <?php do_action('woocommerce_cart_contents'); ?>

    <!--            <tr>-->
    <!--                <td colspan="6" class="actions">-->
    <!---->
    <!--                    --><?php //if (wc_coupons_enabled()) { ?>
    <!--                        <div class="coupon">-->
    <!--                            <label for="coupon_code">--><?php //esc_html_e('Coupon:', 'woocommerce'); ?><!--</label> <input-->
    <!--                                    type="text" name="coupon_code" class="input-text" id="coupon_code" value=""-->
    <!--                                    placeholder="--><?php //esc_attr_e('Coupon code', 'woocommerce'); ?><!--"/>-->
    <!--                            <button type="submit" class="button" name="apply_coupon"-->
    <!--                                    value="--><?php //esc_attr_e('Apply coupon', 'woocommerce'); ?><!--">--><?php //esc_attr_e('Apply coupon', 'woocommerce'); ?><!--</button>-->
    <!--                            --><?php //do_action('woocommerce_cart_coupon'); ?>
    <!--                        </div>-->
    <!--                    --><?php //} ?>
    <!---->
    <!--                    <button type="submit" class="button" name="update_cart"-->
    <!--                            value="--><?php //esc_attr_e('Update cart', 'woocommerce'); ?><!--">--><?php //esc_html_e('Update cart', 'woocommerce'); ?><!--</button>-->
    <!---->
    <!--                    --><?php //do_action('woocommerce_cart_actions'); ?>
    <!---->
    <!--                    --><?php //wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
    <!--                </td>-->
    <!--            </tr>-->

                <?php do_action('woocommerce_after_cart_contents'); ?>
                <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" target="_blank" class="woocommerce-cart-form__cart-item cart_item add-person">
                    <svg width="76" height="75" viewBox="0 0 76 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="39.5" y1="6.5567e-08" x2="39.5" y2="75" stroke="#C4C4C4" stroke-width="3"/>
                        <line x1="75.5" y1="39" x2="0.5" y2="39" stroke="#C4C4C4" stroke-width="3"/>
                    </svg>
                    <span>Choose more Employees</span>
                </a>
            </div>
            <?php do_action('woocommerce_after_cart_table'); ?>
        </form>

            <?php do_action('woocommerce_before_cart_collaterals'); ?>
        </div>

        <div class="basket_left">
            <div class="cart-collaterals">
                <div class="basket_circle-small"></div>
                <div class="basket_circle-big"></div>
                <?php
                /**
                 * Cart collaterals hook.
                 *
                 * @hooked woocommerce_cross_sell_display
                 * @hooked woocommerce_cart_totals - 10
                 */
                do_action('woocommerce_cart_collaterals');
                ?>
            </div>
        </div>
    </div>
</div>
<div class="pdf-popup">
    <div class="pdf-background-close"></div>
    <div class="pdf-popup-inner">
        <div class="pdf-popup-content">
            <?php the_field('basket_pdf_content', 'option'); ?>
        </div>
    </div>
</div>
<?php do_action('woocommerce_after_cart'); ?>
