<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
    return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
    wc_get_template(
        'order/order-downloads.php',
        array(
            'downloads'  => $downloads,
            'show_title' => true,
        )
    );
}
?>
    <section class="woocommerce-order-details">

        <?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

        <h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order details', 'woocommerce' ); ?></h2>

        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

            <thead>
            <tr>
                <th class="woocommerce-table__product-name product-name"> <?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                <th class="woocommerce-table__product-table product-total"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            do_action( 'woocommerce_order_details_before_order_table_items', $order );

            foreach ( $order_items as $item_id => $item ) {
                $product = $item->get_product();

                wc_get_template(
                    'order/order-details-item.php',
                    array(
                        'order'              => $order,
                        'item_id'            => $item_id,
                        'item'               => $item,
                        'show_purchase_note' => $show_purchase_note,
                        'purchase_note'      => $product ? $product->get_purchase_note() : '',
                        'product'            => $product,
                    )
                );
            }

            do_action( 'woocommerce_order_details_after_order_table_items', $order );
            ?>
            </tbody>

            <tfoot>
            <?php
            foreach ( $order->get_order_item_totals() as $key => $total ) {
                ?>
                <tr>
                    <th scope="row"><?php echo esc_html( $total['label'] ); ?></th>
                    <td class="payment-row"><?php echo ( 'payment_method' === $key ) ? esc_html( $total['value'] ) : wp_kses_post( $total['value'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
                </tr>
                <?php
            }
            ?>
            <?php if ( $order->get_customer_note() ) : ?>
                <tr>
                    <th><?php esc_html_e( 'Note:', 'woocommerce' ); ?></th>
                    <td><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
                </tr>
            <?php endif; ?>
            </tfoot>
        </table>

        <?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

        
    <?php wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );?>
        <a href="/checkout"><div class="btn-back-to-cart">Back to cart</div></a>

        <style>
            .woocommerce-order {
                max-width: 780px;
                margin: auto;
                box-shadow: 2px 2px 25px rgba(0, 0, 0, 0.05);
                padding: 40px 30px;
                margin-top: 70px;
                border-top: 5px solid #005bbb;
                border-radius: 10px;
                margin-bottom: 120px;
                background: #fff;
            }
            .background-decoration:nth-child(1) {
                width: 18vw;
                height: 18vw;
                top: 15vw;
                right: 7vw;
                background-color: var(--rh-dcr-aqua);
            }
            .background-decoration:nth-child(2) {
                width: 18vw;
                height: 18vw;
                top: 30vw;
                left: 55vw;
                background-color: #CFB4FF;
            }
            .woocommerce-order-details__title, .woocommerce-customer-details .woocommerce-column__title {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 700;
                font-size: 20px;
                line-height: 120%;
                color: #5A5A5A;
                margin-top: 64px;
            }
            .woocommerce table.shop_table {
                border-left: none;
                border-right: none;
            }
            .woocommerce table.shop_table th {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 600 !important;
                font-size: 14px;
                line-height: 140%;
                color: #5A5A5A;
            }
            .wc-item-meta-label {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 600 !important;
                font-size: 14px;
                line-height: 120%;
                color: #5A5A5A;
            }
            .woocommerce-Price-amount.amount, .payment-row {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 600;
                font-size: 14px;
                line-height: 140% !important;
                color: #5A5A5A;
            }
            .wc-item-meta {
                padding-left: 50px;
            }
            .btn-back-to-cart {
                background: linear-gradient(90.44deg, #536DFE 0.5%, #005BBB 100.05%);
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 8px;
                color: #fff;
                display: flex;
                justify-content: center;
                padding: 16px;
                cursor: pointer;
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 700;
                font-size: 16px;
                line-height: 100%;
                text-align: center;
                transition: all .3s ease;
            }
            .btn-back-to-cart:hover {
                color: #5A5A5A;
                background: linear-gradient(90.44deg, #FFDA1D 0.5%, #FFBA1B 100.05%);
            }
            .after-checkout-top-container {
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .img-order-received {
                width: 49px;
            }
            .woocommerce-notice.woocommerce-notice--success.woocommerce-thankyou-order-received {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 500;
                font-size: 24px;
                line-height: 120%;
                text-align: center;
                color: #5A5A5A;
            }
            .received-order {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 400;
                font-size: 14px;
                line-height: 120%;
                color: #005BBB;
            }
            .woocommerce-order-overview.woocommerce-thankyou-order-details.order_details {
                display: flex;
                flex-direction: column;
                margin: auto;
                width: fit-content;
                list-style: unset;
            }
            .woocommerce-order-overview.woocommerce-thankyou-order-details.order_details li {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 400;
                font-size: 14px;
                line-height: 140%;
                color: #5A5A5A;
            }
            .woocommerce-order-overview.woocommerce-thankyou-order-details.order_details strong {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 600;
                font-size: 14px;
                line-height: 150%;
                color: #5A5A5A;
            }
            .billing-adress {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .after-checkout-billing-name::before {
                content: "";
                background: url(https://www.rhelpers.com/wp-content/uploads/2022/12/users-icon.svg);
                width: 11px;
                height: 13px;
                display: inline-flex;
                margin-right: 10px;
                background-size: 100%;
            }
            .after-checkout-billing-company::before {
                content: "";
                background: url(https://www.rhelpers.com/wp-content/uploads/2022/12/company-icon.svg);
                width: 13px;
                height: 15px;
                display: inline-flex;
                margin-right: 10px;
                background-size: 100%;
            }
            .after-checkout-billing-country::before {
                content: "";
                background: url(https://www.rhelpers.com/wp-content/uploads/2022/12/location-icon.svg);
                width: 11px;
                height: 15px;
                display: inline-flex;
                margin-right: 10px;
                background-size: 100%;
            }
            .woocommerce-customer-details--email {
                margin: 0;
            }
            .woocommerce-customer-details--email::before {
                content: "";
                background: url(https://www.rhelpers.com/wp-content/uploads/2022/12/letter-icon.svg);
                width: 16px;
                height: 13px;
                display: inline-flex;
                margin-right: 10px;
                background-size: 100%;
            }
            .attachment-thumbnail.size-thumbnail {
                max-width: 89px;
                border-radius: 50%;
            }
            .employee-name {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 700;
                font-size: 14px;
                line-height: 16px;
                color: #5A5A5A;
                /* text-align: center; */
            }
            .wc-item-meta p {
                margin: 5px auto;
            }
            #page::after {
                content: "";
                position: absolute;
                width: 520px;
                height: 520px;
                background: #69F0AE;
                filter: blur(95.4347px);
                z-index: -1;
                right: 0;
                top: 180px;
            }
            #page::before {
                content: "";
                position: absolute;
                width: 512px;
                height: 554px;
                background: #CFB4FF;
                filter: blur(108.87px);
                transform: matrix(-0.99, -0.21, 0.11, -0.98, 0, 0);
                z-index: -1;
                left: 0;
                top: 450px;
            }
            .woocommerce::before {
                content: "";
                position: absolute;
                width: 495px;
                height: 542px;
                z-index: -1;
                right: 0;
                top: 100%;
                background: #536DFE;
                opacity: 0.2;
                filter: blur(95.4347px);
            }
            .woocommerce-Price-amount.amount bdi {
                font-weight: 400;
            }
            .payment-row .woocommerce-Price-amount.amount {
                font-weight: 400;
            }
            .woocommerce-order-overview__total.total bdi {
                font-weight: 600;
            }
            .woocommerce {
                min-height: 125vh;
            }
            
            .woocommerce-order-details header h2 {
                font-size: 20px;
            }

            .subscription-actions.order-actions.woocommerce-orders-table__cell.woocommerce-orders-table__cell-subscription-actions.woocommerce-orders-table__cell-order-actions a {
                color: #005bbb;
            }

            .subscription-total.order-total.woocommerce-orders-table__cell.woocommerce-orders-table__cell-subscription-total.woocommerce-orders-table__cell-order-total {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
            }

            .woocommerce-Price-amount.amount, .payment-row {
                font-weight: 400;
            }

            .order-total {
                justify-content: start;
            }

.woocommerce-order p:nth-child(4) {
  display: none;
}

            @media (max-width: 1024px) {
                .woocommerce-order {
                    max-width: 524px;
                }
                .billing-adress {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                }
                .woocommerce-customer-details {
                    margin-bottom: 50px;
                }
            }

            @media (max-width: 550px) {
                .wc-item-meta {
                    padding-left: 15px;
                }
                .page-template-default.page.page-id-15.logged-in.admin-bar.wp-custom-logo.theme-clean.woocommerce-checkout.woocommerce-page.woocommerce-order-received.woocommerce-js.customize-support {
                    overflow-x: hidden;
                }
                .billing-adress {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    font-size: 12px;
                    line-height: 140%;
                    gap: 8px;
                }
                .woocommerce-order-details__title, .woocommerce-customer-details .woocommerce-column__title, .woocommerce-order-details header h2 {
                    font-size: 16px
                }
                .woocommerce-notice.woocommerce-notice--success.woocommerce-thankyou-order-received {
                    font-size: 16px;
                    font-weight: 700;
                }
                .employee-name, .order.woocommerce-orders-table__row.woocommerce-orders-table__row--status-active, .subscription-total.order-total.woocommerce-orders-table__cell.woocommerce-orders-table__cell-subscription-total.woocommerce-orders-table__cell-order-total {
                    font-size: 12px;
                }
                .wc-item-meta p {
                    font-size: 10px;
                    line-height: 120%;
                }
                .wc-item-meta-label {
                    font-size: 10px;
                }
                .woocommerce-Price-amount.amount bdi {
                    font-weight: 400;
                    font-size: 12px;
                }
                .woocommerce-Price-amount.amount, .payment-row, .woocommerce table.shop_table th {
                    font-size: 12px;
                }
                .attachment-thumbnail.size-thumbnail {
                    max-width: 81px;
                }
            }
            @media (max-width: 407px) {
                .billing-adress {
                    grid-template-columns: 1fr;
            }
        }
        </style>
    </section>


