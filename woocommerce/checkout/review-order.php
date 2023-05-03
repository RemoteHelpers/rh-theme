<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>
	<div class="checkout_your_order woocommerce-checkout-review-order-table">
		<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
		    <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
		        <div class="table_wrap">
                   <div class="head_options">
                        <div class="person"><p>Person</p></div>
		                <div class="subscription"><p>Sub</p></div>
                        <div class="id"><p>ID</p></div>
                        <div class="shifts"><p>Shifts</p></div>
                        <div class="price"><p>Price</p></div>
                   </div>
			            <?php
			                 do_action( 'woocommerce_review_order_before_cart_contents' );
			                     foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					    ?>
						<?php
							$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '',               $cart_item, $cart_item_key);
				        ?>
                           <div class="order_items">
                                   <div class="person_main">
                                       <div class="person_thumb"><?php echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product_permalink), $_product->get_image()), $cart_item, $cart_item_key ));?></div>    
                                       <div class="person_name"><span><?php echo (apply_filters( 'woocommerce_cart_item_name', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product_permalink), $_product->get_title()), $cart_item, $cart_item_key )); ?></span>
                                       <span class="person_position"><?php echo get_field('current_position', $cart_item['product_id']); ?></span>
			                           </div>
                                   </div>
					               <div class="info_titles">
					                   <span class="mobile-info">Sub</span>
					                   <span class="mobile-info">ID</span>
					                   <span class="mobile-info">Shifts</span>
					                   <span class="mobile-info">Price</span>
					               </div>
                                    <div class="person-info">
	                                    <div class="person_subscription"><span class="info"><span class="details_info"><?php echo wc_get_formatted_cart_item_data( $cart_item ); ?></span></span></div>
                                        <div class="person_id"><span class="info"><span class="details_info id_forform"><?php echo $product_id = $cart_item['data']->get_sku(); ?></span></span></div>
                                        <div class="person_shifts"><span class="info"><span class="details_info">
                                   <?php
								        $shift_choise = get_field_object('shifts', $cart_item['product_id']);
							       ?>
							       <?php switch($shift_choise['value']){
									case 'fas fa-sun':
											echo 'Day';
										break;
									case 'fas fa-moon':
											echo 'Night';
										break;	
							       };?></span></span></div>
                                       <div class="person_price"><span class="info"><span class="details_info"><?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></span></span></div>
	                                </div>
		                </div>       
					<?php
				            }
			             }
			         do_action( 'woocommerce_review_order_after_cart_contents' );
			         ?>
           </div>
   		        <div class="order-total">
			        <div class="t-total"><span><?php esc_html_e( 'Total:', 'woocommerce' ); ?></span></div>
			        <div class="t-price" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
		        </div>
				
			    <div class="order-login-form">
			    </div>
		
    </div>
	
    <script>
//Update Checkout when remove item from mini-cart 
jQuery( ".remove" ).click(function() {
  setTimeout( function(){   jQuery(document.body).trigger("update_checkout"); }, 1000 );
});
 
//Update Checkout when remove item from checkout  
jQuery( function($){
    if (typeof woocommerce_params === 'undefined')
        return false;
  $(document).on('click', '.woocommerce-checkout-review-order-table .remove_item', function (e){
//e.preventDefault();
//var product_id = $(this).attr("data-product_id"),
//    cart_item_key = $(this).attr("data-cart_item_key"),
//    product_container = $(this).parents('.table_wrap');
// $.ajax({
//    type: 'POST',
//    dataType: 'json',
//    url: wc_checkout_params.ajax_url,
//    data: {
//        action: "product_remove",
//        product_id: product_id,
//        cart_item_key: cart_item_key
//    },
//    success: function (result) {
//                $('body').trigger('update_checkout');
                jQuery(document.body).trigger('wc_fragment_refresh');
//        }
//    });
});
});   
</script>