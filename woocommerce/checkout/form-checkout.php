<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<div class="container">
<section class="padding-3 hiring">
            <div class="container">
                <div class="section-title-box element-hidden">
                    <h2 class="section-title">Simple process of hiring Dedicated Employees</h2>
                </div>

                <ul class="hiring-process padding-3">
                    <?php
                    if (have_rows('home_page_hiring_steps', '44')) :
                        $counter = 1;
                        while (have_rows('home_page_hiring_steps', '44')) : the_row(); ?>
                            <li class="hiring-card element-hidden">
                                <img class="hiring-icon" src="<?php the_sub_field('hiring_icon') ?>" alt="">
                                <div class="hiring-card-content">
                                    <span class="hiring-number"><?php the_sub_field('hiring_number') ?></span>
                                        <span class="card__title"><?php the_sub_field('hiring_title', '44'); ?></span>
                                    <p><?php the_sub_field('hiring_description', '44'); ?></p>
                                </div>
                            </li>
                            <?php $counter++; ?>
                        <?php
                        endwhile;
                    endif
                    ?>
                </ul>
            </div>
        </section>
	<div class="checkout_container">
		<div class="tabs">
			<ul class="tabs__caption">
				<li class="active">Sign up now</li>
				<li>Send a request</li>
			</ul>
			<div class="form_container tabs__content active">
				<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
				
					<?php if ( $checkout->get_checkout_fields() ) : ?>
					
						<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

						<div class="col2-set customer-details-grid billing_details_grid" id="customer_details">
							<div class="col-1 billing_details">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
							</div>
							<div class="col-2 order_notes">
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>
						</div>

						<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

					<?php endif; ?>

					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>
					</div>

					<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</form>
			</div>
			<div class="tabs__content">
				<h3>Send a request</h3>
				
				<div class="crm-form"></div>
				<!-- <?php echo do_shortcode('[calendly url="https://calendly.com/sergey-ya18/30min" type="1"]'); ?> -->
			</div>
		</div>
<div class="order_container">
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
<!-- <?php echo do_shortcode('[calendly url="https://calendly.com/sergey-ya18/30min" type="1"]'); ?> -->
</div>
	</div>
</div>


<script>
	(function($) {
		$(function() {
			$('ul.tabs__caption').each(function(i) {
				var storage = localStorage.getItem('tab' + i);
				if (storage) {
				$(this).find('li').removeClass('active').eq(storage).addClass('active')
				.closest('div.tabs').find('div.tabs__content').removeClass('active').eq(storage).addClass('active');
				}
			});
		
			$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
				$(this)
				.addClass('active').siblings().removeClass('active')
				.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
				var ulIndex = $('ul.tabs__caption').index($(this).parents('ul.tabs__caption'));
				localStorage.removeItem('tab' + ulIndex);
				localStorage.setItem('tab' + ulIndex, $(this).index());
			});
		});
	})(jQuery);
</script>