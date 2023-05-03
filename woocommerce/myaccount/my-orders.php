<?php
/**
 * My Orders - Deprecated
 *
 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $subscription;

$my_orders_columns = apply_filters(
	'woocommerce_my_account_my_orders_columns',
	array(
		'order-number'  => esc_html__( 'Order', 'woocommerce' ),
		'order-date'    => esc_html__( 'Date', 'woocommerce' ),
		'order-status'  => esc_html__( 'Status', 'woocommerce' ),
		'order-total'   => esc_html__( 'Total', 'woocommerce' ),
		'order-actions' => '&nbsp;',
	)
);

$customer_orders = get_posts(
	apply_filters(
		'woocommerce_my_account_my_orders_query',
		array(
			// 'numberposts' => $order_count,
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types( 'view-orders' ),
			'post_status' => array_keys( wc_get_order_statuses() ),
		)
	)
);

if ( $customer_orders ) : ?>

<!--	<h2>--><?php //echo apply_filters( 'woocommerce_my_account_my_orders_title', esc_html__( 'Recent orders', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</h2>-->

<!--	<table class="shop_table shop_table_responsive my_account_orders">-->
<!---->
<!--		<thead>-->
<!--			<tr>-->
<!--				--><?php //foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
<!--					<th class="--><?php //echo esc_attr( $column_id ); ?><!--"><span class="nobr">--><?php //echo esc_html( $column_name ); ?><!--</span></th>-->
<!--				--><?php //endforeach; ?>
<!--			</tr>-->
<!--		</thead>-->
<!---->
<!--		<tbody>-->
<!--			--><?php
//			foreach ( $customer_orders as $customer_order ) :
//				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
//				$item_count = $order->get_item_count();
//				?>
<!--				<tr class="order">-->
<!--					--><?php //foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
<!--						<td class="--><?php //echo esc_attr( $column_id ); ?><!--" data-label="--><?php //echo esc_html( $column_name ); ?><!--" data-title="--><?php //echo esc_attr( $column_name ); ?><!--">-->
<!--							--><?php //if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
<!--								--><?php //do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
<!---->
<!--							--><?php //elseif ( 'order-number' === $column_id ) : ?>
<!--								<a href="--><?php //echo esc_url( $order->get_view_order_url() ); ?><!--">-->
<!--									--><?php //echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<!--								</a>-->
<!---->
<!--							--><?php //elseif ( 'order-date' === $column_id ) : ?>
<!--								<time datetime="--><?php //echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?><!--">--><?php //echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?><!--</time>-->
<!---->
<!--							--><?php //elseif ( 'order-status' === $column_id ) : ?>
<!--								--><?php //echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
<!---->
<!--							--><?php //elseif ( 'order-total' === $column_id ) : ?>
<!--								--><?php
//								/* translators: 1: formatted order total 2: total order items */
//								printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
//								?>
<!---->
<!--							--><?php //elseif ( 'order-actions' === $column_id ) : ?>
<!--								--><?php
//								$actions = wc_get_account_orders_actions( $order );
//
//								if ( ! empty( $actions ) ) {
//									foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
//										echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
//									}
//								}
//								?>
<!--							--><?php //endif; ?>
<!--						</td>-->
<!--					--><?php //endforeach; ?>
<!--				</tr>-->
<!--			--><?php //endforeach; ?>
<!--		</tbody>-->
<!--	</table>-->

	<?php 
					$subscriptions = wcs_get_subscriptions( array(
						'customer_id'            => get_current_user_id(),
						'subscriptions_per_page' => -1
					) );
					?>
					<table class="shop_table shop_table_responsive my_account_orders visible">
						
		<tbody>
				<?php
					$active_sub_count = 0;
					$non_active_sub_count = 0;
					foreach($subscriptions as $subscription)
					{
						foreach( $subscription->get_items() as $item_id => $item ) 
						{
							$_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $item->get_product(), $item );
							$product_name = $item->get_name();
							$product_position = get_field('current_position', $item['product_id']);
							$product_order_id = $item->get_order_id();
							$product_subs_id = $subscription->get_data()['parent_id'];
							$actions = wc_get_account_orders_actions( $product_subs_id );
							$order_period = $item->get_meta( 'work-period', true );
							$order_type_employee = $item->get_meta( 'type-of-employment', true );
							$order_sub_price = $item->get_subtotal();
							$sub_status = $subscription->get_data()['status'];
							$sub_start = $subscription->get_data()['schedule_start']->format('d.m.Y');
							$sub_end = $subscription->get_data()['schedule_end'];
							if ($sub_end === null){
								$sub_end = $subscription->get_data()['schedule_end'];
							} else {
								$sub_end = $subscription->get_data()['schedule_end']->format('d.m.Y');
							}
							
							if ($sub_status == 'active'){
								$active_sub_count ++;
							};
							if ($sub_status == 'on-hold'){
								$non_active_sub_count ++;
							}
//							echo '<tr><td><span>SID: '. $product_order_id . '<br>OID: ' . $product_subs_id .'</span></td>';
							?>
                            <td><div class="employee_sub_img"><div class="img_sub" style="width: 5rem;">
                            <?php
							echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product), $_product->get_image()) ));
							?>
                       		</div>
							   <?php
								echo '<div><span>' . $product_name . '</span></div>';
								?>
							</td></div>
                            <?php
							echo '<td><span>' . $product_position . '</span></td>';
							echo '<td><span>'. $sub_start . '</span><span> - </span><span>' . $sub_end . '<!--<br>' . $sub_status .'--></span></td>';
							echo '<td><span>'. $order_sub_price . '$</span></td>';
							echo '<td><span>'. $order_type_employee . '</span></td>';
							echo '<td><span>'. $order_period . '</span></td>';
							?>
							<td>
							<?php
							foreach ( $actions as $key => $action ) {
								echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
							} ?>
						</td>
                            </tr>
							<?php
						}
					}
					?>
		</tbody>
						<thead>
							<tr>
