<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $subscription;


do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php //if ( $has_orders ) : ?>
<!---->
<!--	<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">-->
<!--		<thead>-->
<!--			<tr>-->
<!--				--><?php //foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
<!--					<th class="woocommerce-orders-table__header woocommerce-orders-table__header---><?php //echo esc_attr( $column_id ); ?><!--"><span class="nobr">--><?php //echo esc_html( $column_name ); ?><!--</span></th>-->
<!--				--><?php //endforeach; ?>
<!--			</tr>-->
<!--		</thead>-->
<!--		<tbody>-->
<!--			--><?php
//			foreach ( $customer_orders->orders as $customer_order ) {
//				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
//				$item_count = $order->get_item_count() - $order->get_item_count_refunded();
//				?>
<!--				<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status---><?php //echo esc_attr( $order->get_status() ); ?><!-- order">-->
<!--					--><?php //foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
<!--						<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell---><?php //echo esc_attr( $column_id ); ?><!--" data-title="--><?php //echo esc_attr( $column_name ); ?><!--">-->
<!--							--><?php //if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
<!--								--><?php //do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
<!--							--><?php //elseif ( 'order-number' === $column_id ) : ?>
<!--								<a href="--><?php //echo esc_url( $order->get_view_order_url() ); ?><!--">-->
<!--									--><?php //echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
<!--								</a>-->
<!--							--><?php //elseif ( 'order-date' === $column_id ) : ?>
<!--								<time datetime="--><?php //echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?><!--">--><?php //echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?><!--</time>-->
<!--							--><?php //elseif ( 'order-status' === $column_id ) : ?>
<!--								--><?php //echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
<!--							--><?php //elseif ( 'order-total' === $column_id ) : ?>
<!--								--><?php
//								/* translators: 1: formatted order total 2: total order items */
//								echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
//								?>
<!--							--><?php //elseif ( 'order-actions' === $column_id ) : ?>
<!--								--><?php
//								$actions = wc_get_account_orders_actions( $order );
//								if ( ! empty( $actions ) ) {
//									foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
//										echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
//									}
//								}
//								?>
<!--							--><?php //endif; ?>
<!--						</td>-->
<!--					--><?php //endforeach; ?>
<!--				</tr>-->
<!--				--><?php
//			}
//			?>
<!--		</tbody>-->
<!--	</table>-->
<!--	--><?php //do_action( 'woocommerce_before_account_orders_pagination' ); ?>
<!--	--><?php //if ( 1 < $customer_orders->max_num_pages ) : ?>
<!--		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">-->
<!--			--><?php //if ( 1 !== $current_page ) : ?>
<!--				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="--><?php //echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?><!--">--><?php //esc_html_e( 'Previous', 'woocommerce' ); ?><!--</a>-->
<!--			--><?php //endif; ?>
<!---->
<!--			--><?php //if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
<!--				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="--><?php //echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?><!--">--><?php //esc_html_e( 'Next', 'woocommerce' ); ?><!--</a>-->
<!--			--><?php //endif; ?>
<!--		</div>-->
<!--	--><?php //endif; ?>
<?php //else : ?>
<!--	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">-->
<!--		<a class="woocommerce-Button button" href="--><?php //echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?><!--">--><?php //esc_html_e( 'Browse products', 'woocommerce' ); ?><!--</a>-->
<!--		--><?php //esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
<!--	</div>-->
<?php //endif; ?>

<!-- CUSTOM SUBSCRIPTION VIEW -->
<?php
					$subscriptions = wcs_get_subscriptions( array(
						'customer_id'            => get_current_user_id(),
						'subscriptions_per_page' => -1
					) );
					?>

