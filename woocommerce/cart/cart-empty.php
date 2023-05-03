<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="basket_container">
    <div class="basket_empty">
        <h2><?php the_title(); ?></h2>
    <?php
    /*
     * @hooked wc_empty_cart_message - 10
     */

    do_action( 'woocommerce_cart_is_empty' );

    if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
        <p class="return-to-shop">
<!--            <a class="button wc-backward" href="--><?php //echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?><!--">-->
<!--                --><?php
//                    /**
//                     * Filter "Return To Shop" text.
//                     *
//                     * @since 4.6.0
//                     * @param string $default_text Default text.
//                     */
//                    echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
//                ?>
<!--            </a>-->
            <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" target="_blank" class="woocommerce-cart-form__cart-item cart_item add-person">
                <svg width="76" height="75" viewBox="0 0 76 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="39.5" y1="6.5567e-08" x2="39.5" y2="75" stroke="#C4C4C4" stroke-width="3"/>
                    <line x1="75.5" y1="39" x2="0.5" y2="39" stroke="#C4C4C4" stroke-width="3"/>
                </svg>
                <span>Choose more Employees</span>
            </a>
        </p>
    <?php endif; ?>
    </div>
</div>
