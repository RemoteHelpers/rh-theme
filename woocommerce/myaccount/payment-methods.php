<?php
/**
 * Payment methods
 *
 * Shows customer payment methods on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/payment-methods.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$saved_methods = wc_get_customer_saved_methods_list( get_current_user_id() );
$has_methods   = (bool) $saved_methods;
$types         = wc_get_account_payment_methods_types();

do_action( 'woocommerce_before_account_payment_methods', $has_methods ); ?>

<?php if ( $has_methods ) : ?>
	<h1>Payment Methods</h1>
	<?php do_action( 'woocommerce_after_account_payment_methods', $has_methods ); ?>
<?php if ( WC()->payment_gateways->get_available_payment_gateways() ) : ?>
	<!-- <a class="button add_payment" href="<?php echo esc_url( wc_get_endpoint_url( 'add-payment-method' ) ); ?>"><?php esc_html_e( 'Add Payment Method', 'woocommerce' ); ?></a> -->
	<a class="button add_payment open_popup_payment" href="#paymen_tmodal" rel="modal:open">Add Payment Method</a>
<?php endif; ?>
		<div class="paymant_section_wrap">
		<?php foreach ( $saved_methods as $type => $methods ) : ?>
			<?php foreach ( $methods as $method ) : ?>
				<div class="payment-method payment_card_wrap<?php echo ! empty( $method['is_default'] ) ? ' default-payment-method' : ''; ?>">
					<?php foreach ( wc_get_account_payment_methods_columns() as $column_id => $column_name ) : ?>
						<div class="woocommerce-PaymentMethod woocommerce-PaymentMethod--<?php echo esc_attr( $column_id ); ?> payment-method-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php
							if ( has_action( 'woocommerce_account_payment_methods_column_' . $column_id ) ) {
								do_action( 'woocommerce_account_payment_methods_column_' . $column_id, $method );
							
							} elseif ( 'method' === $column_id ) {
								if ( ! empty( $method['method']['last4'] ) ) {
                                    
                                    ?>
                                    <div class="payment_card_head">
                                     <p>Credit Card</p>
									 <p class="payment_card_logo"></p>
                                    </div>


                                    <div class="card_body">
										<p>
                                        <?php
                                    echo sprintf( esc_html__( '**** **** **** %2$s', 'woocommerce' ), esc_html( wc_get_credit_card_type_label( $method['method']['brand'] ) ), esc_html( $method['method']['last4'] ) );
                                    ?>
									</p>
									<img src="https://www.rhelpers.com/wp-content/uploads/2022/11/fluent_eye.png" alt="icon">
                                    </div>
									<div class="bottom_card_wrap">
                                    <div class="card_bottom_name">
										<p class="cardp_info">CARD HOLDER NAME</p>
                                        <?php
                                    echo wp_get_current_user()->first_name;
                                    ?>
                                    </div>
									<div class="card_exp">
									<p class="cardp_info">EXPIRY DATE</p>
                                        <?php
                                    echo esc_html( $method['expires'] );
									// print_r($method);
									foreach ( $method['actions'] as $key => $delete ) { 
										// print_r($delete);
										// print_r($delete['name']);
										// print_r($delete);
										// while ($delete['url']) {
										// 	echo '<p>1</p>';
										// }
										// echo '<p class="testp">' . $delete['url'] . '</p>';
										
										// while (list($key, $val) = each($delete)) {
										// 	echo '<p class="testp">' . $val . '</p>';
										// }
										// if($action['name'] = "Delete"){
										// 	echo '<p class="testp">OK</p>';
										// }
									}
									
                                    ?>
                                    </div>
									</div>
                                    
                                    <?php
                                    
								} else {
									// echo esc_html( wc_get_credit_card_type_label( $method['method']['brand'] ) );
								}
							} elseif ( 'expires' === $column_id ) {
								?>
								<!-- <p class="cardp_info">EXPIRY DATE</p> -->
								<?php
								// echo esc_html( $method['expires'] );
								// foreach ( $method['actions'] as $key => $action ) {
								// 	echo '<a class="payment_actions" href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>&nbsp;';
								// 	}
							} elseif ( 'actions' === $column_id ) {
								?>
								
									<?php
								foreach ( $method['actions'] as $key => $action ) { 
									
							
									
									// echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>&nbsp;';

									
									echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '" title="' . esc_html( $action['name'] ) . '"></a>&nbsp;';
									
									
									// echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>&nbsp;';
									// echo '<p class="testp">' . esc_html( $action['name'] ) . '</p>';
									// print_r($method);
								}?>
								<?php
							}
							?>
							
							
						</div>
					<?php endforeach; ?>
					
				</div>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
<?php else : ?>
	<p class="woocommerce-Message woocommerce-Message--info woocommerce-info"><?php esc_html_e( 'No saved methods found.', 'woocommerce' ); ?></p>
<?php endif; ?>


<!-- //POPUP ADD -->
<div id="paymen_modal_wrap" class="modal_wrap"></div>
<div id="paymen_modal" class="modal">
<a class="close-modal" href="#"></a>
<?php 
$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
if ( $available_gateways ) : ?>
	<h1 class="payment-title-popup">Payment Method</h1>
	<form id="add_payment_method" method="post">
		<div id="payment" class="woocommerce-Payment">
			<ul class="woocommerce-PaymentMethods payment_methods methods">
				<?php
				// Chosen Method.
				if ( count( $available_gateways ) ) {
					current( $available_gateways )->set_current();
				}

				foreach ( $available_gateways as $gateway ) {
					?>
					<li class="woocommerce-PaymentMethod woocommerce-PaymentMethod--<?php echo esc_attr( $gateway->id ); ?> payment_method_<?php echo esc_attr( $gateway->id ); ?>">

					

					<div class="payment_select">
					<p class="payment-add-card-title">Choose payment method</p>
						<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> />
						<!-- <label class="payment_label" for="payment_method_<?php echo esc_attr( $gateway->id ); ?>"><?php echo wp_kses_post( $gateway->get_title() ); ?> <?php echo wp_kses_post( $gateway->get_icon() ); ?><img src="http://i.stack.imgur.com/FSN1q.png"></label> -->
							<label class="payment_label" for="payment_method_<?php echo esc_attr( $gateway->id ); ?>"><img src="https://www.rhelpers.com/wp-content/uploads/2022/11/credit-card.png"></label>
					</div>
						<?php
						if ( $gateway->has_fields() || $gateway->get_description() ) {
							echo '<div class="woocommerce-PaymentBox woocommerce-PaymentBox--' . esc_attr( $gateway->id ) . ' payment_box payment_method_' . esc_attr( $gateway->id ) . '" style="display: none;"><p class="payment-add-info-title">Card info</p>';
							$gateway->payment_fields();
							echo '</div>';
						}
						?>
					</li>
					<?php
				}
				?>
			</ul>

			<?php do_action( 'woocommerce_add_payment_method_form_bottom' ); ?>

			<div class="form-row">
				<?php wp_nonce_field( 'woocommerce-add-payment-method', 'woocommerce-add-payment-method-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-Button--alt button alt add_payment add_payment_button_pop" id="place_order" value="<?php esc_attr_e( 'Add payment method', 'woocommerce' ); ?>"><?php esc_html_e( 'Add payment method', 'woocommerce' ); ?></button>
				<input type="hidden" name="woocommerce_add_payment_method" id="woocommerce_add_payment_method" value="1" />
			</div>
		</div>
	</form>
<?php else : ?>
	<p class="woocommerce-notice woocommerce-notice--info woocommerce-info"><?php esc_html_e( 'New payment methods can only be added during checkout. Please contact us if you require assistance.', 'woocommerce' ); ?></p>
<?php endif; ?>
</div>