<!--								<th>-->
<!--									<span class="nobr">Order</span><br>-->
<!--								</th>-->
								<th>
									<span class="nobr">Employee</span><br>
								</th>
								<th>
									<span class="nobr">Position</span><br>
								</th>
								<th>
									<span class="nobr">Period</span><br>
								</th>
								<th>
									<span class="nobr">Total</span><br>
								</th>
								<th>
									<span class="nobr">Type</span><br>
								</th>
								<th>
									<span class="nobr">Time remaining</span><br>
								</th>
								<th>
									<span class="nobr">Actions</span><br>
								</th>
							</tr>
						</thead>
	</table>
<div class="custom-table">
    <div class="custom-table-head">
        <div class="custom-table-th">
            <span>Employee</span>
        </div>
        <div class="custom-table-th">
            <span>Position</span>
        </div>
        <div class="custom-table-th">
            <span>Period</span>
        </div>
        <div class="custom-table-th">
            <span>Total</span>
        </div>
        <div class="custom-table-th">
            <span>Type</span>
        </div>
        <div class="custom-table-th">
            <span>Time remaining</span>
        </div>
        <div class="custom-table-th">
            <span>Actions</span>
        </div>
    </div>
    <div class="custom-table-body">
        <?php
        $active_sub_count = 0;
        $non_active_sub_count = 0;
        foreach($subscriptions as $subscription)
        {
        foreach( $subscription->get_items() as $item_id => $item )
        {
        $_product  = apply_filters( 'woocommerce_subscriptions_order_item_product', $item->get_product(), $item );
        $product_name = $item->get_name();
        $product_position = get_field('current_position', $item['product_id']);
        $product_order_id = $item->get_order_id();
        $product_subs_id = $subscription->get_data()['parent_id'];
        $actions = wc_get_account_orders_actions( $product_subs_id );
        $order_period = $item->get_meta( 'work-period', true );
        $order_type_employee = $item->get_meta( 'type-of-employment', true );
        $order_sub_price = $item->get_subtotal();
        $sub_status = $subscription->get_data()['status'];
        $sub_start = $subscription->get_data()['schedule_start']->format('d.m.Y');
        $sub_end = $subscription->get_data()['schedule_end'];
        if ($sub_end === null){
            $sub_end = $subscription->get_data()['schedule_end'];
        } else {
            $sub_end = $subscription->get_data()['schedule_end']->format('d.m.Y');
        }

        if ($sub_status == 'active'){
            $active_sub_count ++;
        };
        if ($sub_status == 'on-hold'){
            $non_active_sub_count ++;
        }
        //							echo '<tr><td><span>SID: '. $product_order_id . '<br>OID: ' . $product_subs_id .'</span></td>';
        ?>
    <div class="custom-table-tr">
        <div class="custom-table-td"><div class="employee_sub_img">
                <div class="img_sub" style="width: 5rem;">
                    <?php
                    echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product), $_product->get_image()) ));
                    ?>
                </div>
                <?php
                echo '<div><span>' . $product_name . '</span></div>';
                ?>
            </div>
        </div>
    <?php
    echo '<div class="custom-table-td"><span>' . $product_position . '</span></div>';
    echo '<div class="custom-table-td"><span>'. $sub_start . '</span><span> - </span><span>' . $sub_end . '<!--<br>' . $sub_status .'--></span></div>';
    echo '<div class="custom-table-td"><span>'. $order_sub_price . '$</span></div>';
    echo '<div class="custom-table-td"><span>'. $order_type_employee . '</span></div>';
    echo '<div class="custom-table-td"><span>'. $order_period . '</span></div>';
    ?>
    <div class="custom-table-td">
        <?php
        foreach ( $actions as $key => $action ) {
            echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
        } ?>
    </div>
<!--            </tr>-->
    </div>
    <?php
    }
    }
    ?>
    </div>
</div>

<?php endif; ?>
