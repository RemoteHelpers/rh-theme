<?php

/**
 * Add breadcrumbs
 */
add_action('rh_before_product_body', 'woocommerce_breadcrumb', 20);
add_action('rh_before_product_meta', 'woocommerce_breadcrumb', 20);

/**
 * Change breadcrumb looks
 */
$home_breadcrumb_icon = '<i class="fa-sharp fa-solid fa-house"></i>';
add_filter( 'woocommerce_breadcrumb_defaults', 'rh_woocommerce_breadcrumbs' );
function rh_woocommerce_breadcrumbs() {
    return array(
        'delimiter' => ' > ',
        'wrap_before' => '<nav class="woocommerce-breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">',
        'wrap_after' => '</nav>',
        'before' => ' ',
        'after' => '',
        'home' => _x( '<i class="fa-sharp fa-solid fa-house"></i>', 'breadcrumb', 'woocommerce' ),
    );
}

/**
 * Remove "cookies" field from comments form.
 */
remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );

/**
 * Remove tabs.
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);