<!--					<table class="shop_table shop_table_responsive my_account_orders">-->
<!--						-->
<!--		<tbody>-->
<!--				--><?php
//					$active_sub_count = 0;
//					$non_active_sub_count = 0;
//					foreach($subscriptions as $subscription)
//					{
//						foreach( $subscription->get_items() as $item_id => $item )
//						{
//							$_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $item->get_product(), $item );
//							$product_name = $item->get_name();
//							$product_position = get_field('current_position', $item['product_id']);
//							$product_order_id = $item->get_order_id();
//							$product_subs_id = $subscription->get_data()['parent_id'];
//							$order_period = $item->get_meta( 'work-period', true );
//							$order_type_employee = $item->get_meta( 'type-of-employment', true );
//							$order_sub_price = $item->get_subtotal();
//							$sub_status = $subscription->get_data()['status'];
//							$sub_start = $subscription->get_data()['schedule_start']->format('d.m.Y');
//							// $sub_end = $subscription->get_data()['schedule_next_payment']->format('d.m.Y');
//							// $sub_start = $subscription->get_data()['schedule_start'];
//							// $sub_end = $subscription->get_data()['schedule_next_payment'];
//							$sub_end = $subscription->get_data()['schedule_end'];
//							if ($sub_end === null){
//								$sub_end = $subscription->get_data()['schedule_end'];
//							} else {
//								$sub_end = $subscription->get_data()['schedule_end']->format('d.m.Y');
//							}
//
//							if ($sub_status == 'active'){
//								$active_sub_count ++;
//							};
//							if ($sub_status == 'on-hold'){
//								$non_active_sub_count ++;
//							}
//							echo '<tr><td><span>SID: '. $product_order_id . '<br>OID: ' . $product_subs_id .'</span></td>';
//							?>
<!--                            <td><div class="employee_sub_img"><div class="img_sub" style="width: 5rem;">-->
<!--                            --><?php
//							echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product), $_product->get_image()) ));
//							?>
<!--                       		</div>-->
<!--							   --><?php
//								echo '<div><span>' . $product_name . '</span></div>';
//								?>
<!--							</td></div>-->
<!--                            --><?php
//							echo '<td><span>' . $product_position . '</span></td>';
//							echo '<td><span>'. $sub_start . '</span><span> - </span><span>' . $sub_end . '<br>' . $sub_status .'</span></td>';
//							echo '<td><span>'. $order_sub_price . '$</span></td>';
//							echo '<td><span>'. $order_type_employee . '</span></td>';
//							// echo '<td><span>Sub.Status: '. $sub_status . '</span></td>';
//							echo '<td><span>'. $order_period . '</span></td>';
//
//							?>
<!--							<td><span><a href="--><?php //echo esc_url( $subscription->get_view_order_url() ) ?><!--" class="woocommerce-button button view">--><?php //echo esc_html_x( 'Details', 'view a subscription', 'woocommerce-subscriptions' ); ?><!--</a><br><br></span></td></tr>-->
<!--							-->
<!--							--><?php
//
//
//							// print_r($invoice);
//
//						}
//
//						// print_r($item);
//						// print_r($subscription);
//						// foreach ($subscription->get_data() as $allvals => $value){
//						// 	echo $allvals.', : '.$value.'<br/>';
//						// }
//					}
//					// print_r($item);
//					// print_r($subscription);
//
//					?>
<!--					-->
<!--			-->
<!--		</tbody>-->
<!--									<!-- <span class="nobr">Total Subscriptions: --><?php //echo count($subscriptions); ?><!--</span>-->
<!--									<span>Active: --><?php //echo $active_sub_count; ?><!--</span>-->
<!--									<span>Non-active: --><?php //echo $non_active_sub_count; ?><!--</span> -->
<!--						<thead>-->
<!--							<tr>-->
<!--								<!-- <th>-->
<!--									<span class="nobr">Total Subscriptions: --><?php //echo count($subscriptions); ?><!--</span><br>-->
<!--									<span>Active: --><?php //echo $active_sub_count; ?><!--</span><br>-->
<!--									<span>Non-active: --><?php //echo $non_active_sub_count; ?><!--</span>-->
<!--								</th> -->
<!--								<th>-->
<!--									<span class="nobr">Order</span><br>-->
<!--								</th>-->
<!--								<th>-->
<!--									<span class="nobr">Employee</span><br>-->
<!--								</th>-->
<!--								<th>-->
<!--									<span class="nobr">Position</span><br>-->
<!--								</th>-->
<!--								<th>-->
<!--									<span class="nobr">Period</span><br>-->
<!--								</th>-->
<!--								<th>-->
<!--									<span class="nobr">Total</span><br>-->
<!--								</th>-->
<!--								<th>-->
<!--									<span class="nobr">Type</span><br>-->
<!--								</th>-->
<!--								<th>-->
<!--									<span class="nobr">Time remaining</span><br>-->
<!--								</th>-->
<!--								<th>-->
<!--									<span class="nobr">Actions</span><br>-->
<!--								</th>-->
<!--							</tr>-->
<!--						</thead>-->
<!--	</table>-->
<!--</div>-->
<div class="billing-content">
    <h1>Billing History</h1>

    <div class="billing-info">
        <div class="billing-header">
            <span class="billing-header-text">
                Billing info
            </span>
            <a href="https://www.rhelpers.com/my-account/edit-account/" class="billing-header-button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 20.0001H4.99999C4.73478 20.0001 4.48042 20.1055 4.29288 20.293C4.10535 20.4805 3.99999 20.7349 3.99999 21.0001C3.99999 21.2653 4.10535 21.5197 4.29288 21.7072C4.48042 21.8947 4.73478 22.0001 4.99999 22.0001H19C19.2652 22.0001 19.5196 21.8947 19.7071 21.7072C19.8946 21.5197 20 21.2653 20 21.0001C20 20.7349 19.8946 20.4805 19.7071 20.293C19.5196 20.1055 19.2652 20.0001 19 20.0001ZM4.99999 18.0001H5.08999L9.25999 17.6201C9.71679 17.5746 10.144 17.3733 10.47 17.0501L19.47 8.0501C19.8193 7.68107 20.0081 7.18861 19.995 6.68064C19.9818 6.17267 19.7679 5.69061 19.4 5.3401L16.66 2.6001C16.3024 2.2642 15.8338 2.07146 15.3433 2.05855C14.8529 2.04565 14.3748 2.21347 14 2.5301L4.99999 11.5301C4.67676 11.8561 4.4755 12.2833 4.42999 12.7401L3.99999 16.9101C3.98652 17.0566 4.00553 17.2042 4.05565 17.3425C4.10578 17.4808 4.18579 17.6063 4.28999 17.7101C4.38343 17.8028 4.49425 17.8761 4.61609 17.9259C4.73792 17.9756 4.86838 18.0009 4.99999 18.0001ZM15.27 4.0001L18 6.7301L16 8.6801L13.32 6.0001L15.27 4.0001Z" fill="#005BBB"/>
                </svg>
            </a>
        </div>
        <div class="billing-items">
            <div class="billing-item">
                <span class="billing-item-suptitle">Full name</span>
                <div class="billing-item-title"><?php echo wp_get_current_user()->first_name . ' ' . wp_get_current_user()->last_name; ?></div>
            </div>
            <div class="billing-item">
                <span class="billing-item-suptitle">Company name</span>
                <div class="billing-item-title"><?php echo esc_attr( wp_get_current_user()->compan ); ?></div>
            </div>
            <div class="billing-item">
                <span class="billing-item-suptitle">City, Country</span>
                <div class="billing-item-title"><?php echo esc_attr(wp_get_current_user()->city ); ?>,<?php echo esc_attr(wp_get_current_user()->country ); ?> </div>
            </div>
            <div class="billing-item">
                <span class="billing-item-suptitle">E-mail address</span>
                <div class="billing-item-title"><?php echo wp_get_current_user()->user_email ?></div>
            </div>
        </div>
    </div>
    <?php if ( $has_orders ) : ?>
    <div class="billing-table">
        <div class="billing-table-header">
            <div class="dashboard-table-sort">
                <span>Sort by:</span>
                <div class="dropdown">
                    <a href="#" class="js-link">From new
                        <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.8627 0H1.1559C0.717908 0 0.491595 0.523188 0.791512 0.84238L6.20855 6.60756C6.40763 6.81943 6.74481 6.81743 6.94136 6.60322L12.2311 0.838035C12.5253 0.51739 12.2978 0 11.8627 0Z" fill="#005BBB"/>
                        </svg>
                    </a>
                    <ul class="js-dropdown-list">
                        <li>Option 1</li>
                        <li>Option 2</li>
                        <li>Option 3</li>
                        <li>* Reset</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="custom-table visible">
            <div class="custom-table-head">
                <div class="custom-table-th">
                    <span>Order</span>
                </div>
                <div class="custom-table-th">
                    <span>Date</span>
                </div>
                <div class="custom-table-th">
                    <span>Type</span>
                </div>
                <div class="custom-table-th">
                    <span>Position</span>
                </div>
                <div class="custom-table-th">
                    <span>Payment method</span>
                </div>
                <div class="custom-table-th">
                   <span>Total</span>
                </div>
                <div class="custom-table-th">
                    <span>Invoice</span>
                </div>
                <div class="custom-table-th">
                    <span>Action</span>
                </div>
            </div>
            <div class="custom-table-body">

                <?php
                			foreach ( $customer_orders->orders as $customer_order ) {
                				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                foreach( $customer_order->get_items() as $item_id => $item ) {
                                    $item_count = $order->get_item_count() - $order->get_item_count_refunded();
//                                    $product_order_id = $item->get_order_id();
//                                    $product_subs_id = $subscription->get_data()['parent_id'];
                                    $actions = wc_get_account_orders_actions($order);
                                    ?>
                                <div class="custom-table-tr">
                                    <div class="custom-table-td"><span>#<?php echo $order->get_order_number(); ?></span></div>

                                    <div class="custom-table-td">
                                        <span><?php echo $order->get_date_paid()->format('d.m.Y');
//                                                ->date_i18n( 'd.m.Y');
                                        ?></span>
                                    </div>
                                    <div class="custom-table-td">
<!--                                        <span>Part-time</span>-->
                                        <?php

                                        echo $item->get_meta('choose-type-of-employment');

                                        ?>
                                    </div>
                                    <div class="custom-table-td">
<!--                                        <span>UX/UI designer</span>-->
                                        <?php echo get_field('current_position', $item['product_id']);
                                        ?>
                                    </div>
                                    <div class="custom-table-td">
<!--                                        <span>**** **** **** 0485</span>-->
                                        <?php
//                                        print_r(wc_get_customer_saved_methods_list($item));
                                        echo $order->get_payment_method_title();
//                                        foreach (wc_get_customer_saved_methods_list($order) as $itemz) {
//                                            print_r($itemz);
//                                            foreach ($itemz as $key => $it) {
//                                                print_r($it['method']['last4']);
//                                            }
//                                        }
//                                        echo sprintf( esc_html__( '**** **** **** %2$s', 'woocommerce' ), esc_html( wc_get_credit_card_type_label( $method['method']['brand'] ) ), esc_html( $method['method']['last4'] ) );
                                        ?>
                                    </div>
                                    <div class="custom-table-td">
                                        $<?php echo $item->get_subtotal();

                                        ?>

                                    </div>
                                    <div class="custom-table-td">
                                            <?php
                                            echo '<a href="' . $actions['invoice']['url'] . '" class="button ">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="7.23535" y="9.26465" width="9.22059" height="9.22059" fill="#005BBB"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.11765 2H13.3824L18.4118 7.02941V19.8824C18.4118 20.1788 18.294 20.4631 18.0844 20.6726C17.8748 20.8822 17.5905 21 17.2941 21H6.11765C5.82123 21 5.53695 20.8822 5.32735 20.6726C5.11775 20.4631 5 20.1788 5 19.8824V3.11765C5 2.82123 5.11775 2.53695 5.32735 2.32735C5.53695 2.11775 5.82123 2 6.11765 2ZM16.7353 7.02941L13.3824 3.67647V6.47059C13.3824 6.6188 13.4412 6.76094 13.546 6.86574C13.6508 6.97054 13.793 7.02941 13.9412 7.02941H16.7353ZM15.4539 11.1049C15.5587 11.2097 15.6175 11.3518 15.6175 11.5C15.6175 11.6482 15.5587 11.7903 15.4539 11.8951L10.5882 16.7608L7.95785 14.1304C7.85606 14.025 7.79973 13.8838 7.80101 13.7373C7.80228 13.5908 7.86105 13.4506 7.96466 13.347C8.06827 13.2434 8.20843 13.1846 8.35495 13.1834C8.50147 13.1821 8.64263 13.2384 8.74803 13.3402L10.5882 15.1804L14.6637 11.1049C14.7685 11.0001 14.9106 10.9413 15.0588 10.9413C15.207 10.9413 15.3491 11.0001 15.4539 11.1049Z" fill="#005BBB"/>
                                                    </svg>
                                            </a>';
                                           ?>
                                    </div>
                                    <div class="custom-table-td">
                                        <div class="dropdown-simple">
                                            <a href="#" class="dropdown-link-action">
                                                <svg width="23" height="5" viewBox="0 0 23 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                                    <circle cx="11.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                                    <circle cx="20.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-list-simple">
                                                <?php
                                                foreach ( $actions as $key => $action ) {
                                                    echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
                                                } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                				<?php
                			}}
                			?>



                <?php
                $active_sub_count = 0;
                $non_active_sub_count = 0;
                foreach($subscriptions as $subscription)
                {
                    foreach( $subscription->get_items() as $item_id => $item )
                    {

                        $product_subs_id = $subscription->get_data()['parent_id'];
                        $actions = wc_get_account_orders_actions( $product_subs_id );
                        $product_order_id = $item->get_order_id();

                        //							echo '<tr><td><span>SID: '. $product_order_id . '<br>OID: ' . $product_subs_id .'</span></td>';
                        ?>
<!--                        <div class="custom-table-tr">-->
<!--                            --><?php //echo '<div class="custom-table-td"><span>#' . $product_subs_id .'</span></div>'; ?>
<!---->
<!--                            <div class="custom-table-td">-->
<!--                                <span>20.9.2022</span>-->
<!--                              --><?php ////echo $has_orders->order->get_date_paid()->date_i18n( wc_date_format() ); ?>
<!--                            </div>-->
<!--                            <div class="custom-table-td">-->
<!--                                <span>Part-time</span>-->
<!--                            </div>-->
<!--                            <div class="custom-table-td">-->
<!--                                <span>UX/UI designer</span>-->
<!--                            </div>-->
<!--                            <div class="custom-table-td">-->
<!--                                <span>**** **** **** 0485</span>-->
<!--                            </div>-->
<!--                            <div class="custom-table-td">-->
<!--                                <span>$1100</span>-->
<!--                            </div>-->
<!--                            <div class="custom-table-td">-->
<!--                                <span>-->
<!--                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<rect x="7.23535" y="9.26465" width="9.22059" height="9.22059" fill="#005BBB"/>-->
<!--<path fill-rule="evenodd" clip-rule="evenodd" d="M6.11765 2H13.3824L18.4118 7.02941V19.8824C18.4118 20.1788 18.294 20.4631 18.0844 20.6726C17.8748 20.8822 17.5905 21 17.2941 21H6.11765C5.82123 21 5.53695 20.8822 5.32735 20.6726C5.11775 20.4631 5 20.1788 5 19.8824V3.11765C5 2.82123 5.11775 2.53695 5.32735 2.32735C5.53695 2.11775 5.82123 2 6.11765 2ZM16.7353 7.02941L13.3824 3.67647V6.47059C13.3824 6.6188 13.4412 6.76094 13.546 6.86574C13.6508 6.97054 13.793 7.02941 13.9412 7.02941H16.7353ZM15.4539 11.1049C15.5587 11.2097 15.6175 11.3518 15.6175 11.5C15.6175 11.6482 15.5587 11.7903 15.4539 11.8951L10.5882 16.7608L7.95785 14.1304C7.85606 14.025 7.79973 13.8838 7.80101 13.7373C7.80228 13.5908 7.86105 13.4506 7.96466 13.347C8.06827 13.2434 8.20843 13.1846 8.35495 13.1834C8.50147 13.1821 8.64263 13.2384 8.74803 13.3402L10.5882 15.1804L14.6637 11.1049C14.7685 11.0001 14.9106 10.9413 15.0588 10.9413C15.207 10.9413 15.3491 11.0001 15.4539 11.1049Z" fill="#005BBB"/>-->
<!--</svg>-->
<!--                                </span>-->
<!--                            </div>-->
<!--                            <div class="custom-table-td">-->
<!--                                <div class="dropdown-simple">-->
<!--                                    <a href="#" class="dropdown-link-action">-->
<!--                                        <svg width="23" height="5" viewBox="0 0 23 5" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                            <circle cx="2.5" cy="2.5" r="2.5" fill="#005BBB"/>-->
<!--                                            <circle cx="11.5" cy="2.5" r="2.5" fill="#005BBB"/>-->
<!--                                            <circle cx="20.5" cy="2.5" r="2.5" fill="#005BBB"/>-->
<!--                                        </svg>-->
<!--                                    </a>-->
<!--                                    <ul class="dropdown-list-simple">-->
<!--                                        --><?php
//                                        foreach ( $actions as $key => $action ) {
//                                            echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
//                                        } ?>
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>


<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
