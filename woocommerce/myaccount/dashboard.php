<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;
global $subscription;

?>
<div class="my-account-title-section">
    <h1>Dashboard</h1>
    <div class="navigation-header-left">
        <a href="#" class="navigation-header-notification">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 27.6668C16.7225 27.6677 17.4274 27.4435 18.0166 27.0254C18.6058 26.6072 19.0501 26.0158 19.2877 25.3335H12.7123C12.9499 26.0158 13.3942 26.6072 13.9834 27.0254C14.5726 27.4435 15.2775 27.6677 16 27.6668ZM24.1667 19.0172V13.6668C24.1667 9.91366 21.6175 6.752 18.1642 5.80116C17.8223 4.94016 16.987 4.3335 16 4.3335C15.013 4.3335 14.1777 4.94016 13.8358 5.80116C10.3825 6.75316 7.83333 9.91366 7.83333 13.6668V19.0172L5.84183 21.0087C5.73328 21.1168 5.6472 21.2454 5.58853 21.3869C5.52987 21.5285 5.49978 21.6803 5.5 21.8335V23.0002C5.5 23.3096 5.62292 23.6063 5.84171 23.8251C6.0605 24.0439 6.35725 24.1668 6.66667 24.1668H25.3333C25.6428 24.1668 25.9395 24.0439 26.1583 23.8251C26.3771 23.6063 26.5 23.3096 26.5 23.0002V21.8335C26.5002 21.6803 26.4701 21.5285 26.4115 21.3869C26.3528 21.2454 26.2667 21.1168 26.1582 21.0087L24.1667 19.0172Z" fill="#002247"/>
            </svg>

        </a>
        <a href="#" class="navigation-header-message">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.1996 8.8153C27.1996 9.01548 27.1503 9.21258 27.0558 9.38908C26.9614 9.56559 26.8248 9.71602 26.6582 9.82703L15.9996 16.9334L5.3409 9.82703C5.12362 9.68247 4.95865 9.47181 4.87041 9.22621C4.78216 8.98061 4.77533 8.71313 4.85091 8.46334C4.9265 8.21355 5.08049 7.99474 5.2901 7.83927C5.4997 7.6838 5.75379 7.59994 6.01476 7.6001H25.9862C26.6582 7.6001 27.2014 8.14516 27.2014 8.8153H27.1996ZM27.1996 13.1385V22.5334C27.1996 23.0285 27.0029 23.5033 26.6528 23.8534C26.3028 24.2034 25.828 24.4001 25.3329 24.4001H6.66623C6.17116 24.4001 5.69636 24.2034 5.3463 23.8534C4.99623 23.5033 4.79956 23.0285 4.79956 22.5334V13.1385C4.79956 12.7652 5.21583 12.543 5.5257 12.7502L15.9996 19.7334L26.4734 12.7521C26.5436 12.7052 26.6252 12.6781 26.7094 12.6739C26.7937 12.6697 26.8776 12.6884 26.9521 12.728C27.0266 12.7677 27.089 12.8268 27.1326 12.8991C27.1761 12.9713 27.1993 13.0541 27.1996 13.1385Z" fill="#002247"/>
            </svg>

        </a>
        <div class="menu-cart-btn
                <?php
        $cart_contents = WC()->cart->get_cart_contents_count();
        if (is_front_page()) echo 'cart-dark-theme ';
        if (!$cart_contents == 0) echo 'cart-not-empty'
        ?>" id="menu-cart-btn">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.005 17.8885L27.9747 9.22179C28.1169 8.59604 27.6413 8.00016 26.9996 8.00016H10.6337L10.2517 6.13308C10.1566 5.6677 9.74708 5.3335 9.27204 5.3335H5C4.44771 5.3335 4 5.7812 4 6.3335V7.00016C4 7.55245 4.44771 8.00016 5 8.00016H7.91179L10.8388 22.31C10.1385 22.7127 9.66667 23.4677 9.66667 24.3335C9.66667 25.6222 10.7113 26.6668 12 26.6668C13.2887 26.6668 14.3333 25.6222 14.3333 24.3335C14.3333 23.6804 14.0647 23.0904 13.6323 22.6668H22.3676C21.9353 23.0904 21.6667 23.6804 21.6667 24.3335C21.6667 25.6222 22.7113 26.6668 24 26.6668C25.2887 26.6668 26.3333 25.6222 26.3333 24.3335C26.3333 23.4097 25.7963 22.6113 25.0175 22.2333L25.2474 21.2218C25.3896 20.596 24.914 20.0002 24.2723 20.0002H13.0882L12.8155 18.6668H25.0299C25.4968 18.6668 25.9015 18.3437 26.005 17.8885Z" fill="#002247"/>
            </svg>

            <span class="counter" style="display: none;"></span>
        </div>
    </div>
</div>
<!--<p>-->
<!--	--><?php
//	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
//	$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
//	$allowed_html = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
//	if ( wc_shipping_enabled() ) {
//		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
//		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
//	}
//	printf(
//		wp_kses( $dashboard_desc, $allowed_html ),
//		esc_url( wc_get_endpoint_url( 'orders' ) ),
//		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
//		esc_url( wc_get_endpoint_url( 'edit-account' ) )
//	);
//	?>
<!--</p>-->

    <?php 
    // START - GET SUBSCRIPTION STATUS LOOP
	    $subscriptions = wcs_get_subscriptions( array(
	    'customer_id'            => get_current_user_id()
	    ));
		    $active_sub_count = 0;
		    $non_active_sub_count = 0;
		        foreach($subscriptions as $subscription)
			        {
				    foreach( $subscription->get_items() as $item_id => $item ) 
						{
                            $sub_status = $subscription->get_data()['status'];
                            if ($sub_status == 'active'){
								$active_sub_count ++;
							};
							if ($sub_status == 'on-hold'){
								$non_active_sub_count ++;
							}
						}
					}
     // END - GET SUBSCRIPTION STATUS LOPP
	?>


<div class="my-account-dashboard-cards">
    <div class="my-account-dashboard-card dashboard-card-total">
        <div class="dashboard-card-secret">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 5.5C11 6.95869 10.4205 8.35764 9.38909 9.38909C8.35764 10.4205 6.95869 11 5.5 11C4.04131 11 2.64236 10.4205 1.61091 9.38909C0.579463 8.35764 0 6.95869 0 5.5C0 4.04131 0.579463 2.64236 1.61091 1.61091C2.64236 0.579463 4.04131 0 5.5 0C6.95869 0 8.35764 0.579463 9.38909 1.61091C10.4205 2.64236 11 4.04131 11 5.5ZM3.7785 4.14769H4.34569C4.44056 4.14769 4.51619 4.07 4.52856 3.97581C4.59044 3.52481 4.89981 3.19619 5.45119 3.19619C5.92281 3.19619 6.35456 3.432 6.35456 3.99919C6.35456 4.43575 6.09744 4.6365 5.69112 4.94175C5.22844 5.27794 4.862 5.6705 4.88812 6.30781L4.89019 6.457C4.89091 6.50211 4.90934 6.54512 4.94149 6.57676C4.97365 6.6084 5.01695 6.62613 5.06206 6.62612H5.61963C5.66521 6.62612 5.70893 6.60802 5.74116 6.57578C5.77339 6.54355 5.7915 6.49983 5.7915 6.45425V6.38206C5.7915 5.88844 5.97919 5.74475 6.48588 5.36044C6.90456 5.04212 7.34113 4.68875 7.34113 3.94694C7.34113 2.90812 6.46387 2.40625 5.50344 2.40625C4.63238 2.40625 3.67812 2.81187 3.61281 3.97787C3.61187 4.00008 3.61548 4.02224 3.62342 4.04299C3.63136 4.06375 3.64346 4.08266 3.65898 4.09856C3.6745 4.11447 3.69311 4.12703 3.71366 4.13548C3.73422 4.14393 3.75628 4.14808 3.7785 4.14769ZM5.37694 8.57725C5.79631 8.57725 6.08438 8.30638 6.08438 7.93994C6.08438 7.56044 5.79562 7.29369 5.37694 7.29369C4.97544 7.29369 4.68325 7.56044 4.68325 7.93994C4.68325 8.30638 4.97475 8.57725 5.37694 8.57725Z" fill="#005BBB"/>
            </svg>
            <div class="dashboard-card-secret-hover-icon">
                <svg width="70" height="66" viewBox="0 0 70 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_bd_1951_2551)">
                        <path d="M35 32L21.1436 8L48.8564 8.00001L35 32Z" fill="white"/>
                    </g>
                    <defs>
                        <filter id="filter0_bd_1951_2551" x="0.143555" y="-7" width="69.7129" height="73" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feGaussianBlur in="BackgroundImageFix" stdDeviation="7.5"/>
                            <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_1951_2551"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="13"/>
                            <feGaussianBlur stdDeviation="10.5"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                            <feBlend mode="normal" in2="effect1_backgroundBlur_1951_2551" result="effect2_dropShadow_1951_2551"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1951_2551" result="shape"/>
                        </filter>
                    </defs>
                </svg>
            </div>
            <div class="dashboard-card-secret-hover-content">
                <p>Requested are the skills that were requested during the time period you selected.</p>
            </div>
        </div>
        <div class="dashboard-card-title">Total SUBSCRIBTIONS</div>
        <div class="dashboard-card-total-info">
                <div class="dashboard-card-total-active">
                    <svg width="38" height="12" viewBox="0 0 38 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 8.39132L7.09847 10.4309C8.06659 10.7547 9.12319 10.2974 9.5498 9.37001L10.1669 8.02848C10.6279 7.02622 11.9989 6.89416 12.6428 7.78998V7.78998C13.3111 8.71986 14.7451 8.53447 15.155 7.46519L17.2651 1.96059C17.615 1.0478 18.9319 1.12762 19.169 2.07599L20.7917 8.56684C21.1032 9.81274 22.4914 10.4464 23.6367 9.86543L27.3737 7.9699C28.1123 7.59521 29.0056 7.71461 29.6199 8.27018L30.5843 9.14234C31.1966 9.69602 32.0861 9.81667 32.8237 9.44609L37 7.34785" stroke="url(#paint0_linear_1936_2687)" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="paint0_linear_1936_2687" x1="1.14918" y1="-1" x2="31.6118" y2="17.5155" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#00E7A1"/>
                                <stop offset="1" stop-color="#278FFF"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="subscription-active-js"><?php echo $active_sub_count; ?></span>
                    <span>Active</span>
                </div>
                <div class="dashboard-card-separator"></div>
                <div class="dashboard-card-total-active">
                    <svg width="38" height="12" viewBox="0 0 38 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37 3.60868L30.9015 1.56907C29.9334 1.24529 28.8768 1.70257 28.4502 2.62999L27.8331 3.97152C27.3721 4.97378 26.0011 5.10584 25.3572 4.21002V4.21002C24.6889 3.28014 23.2549 3.46553 22.845 4.53481L20.7349 10.0394C20.385 10.9522 19.0681 10.8724 18.831 9.92401L17.2083 3.43316C16.8968 2.18726 15.5086 1.55362 14.3633 2.13457L10.6263 4.0301C9.88765 4.40479 8.99444 4.28539 8.38011 3.72982L7.41569 2.85766C6.80345 2.30398 5.91394 2.18333 5.17633 2.55391L0.999999 4.65215" stroke="#FF5252" stroke-linecap="round"/>
                    </svg>
                    <span><?php echo $non_active_sub_count; ?></span>
                    <span>Non-active</span>
                </div>
            </div>
        <div class="dashboard-card-right">
            <div class="progress-ring-wrapper">
                <svg class="progress-ring" width="120" height="120">
                    <defs>
                        <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#278FFF" />
                            <stop offset="100%" stop-color="#00E7A1" />
                        </linearGradient>
                    </defs>
                    <circle class="progress-ring__circle" stroke="url(#gradient)" stroke-width="12" cx="60" cy="60" r="52" fill="transparent"/>
                </svg>
                <svg class="progress-ring-second" width="120" height="120">
                    <circle class="progress-ring__static" stroke="#FF5252" stroke-width="6" cx="60" cy="60" r="52" fill="transparent"/>
                </svg>
                <div class="progress-total"><?php echo $non_active_sub_count + $active_sub_count; ?></div>
            </div>
        </div>
    </div>
    <div class="my-account-dashboard-card dashboard-card-balance">
        <div class="dashboard-card-secret">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 5.5C11 6.95869 10.4205 8.35764 9.38909 9.38909C8.35764 10.4205 6.95869 11 5.5 11C4.04131 11 2.64236 10.4205 1.61091 9.38909C0.579463 8.35764 0 6.95869 0 5.5C0 4.04131 0.579463 2.64236 1.61091 1.61091C2.64236 0.579463 4.04131 0 5.5 0C6.95869 0 8.35764 0.579463 9.38909 1.61091C10.4205 2.64236 11 4.04131 11 5.5ZM3.7785 4.14769H4.34569C4.44056 4.14769 4.51619 4.07 4.52856 3.97581C4.59044 3.52481 4.89981 3.19619 5.45119 3.19619C5.92281 3.19619 6.35456 3.432 6.35456 3.99919C6.35456 4.43575 6.09744 4.6365 5.69112 4.94175C5.22844 5.27794 4.862 5.6705 4.88812 6.30781L4.89019 6.457C4.89091 6.50211 4.90934 6.54512 4.94149 6.57676C4.97365 6.6084 5.01695 6.62613 5.06206 6.62612H5.61963C5.66521 6.62612 5.70893 6.60802 5.74116 6.57578C5.77339 6.54355 5.7915 6.49983 5.7915 6.45425V6.38206C5.7915 5.88844 5.97919 5.74475 6.48588 5.36044C6.90456 5.04212 7.34113 4.68875 7.34113 3.94694C7.34113 2.90812 6.46387 2.40625 5.50344 2.40625C4.63238 2.40625 3.67812 2.81187 3.61281 3.97787C3.61187 4.00008 3.61548 4.02224 3.62342 4.04299C3.63136 4.06375 3.64346 4.08266 3.65898 4.09856C3.6745 4.11447 3.69311 4.12703 3.71366 4.13548C3.73422 4.14393 3.75628 4.14808 3.7785 4.14769ZM5.37694 8.57725C5.79631 8.57725 6.08438 8.30638 6.08438 7.93994C6.08438 7.56044 5.79562 7.29369 5.37694 7.29369C4.97544 7.29369 4.68325 7.56044 4.68325 7.93994C4.68325 8.30638 4.97475 8.57725 5.37694 8.57725Z" fill="#005BBB"/>
            </svg>
            <div class="dashboard-card-secret-hover-icon">
                <svg width="70" height="66" viewBox="0 0 70 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_bd_1951_2551)">
                        <path d="M35 32L21.1436 8L48.8564 8.00001L35 32Z" fill="white"/>
                    </g>
                    <defs>
                        <filter id="filter0_bd_1951_2551" x="0.143555" y="-7" width="69.7129" height="73" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feGaussianBlur in="BackgroundImageFix" stdDeviation="7.5"/>
                            <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_1951_2551"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="13"/>
                            <feGaussianBlur stdDeviation="10.5"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                            <feBlend mode="normal" in2="effect1_backgroundBlur_1951_2551" result="effect2_dropShadow_1951_2551"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1951_2551" result="shape"/>
                        </filter>
                    </defs>
                </svg>
            </div>
            <div class="dashboard-card-secret-hover-content">
                <p>Requested are the skills that were requested during the time period you selected.</p>
            </div>
        </div>
        <div class="dashboard-card-left">
            <div class="dashboard-card-title">Your BALANCE</div>
            <div class="dashboard-card-total-info">
                Total expiration time for all your subscriptions
            </div>
        </div>
        <div class="dashboard-card-right">
            <div class="progress-ring-wrapper">
                <svg class="dashboard-card-right-balance-ring" width="120" height="120">
                    <defs>
                        <linearGradient id="balance" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#536DFE" />
                            <stop offset="100%" stop-color="#536DFE" />
                        </linearGradient>
                    </defs>
                    <circle stroke="url(#balance)" stroke-width="10" cx="60" cy="60" r="52" fill="transparent"/>
                </svg>
                <span class="dashboard-card-right-balance-text">180/h</span>
            </div>
        </div>
    </div>
    <div class="my-account-dashboard-card dashboard-card-experts">
        <div class="dashboard-card-secret">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 5.5C11 6.95869 10.4205 8.35764 9.38909 9.38909C8.35764 10.4205 6.95869 11 5.5 11C4.04131 11 2.64236 10.4205 1.61091 9.38909C0.579463 8.35764 0 6.95869 0 5.5C0 4.04131 0.579463 2.64236 1.61091 1.61091C2.64236 0.579463 4.04131 0 5.5 0C6.95869 0 8.35764 0.579463 9.38909 1.61091C10.4205 2.64236 11 4.04131 11 5.5ZM3.7785 4.14769H4.34569C4.44056 4.14769 4.51619 4.07 4.52856 3.97581C4.59044 3.52481 4.89981 3.19619 5.45119 3.19619C5.92281 3.19619 6.35456 3.432 6.35456 3.99919C6.35456 4.43575 6.09744 4.6365 5.69112 4.94175C5.22844 5.27794 4.862 5.6705 4.88812 6.30781L4.89019 6.457C4.89091 6.50211 4.90934 6.54512 4.94149 6.57676C4.97365 6.6084 5.01695 6.62613 5.06206 6.62612H5.61963C5.66521 6.62612 5.70893 6.60802 5.74116 6.57578C5.77339 6.54355 5.7915 6.49983 5.7915 6.45425V6.38206C5.7915 5.88844 5.97919 5.74475 6.48588 5.36044C6.90456 5.04212 7.34113 4.68875 7.34113 3.94694C7.34113 2.90812 6.46387 2.40625 5.50344 2.40625C4.63238 2.40625 3.67812 2.81187 3.61281 3.97787C3.61187 4.00008 3.61548 4.02224 3.62342 4.04299C3.63136 4.06375 3.64346 4.08266 3.65898 4.09856C3.6745 4.11447 3.69311 4.12703 3.71366 4.13548C3.73422 4.14393 3.75628 4.14808 3.7785 4.14769ZM5.37694 8.57725C5.79631 8.57725 6.08438 8.30638 6.08438 7.93994C6.08438 7.56044 5.79562 7.29369 5.37694 7.29369C4.97544 7.29369 4.68325 7.56044 4.68325 7.93994C4.68325 8.30638 4.97475 8.57725 5.37694 8.57725Z" fill="#005BBB"/>
            </svg>
            <div class="dashboard-card-secret-hover-icon">
                <svg width="70" height="66" viewBox="0 0 70 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_bd_1951_2551)">
                        <path d="M35 32L21.1436 8L48.8564 8.00001L35 32Z" fill="white"/>
                    </g>
                    <defs>
                        <filter id="filter0_bd_1951_2551" x="0.143555" y="-7" width="69.7129" height="73" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feGaussianBlur in="BackgroundImageFix" stdDeviation="7.5"/>
                            <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_1951_2551"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="13"/>
                            <feGaussianBlur stdDeviation="10.5"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                            <feBlend mode="normal" in2="effect1_backgroundBlur_1951_2551" result="effect2_dropShadow_1951_2551"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_1951_2551" result="shape"/>
                        </filter>
                    </defs>
                </svg>
            </div>
            <div class="dashboard-card-secret-hover-content">
                <p>Requested are the skills that were requested during the time period you selected.</p>
            </div>
        </div>
        <div class="dashboard-card-left">
            <div class="dashboard-card-title">Looking for <span>more experts?</span></div>
            <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="dashboard-card-button">
                Hire an Empoyee
            </a>
        </div>
        <div class="dashboard-card-right">
            <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.8">
                    <path d="M55.6364 118.909C85.761 118.909 110.182 94.4879 110.182 64.3633C110.182 34.2387 85.761 9.81787 55.6364 9.81787C25.5118 9.81787 1.09094 34.2387 1.09094 64.3633C1.09094 94.4879 25.5118 118.909 55.6364 118.909Z" fill="#E7EFFF"/>
                    <path d="M24 7.63628C25.8075 7.63628 27.2727 6.17103 27.2727 4.36355C27.2727 2.55607 25.8075 1.09082 24 1.09082C22.1925 1.09082 20.7273 2.55607 20.7273 4.36355C20.7273 6.17103 22.1925 7.63628 24 7.63628Z" fill="#00C99F"/>
                    <path d="M115.636 9.81792C117.444 9.81792 118.909 8.35267 118.909 6.54519C118.909 4.73771 117.444 3.27246 115.636 3.27246C113.829 3.27246 112.364 4.73771 112.364 6.54519C112.364 8.35267 113.829 9.81792 115.636 9.81792Z" fill="#FFA100"/>
                    <path d="M106.909 118.909C108.717 118.909 110.182 117.444 110.182 115.636C110.182 113.829 108.717 112.364 106.909 112.364C105.102 112.364 103.636 113.829 103.636 115.636C103.636 117.444 105.102 118.909 106.909 118.909Z" fill="#00C99F"/>
                    <path d="M4.36367 112.363C6.17115 112.363 7.6364 110.898 7.6364 109.091C7.6364 107.283 6.17115 105.818 4.36367 105.818C2.55619 105.818 1.09094 107.283 1.09094 109.091C1.09094 110.898 2.55619 112.363 4.36367 112.363Z" fill="#FF4D69"/>
                    <path d="M91.6364 66.7854V91.6363C91.6364 92.7936 91.1766 93.9035 90.3583 94.7218C89.5399 95.5402 88.43 95.9999 87.2727 95.9999H24C22.8427 95.9999 21.7328 95.5402 20.9144 94.7218C20.0961 93.9035 19.6364 92.7936 19.6364 91.6363V66.7854C19.6371 65.0919 20.1304 63.4353 21.0564 62.0173C21.9823 60.5994 23.3007 59.4815 24.8509 58.7999L46.9091 49.0908H64.3636L86.4218 58.7999C87.972 59.4815 89.2905 60.5994 90.2164 62.0173C91.1423 63.4353 91.6356 65.0919 91.6364 66.7854Z" fill="#7F96D1"/>
                    <path d="M52.3637 7.63623H58.9091C62.9597 7.63623 66.8444 9.24532 69.7086 12.1095C72.5728 14.9737 74.1818 18.8584 74.1818 22.909V35.9999H37.0909V22.909C37.0909 18.8584 38.7 14.9737 41.5642 12.1095C44.4284 9.24532 48.3131 7.63623 52.3637 7.63623Z" fill="#7F96D1"/>
                    <path d="M55.6364 54.5454C51.5858 54.5454 47.7011 52.9363 44.8369 50.0721C41.9727 47.2079 40.3636 43.3232 40.3636 39.2726V29.4545C40.3636 29.1651 40.4786 28.8877 40.6832 28.6831C40.8878 28.4785 41.1652 28.3635 41.4546 28.3635C46.9746 28.3635 50.5091 28.6472 55.6364 26.7272C58.5214 25.6461 61.5772 25.0918 64.6582 25.0908H68.7273C69.3059 25.0908 69.8609 25.3207 70.2701 25.7299C70.6792 26.139 70.9091 26.694 70.9091 27.2726V39.2726C70.9091 43.3232 69.3 47.2079 66.4358 50.0721C63.5716 52.9363 59.687 54.5454 55.6364 54.5454Z" fill="#A5BCED"/>
                    <path d="M29.4546 87.2725H81.8182C82.3969 87.2725 82.9518 87.5023 83.361 87.9115C83.7702 88.3207 84 88.8756 84 89.4543V91.6361C84 92.7934 83.5403 93.9033 82.722 94.7217C81.9036 95.54 80.7937 95.9997 79.6364 95.9997H31.6364C30.4791 95.9997 29.3692 95.54 28.5508 94.7217C27.7325 93.9033 27.2728 92.7934 27.2728 91.6361V89.4543C27.2728 88.8756 27.5026 88.3207 27.9118 87.9115C28.321 87.5023 28.8759 87.2725 29.4546 87.2725Z" fill="#323FD4"/>
                    <path d="M76.3636 48H34.9091C32.4991 48 30.5455 49.9537 30.5455 52.3636V82.9091C30.5455 85.3191 32.4991 87.2727 34.9091 87.2727H76.3636C78.7736 87.2727 80.7273 85.3191 80.7273 82.9091V52.3636C80.7273 49.9537 78.7736 48 76.3636 48Z" fill="#4E6AFF"/>
                    <path d="M100.069 96C98.4249 98.3211 96.6011 100.51 94.6146 102.545H16.7019C14.7154 100.51 12.8916 98.3211 11.2473 96H100.069Z" fill="#A5BCED"/>
                    <path d="M94.571 102.545C89.4932 107.721 83.4347 111.832 76.7495 114.638C70.0643 117.445 62.8868 118.89 55.6364 118.89C48.3861 118.89 41.2086 117.445 34.5234 114.638C27.8382 111.832 21.7797 107.721 16.7019 102.545H94.571Z" fill="#7F96D1"/>
                    <path d="M40.3637 39.2727H38.1819C37.0246 39.2727 35.9147 38.8129 35.0963 37.9946C34.278 37.1763 33.8182 36.0664 33.8182 34.909C33.8182 33.7517 34.278 32.6418 35.0963 31.8235C35.9147 31.0051 37.0246 30.5454 38.1819 30.5454H40.3637V39.2727Z" fill="#A5BCED"/>
                    <path d="M70.9091 39.2727H73.0909C74.2482 39.2727 75.3582 38.8129 76.1765 37.9946C76.9948 37.1763 77.4546 36.0664 77.4546 34.909C77.4546 33.7517 76.9948 32.6418 76.1765 31.8235C75.3582 31.0051 74.2482 30.5454 73.0909 30.5454H70.9091V39.2727Z" fill="#A5BCED"/>
                    <path d="M50.9564 63.5888C50.855 63.4866 50.7343 63.4054 50.6014 63.35C50.4685 63.2946 50.3259 63.2661 50.1819 63.2661C50.0378 63.2661 49.8953 63.2946 49.7623 63.35C49.6294 63.4054 49.5087 63.4866 49.4073 63.5888L46.1346 66.8615C46.0323 66.9629 45.9512 67.0836 45.8958 67.2165C45.8404 67.3495 45.8119 67.4921 45.8119 67.6361C45.8119 67.7801 45.8404 67.9227 45.8958 68.0556C45.9512 68.1885 46.0323 68.3092 46.1346 68.4106L49.4073 71.6833C49.6127 71.8888 49.8913 72.0042 50.1819 72.0042C50.4724 72.0042 50.751 71.8888 50.9564 71.6833C51.1618 71.4779 51.2772 71.1993 51.2772 70.9088C51.2772 70.6183 51.1618 70.3397 50.9564 70.1343L48.4473 67.6361L50.9564 65.1379C51.0586 65.0365 51.1398 64.9158 51.1952 64.7829C51.2506 64.6499 51.2791 64.5074 51.2791 64.3633C51.2791 64.2193 51.2506 64.0767 51.1952 63.9438C51.1398 63.8109 51.0586 63.6902 50.9564 63.5888Z" fill="white"/>
                    <path d="M65.1382 66.8616L61.8655 63.5889C61.7637 63.4872 61.643 63.4065 61.5101 63.3515C61.3772 63.2964 61.2348 63.2681 61.0909 63.2681C60.9471 63.2681 60.8046 63.2964 60.6717 63.3515C60.5388 63.4065 60.4181 63.4872 60.3164 63.5889C60.2147 63.6906 60.134 63.8114 60.0789 63.9443C60.0239 64.0772 59.9955 64.2196 59.9955 64.3634C59.9955 64.5073 60.0239 64.6497 60.0789 64.7826C60.134 64.9155 60.2147 65.0363 60.3164 65.138L62.8255 67.6362L60.3164 70.1344C60.111 70.3398 59.9955 70.6184 59.9955 70.9089C59.9955 71.1994 60.111 71.478 60.3164 71.6834C60.5218 71.8889 60.8004 72.0043 61.0909 72.0043C61.3814 72.0043 61.66 71.8889 61.8655 71.6834L65.1382 68.4107C65.2404 68.3093 65.3216 68.1886 65.377 68.0557C65.4324 67.9228 65.4609 67.7802 65.4609 67.6362C65.4609 67.4922 65.4324 67.3496 65.377 67.2166C65.3216 67.0837 65.2404 66.963 65.1382 66.8616Z" fill="white"/>
                    <path d="M56.9018 59.9998C56.76 59.9765 56.6149 59.9814 56.4749 60.0143C56.3349 60.0473 56.2029 60.1075 56.0863 60.1917C55.9697 60.2758 55.8709 60.3822 55.7955 60.5047C55.7202 60.6271 55.6698 60.7633 55.6473 60.9053L53.4655 73.9962C53.4384 74.1533 53.446 74.3143 53.4879 74.4681C53.5297 74.6219 53.6048 74.7647 53.7077 74.8863C53.8107 75.008 53.939 75.1056 54.0838 75.1723C54.2285 75.2391 54.3861 75.2733 54.5455 75.2726C54.8069 75.2759 55.0609 75.1852 55.2612 75.017C55.4614 74.8489 55.5946 74.6143 55.6364 74.3562L57.8182 61.2653C57.843 61.1218 57.8389 60.9748 57.806 60.833C57.7732 60.6911 57.7123 60.5573 57.6269 60.4393C57.5415 60.3214 57.4333 60.2217 57.3088 60.1463C57.1843 60.0708 57.0459 60.021 56.9018 59.9998Z" fill="white"/>
                    <path d="M94.9091 15.2725H114.545C115.124 15.2725 115.679 15.5023 116.088 15.9115C116.497 16.3207 116.727 16.8756 116.727 17.4543V21.8179H94.9091V15.2725Z" fill="#323FD4"/>
                    <path d="M84.0001 15.2725H94.9091C95.4878 15.2725 96.0428 15.5023 96.4519 15.9115C96.8611 16.3207 97.091 16.8756 97.091 17.4543V21.8179H81.8182V17.4543C81.8182 16.8756 82.0481 16.3207 82.4573 15.9115C82.8664 15.5023 83.4214 15.2725 84.0001 15.2725Z" fill="#4E6AFF"/>
                    <path d="M81.8182 21.8179H116.727V43.6361C116.727 44.504 116.383 45.3365 115.769 45.9502C115.155 46.564 114.323 46.9088 113.455 46.9088H85.091C84.223 46.9088 83.3905 46.564 82.7768 45.9502C82.163 45.3365 81.8182 44.504 81.8182 43.6361V21.8179Z" fill="#8FA2FF"/>
                    <path d="M90.5455 27.2726H86.1819C85.8925 27.2726 85.615 27.1577 85.4105 26.9531C85.2059 26.7485 85.0909 26.4711 85.0909 26.1817C85.0909 25.8924 85.2059 25.6149 85.4105 25.4103C85.615 25.2058 85.8925 25.0908 86.1819 25.0908H90.5455C90.8348 25.0908 91.1123 25.2058 91.3169 25.4103C91.5215 25.6149 91.6364 25.8924 91.6364 26.1817C91.6364 26.4711 91.5215 26.7485 91.3169 26.9531C91.1123 27.1577 90.8348 27.2726 90.5455 27.2726Z" fill="white"/>
                    <path d="M112.364 27.2726H96C95.7107 27.2726 95.4332 27.1577 95.2286 26.9531C95.0241 26.7485 94.9091 26.4711 94.9091 26.1817C94.9091 25.8924 95.0241 25.6149 95.2286 25.4103C95.4332 25.2058 95.7107 25.0908 96 25.0908H112.364C112.653 25.0908 112.93 25.2058 113.135 25.4103C113.34 25.6149 113.455 25.8924 113.455 26.1817C113.455 26.4711 113.34 26.7485 113.135 26.9531C112.93 27.1577 112.653 27.2726 112.364 27.2726Z" fill="white"/>
                    <path d="M90.5455 32.7272H86.1819C85.8925 32.7272 85.615 32.6123 85.4105 32.4077C85.2059 32.2031 85.0909 31.9256 85.0909 31.6363C85.0909 31.347 85.2059 31.0695 85.4105 30.8649C85.615 30.6603 85.8925 30.5454 86.1819 30.5454H90.5455C90.8348 30.5454 91.1123 30.6603 91.3169 30.8649C91.5215 31.0695 91.6364 31.347 91.6364 31.6363C91.6364 31.9256 91.5215 32.2031 91.3169 32.4077C91.1123 32.6123 90.8348 32.7272 90.5455 32.7272Z" fill="white"/>
                    <path d="M112.364 32.7272H96C95.7107 32.7272 95.4332 32.6123 95.2286 32.4077C95.0241 32.2031 94.9091 31.9256 94.9091 31.6363C94.9091 31.347 95.0241 31.0695 95.2286 30.8649C95.4332 30.6603 95.7107 30.5454 96 30.5454H112.364C112.653 30.5454 112.93 30.6603 113.135 30.8649C113.34 31.0695 113.455 31.347 113.455 31.6363C113.455 31.9256 113.34 32.2031 113.135 32.4077C112.93 32.6123 112.653 32.7272 112.364 32.7272Z" fill="white"/>
                    <path d="M90.5455 38.1818H86.1819C85.8925 38.1818 85.615 38.0669 85.4105 37.8623C85.2059 37.6577 85.0909 37.3802 85.0909 37.0909C85.0909 36.8016 85.2059 36.5241 85.4105 36.3195C85.615 36.1149 85.8925 36 86.1819 36H90.5455C90.8348 36 91.1123 36.1149 91.3169 36.3195C91.5215 36.5241 91.6364 36.8016 91.6364 37.0909C91.6364 37.3802 91.5215 37.6577 91.3169 37.8623C91.1123 38.0669 90.8348 38.1818 90.5455 38.1818Z" fill="white"/>
                    <path d="M112.364 38.1818H96C95.7107 38.1818 95.4332 38.0669 95.2286 37.8623C95.0241 37.6577 94.9091 37.3802 94.9091 37.0909C94.9091 36.8016 95.0241 36.5241 95.2286 36.3195C95.4332 36.1149 95.7107 36 96 36H112.364C112.653 36 112.93 36.1149 113.135 36.3195C113.34 36.5241 113.455 36.8016 113.455 37.0909C113.455 37.3802 113.34 37.6577 113.135 37.8623C112.93 38.0669 112.653 38.1818 112.364 38.1818Z" fill="white"/>
                    <path d="M90.5455 43.6364H86.1819C85.8925 43.6364 85.615 43.5215 85.4105 43.3169C85.2059 43.1123 85.0909 42.8348 85.0909 42.5455C85.0909 42.2562 85.2059 41.9787 85.4105 41.7741C85.615 41.5695 85.8925 41.4546 86.1819 41.4546H90.5455C90.8348 41.4546 91.1123 41.5695 91.3169 41.7741C91.5215 41.9787 91.6364 42.2562 91.6364 42.5455C91.6364 42.8348 91.5215 43.1123 91.3169 43.3169C91.1123 43.5215 90.8348 43.6364 90.5455 43.6364Z" fill="white"/>
                    <path d="M112.364 43.6364H96C95.7107 43.6364 95.4332 43.5215 95.2286 43.3169C95.0241 43.1123 94.9091 42.8348 94.9091 42.5455C94.9091 42.2562 95.0241 41.9787 95.2286 41.7741C95.4332 41.5695 95.7107 41.4546 96 41.4546H112.364C112.653 41.4546 112.93 41.5695 113.135 41.7741C113.34 41.9787 113.455 42.2562 113.455 42.5455C113.455 42.8348 113.34 43.1123 113.135 43.3169C112.93 43.5215 112.653 43.6364 112.364 43.6364Z" fill="white"/>
                    <path d="M93.8182 19.6364C94.4207 19.6364 94.9091 19.148 94.9091 18.5455C94.9091 17.943 94.4207 17.4546 93.8182 17.4546C93.2157 17.4546 92.7273 17.943 92.7273 18.5455C92.7273 19.148 93.2157 19.6364 93.8182 19.6364Z" fill="white"/>
                    <path d="M113.455 19.6364C114.057 19.6364 114.545 19.148 114.545 18.5455C114.545 17.943 114.057 17.4546 113.455 17.4546C112.852 17.4546 112.364 17.943 112.364 18.5455C112.364 19.148 112.852 19.6364 113.455 19.6364Z" fill="white"/>
                    <path d="M109.091 19.6364C109.693 19.6364 110.182 19.148 110.182 18.5455C110.182 17.943 109.693 17.4546 109.091 17.4546C108.488 17.4546 108 17.943 108 18.5455C108 19.148 108.488 19.6364 109.091 19.6364Z" fill="white"/>
                    <path d="M104.727 19.6364C105.33 19.6364 105.818 19.148 105.818 18.5455C105.818 17.943 105.33 17.4546 104.727 17.4546C104.125 17.4546 103.636 17.943 103.636 18.5455C103.636 19.148 104.125 19.6364 104.727 19.6364Z" fill="white"/>
                </g>
            </svg>

        </div>
    </div>
</div>

<div class="my-account-dashboard-table dashbord_page">
    <div class="dashboard-table-header">
        <div class="dashboard-table-toggle-button">
            <div class="dashboard-table-toggle-cards active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3H10V10H3V3Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 3H21V10H14V3Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 14H21V21H14V14Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 14H10V21H3V14Z" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="dashboard-table-toggle-table">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 12H21" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 6H13" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 18H21" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
<!-- был селект -->
    </div>

    



    
<table id="table" cellspacing="0" cellpadding="0" class="custom-table">
  <thead class="tab-legend">
    <tr>
      <th>Employee</th>
      <th class="th-with-select" id="sel-position">Position <span class="th-with-select-arrow"></span>
        <div class="position-settings-container">
                <button class="accordion" >Developers</button>
            <div class="panel">
            <div class="position-name"><input type="checkbox">Back-end developer</div>
            <div class="position-name"><input type="checkbox">Front-end developer</div>
            <div class="position-name"><input type="checkbox">Full-stack developer</div>
            <div class="position-name"><input type="checkbox">QA</div>
            </div>

            <button class="accordion">Designers</button>
            <div class="panel">
            <div class="position-name"><input type="checkbox">UX/UI designer</div>
            <div class="position-name"><input type="checkbox">Web-designer</div>
            <div class="position-name"><input type="checkbox">Graphic designer</div>
            <div class="position-name"><input type="checkbox">Illustrator</div>
            <div class="position-name"><input type="checkbox">Motion designer</div>
            <div class="position-name"><input type="checkbox">Video editor</div>
            </div>

            <button class="accordion">Marketers</button>
            <div class="panel">
            <div class="position-name"><input type="checkbox">Copywriter</div>
            <div class="position-name"><input type="checkbox">Email marketer</div>
            <div class="position-name"><input type="checkbox">FB ads manager</div>
            <div class="position-name"><input type="checkbox">Influencer manager</div>
            <div class="position-name"><input type="checkbox">PPC specialist</div>
            <div class="position-name"><input type="checkbox">Project manager</div>
            <div class="position-name"><input type="checkbox">SEO specialist</div>
            <div class="position-name"><input type="checkbox">Social media manager</div>
            </div> 
        </div>
    </th>
      <th class="th-with-select" id="sel-period">Period<span class="th-with-select-arrow"></span>
      <div class="position-settings-container">
            <button class="accordio1n active" style="display: none;">Select period</button>
            <div class="panel panel-period" style="display: block;">
            <div class="panel-title"><p>Select period</p></div>
                <div class="position-name"><input type="radio" name="selected-period">All time</div>
                <div class="position-name"><input type="radio" name="selected-period">Half year</div>
                <div class="position-name"><input type="radio" name="selected-period">Three months</div>
                <div class="position-name"><input type="radio" name="selected-period">Month</div>
                <div class="position-name"><input type="radio" name="selected-period">Week</div>
            </div>
        </div>
    </th>
      <th class="th-with-select" id="sel-total">Total<span class="th-with-select-arrow"></span>
      <div class="position-settings-container">
            <button class="accordio1n active" style="display: none;">Total</button>
            <div class="panel panel-total" style="display: block;">
                <div class="position-name">
                    
                <div class="wrapper">
      <div class="price-input">
        <div class="field">
          <input type="number" class="input-min" value="0">
        </div>

        <div class="field">
          <input type="number" class="input-max" value="100000">
        </div>
      </div>
      <div class="slider">
        <div class="progress"></div>
      </div>
      <div class="range-input">
        <input type="range" class="range-min" min="0" max="100000" value="0" step="500">
        <input type="range" class="range-max" min="0" max="100000" value="100000" step="500">
      </div>
    </div>

    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider .progress");
let priceGap = 1000;
priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);
        
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});
rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);
        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});
    </script>

                </div>
            </div>
        </div>
    </th>
      <th class="th-with-select" id="sel-type">Type<span class="th-with-select-arrow"></span>
      <div class="position-settings-container type-cont">
            <button class="accordio1n active" style="display: none;">Type</button>
            <div class="panel panel-type" style="display: block;">
                <div class="position-name"><input type="checkbox">Full-time</div>
                <div class="position-name"><input type="checkbox">Part time</div>
                <div class="position-name"><input type="checkbox">Contract</div>
            </div>
        </div>
    </th>
      <th class="th-with-select" id="sel-time">Time remeining<span class="th-with-select-arrow"></span>
      <div class="position-settings-container container-time-remaining">
            <button class="accordio1n active" style="display: none;">Type</button>
            <div class="panel panel-type" style="display: block;">
                <div class="position-name time-remaining">To <input class="time-remaining-input" type="form" placeholder="00:00:00"></div>

            </div>
        </div>
    </th>
      <th>Actions</th>
    </tr>
  </thead>




<tbody id="paginated-list" data-current-page="1" aria-live="polite" class="tbody-employess">
 <?php
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
                    $order_period = $item->get_meta( 'choose-work-period', true );
                    $order_type_employee = $item->get_meta( 'choose-type-of-employment', true );
                    $order_sub_price = $item->get_subtotal();
                    $sub_status = $subscription->get_data()['status'];
                    $sub_start = $subscription->get_data()['schedule_start']->format('d.m.Y');
                    $sub_end = $subscription->get_data()['schedule_end'];
                    $sub_end_timer = $subscription->get_data()['schedule_end'];
                    if ($sub_end_timer === null){
                        $sub_end_timer = $subscription->get_data()['schedule_end'];
                    } else {
                        $sub_end_timer = $subscription->get_data()['schedule_end']->format('m d, Y H:i:s');
                    }
                    ?>
                                          <script type="text/javascript"> 
    jQuery(document).ready(function(){
       spge = "<?php echo $sub_end_timer ;?>"; 
        var countDownDate = new Date(spge).getTime();
        var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hoursdays = Math.floor(distance / (1000 * 60 * 60 * 24) * 24);
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById('<?php echo $product_subs_id; ?>').innerHTML = days + "d " + hours + ":" + minutes + ":" + seconds; 
           if (distance < 0) {
               clearInterval(x);
                 document.getElementById('<?php echo $product_subs_id; ?>').innerHTML = "00:00:00";
           } else
           if (isNaN(distance)) {
               clearInterval(x);
                 document.getElementById('<?php echo $product_subs_id; ?>').innerHTML = "??:??:?? NaN";
           }
        });
    });
</script>
                      <tr class="tr-employee-item">

                          <td class="col-employee">
                                <div class="employee_sub_img">
                                    <div class="img_sub">
                                        <?php
                                        echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product), $_product->get_image()) ));
                                        ?>
                                    </div>
                                    <?php
                                    echo '<div><span>' . $product_name . '</span></div>';
                                    ?>
                                </div>
                            </td>
                          <td class="col-position"><?php echo $product_position; ?></td>
                          <td class="col-period"><?php echo $sub_start; ?></td>
                          <td class="col-total"><?php echo $order_sub_price; ?>$</td>
                          <td class="col-type"><?php echo $order_type_employee; ?></td>
                          <td class="col-time-remeining"><div id="<?php echo $product_subs_id; ?>"></div><a href="#" class="add-more-time-table-btn-wrapper"><div class="add-more-time-table-btn"><img src="https://www.rhelpers.com/wp-content/uploads/2022/12/plus.svg" alt="Add more time"></div></a></td>
                          <td class="col-actions">
                            <div class="dropdown-simple">
                                <p style="cursor:pointer;" class="dropdown-link-action">
                                        <svg width="23" height="5" viewBox="0 0 23 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                            <circle cx="11.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                            <circle cx="20.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                        </svg>
                                </p>
                                    <ul class="dropdown-list-simple">
                                        <?php
                                        foreach ( $actions as $key => $action ) {
                                            echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
                                        } ?>
                                    </ul>
                            </div>
                        </td>
                      </tr>
                    <?php
                }
            }
    ?>
  </tbody>
</table>


<nav class="pagination-container" style="display:none;">
  <button class="pagination-button" id="prev-button" title="Previous page" aria-label="Previous page">
    <span class="pagination-button-arrow"></span>
  </button>
   
  <div id="pagination-numbers">
 
  </div>
   
  <button class="pagination-button" id="next-button" title="Next page" aria-label="Next page">
  <span class="pagination-button-arrow"></span>
  </button>
</nav>



    <div class="dashboard-table-cards visible">
        <div class="filter-main-menu-expender">Filter<span class="filter-main-menu-expender__arrow"></span>
    <div class="filter-main-menu-container">
        <div class="filter-main-menu-container__settings">
        <div class="position-settings-container">
        <button class="accordion accordion-main">Position</button>
        <div class="panel">
            <button class="accordion" >Developers</button>
            <div class="panel">
                <div class="position-name"><input type="checkbox">Back-end developer</div>
                <div class="position-name"><input type="checkbox">Front-end developer</div>
                <div class="position-name"><input type="checkbox">Full-stack developer</div>
                <div class="position-name"><input type="checkbox">QA</div>
            </div>

            <button class="accordion">Designers</button>
            <div class="panel">
                <div class="position-name"><input type="checkbox">UX/UI designer</div>
                <div class="position-name"><input type="checkbox">Web-designer</div>
                <div class="position-name"><input type="checkbox">Graphic designer</div>
                <div class="position-name"><input type="checkbox">Illustrator</div>
                <div class="position-name"><input type="checkbox">Motion designer</div>
                <div class="position-name"><input type="checkbox">Video editor</div>
            </div>

            <button class="accordion">Marketers</button>
            <div class="panel">
                <div class="position-name"><input type="checkbox">Copywriter</div>
                <div class="position-name"><input type="checkbox">Email marketer</div>
                <div class="position-name"><input type="checkbox">FB ads manager</div>
                <div class="position-name"><input type="checkbox">Influencer manager</div>
                <div class="position-name"><input type="checkbox">PPC specialist</div>
                <div class="position-name"><input type="checkbox">Project manager</div>
                <div class="position-name"><input type="checkbox">SEO specialist</div>
                <div class="position-name"><input type="checkbox">Social media manager</div>
            </div> 
        </div>
            <button class="accordion accordion-main">Period</button>
            <div class="panel panel-period">
            <div class="panel-title"><p>Select period</p></div>
                <div class="position-name"><input type="radio" name="selected-period">All time</div>
                <div class="position-name"><input type="radio" name="selected-period">Half year</div>
                <div class="position-name"><input type="radio" name="selected-period">Three months</div>
                <div class="position-name"><input type="radio" name="selected-period">Month</div>
                <div class="position-name"><input type="radio" name="selected-period">Week</div>
            </div>
            <button class="accordion accordion-main">Total</button>
            <div class="panel panel-period">
            <button class="accordio1n active" style="display: none;">Total</button>
            <div class="panel panel-total" style="display: block;">
                <div class="position-name">
                    
                <div class="wrapper">
      <div class="price-inputA">
        <div class="fieldA">
          <input type="number" class="input-min" value="0">
        </div>

        <div class="fieldA">
          <input type="number" class="input-max" value="100000">
        </div>
      </div>
      <div class="sliderA">
        <div class="progressA"></div>
      </div>
      <div class="range-inputA">
        <input type="range" class="range-min" min="0" max="100000" value="0" step="500">
        <input type="range" class="range-max" min="0" max="100000" value="100000" step="500">
      </div>
    </div>

    <script>
        const rangeInputA = document.querySelectorAll(".range-inputA input"),
priceInputA = document.querySelectorAll(".price-inputA input"),
rangeA = document.querySelector(".sliderA .progressA");
let priceGapA = 1000;
priceInputA.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPriceA = parseInt(priceInputA[0].value),
        maxPriceA = parseInt(priceInputA[1].value);
        
        if((maxPriceA - minPriceA >= priceGapA) && maxPriceA <= rangeInputA[1].max){
            if(e.target.className === "input-minA"){
                rangeInputA[0].value = minPriceA;
                rangeA.style.left = ((minPriceA / rangeInputA[0].max) * 100) + "%";
            }else{
                rangeInputA[1].value = maxPriceA;
                rangeA.style.right = 100 - (maxPriceA / rangeInputA[1].max) * 100 + "%";
            }
        }
    });
});
rangeInputA.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInputA[0].value),
        maxVal = parseInt(rangeInputA[1].value);
        if((maxVal - minVal) < priceGapA){
            if(e.target.className === "range-minA"){
                rangeInputA[0].value = maxVal - priceGapA
            }else{
                rangeInputA[1].value = minVal + priceGapA;
            }
        }else{
            priceInputA[0].value = minVal;
            priceInputA[1].value = maxVal;
            rangeA.style.left = ((minVal / rangeInputA[0].max) * 100) + "%";
            rangeA.style.right = 100 - (maxVal / rangeInputA[1].max) * 100 + "%";
        }
    });
});
    </script>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
<?php

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
                $order_period = $item->get_meta( 'choose-work-period', true );
                $order_type_employee = $item->get_meta( 'choose-type-of-employment', true );
                $order_sub_price = $item->get_subtotal();
                $sub_status = $subscription->get_data()['status'];
                $sub_start = $subscription->get_data()['schedule_start']->format('d.m.Y');
                $sub_end = $subscription->get_data()['schedule_end'];
                $sub_end_timer = $subscription->get_data()['schedule_end'];
                if ($sub_end_timer === null){
                    $sub_end_timer = $subscription->get_data()['schedule_end'];
                } else {
                    $sub_end_timer = $subscription->get_data()['schedule_end']->format('m d, Y H:i:s');
                }
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
                ?>  
    <div class="dashboard-table-card">
        <div class="dashboard-table-card-action dropdown-simple-card">
                        <p style="cursor:pointer;" class="dropdown-link-action">
                            <svg width="23" height="5" viewBox="0 0 23 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="2.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                <circle cx="11.5" cy="2.5" r="2.5" fill="#005BBB"/>
                                <circle cx="20.5" cy="2.5" r="2.5" fill="#005BBB"/>
                            </svg>
                        </p>
                        <ul class="dropdown-list-simple">
                            <?php
                            foreach ( $actions as $key => $action ) {
                                echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a><br>';
                            } ?>
                        </ul>
        </div>
        <div class="dashboard-table-card-person">
        <div class="user_acc_image">
        <?php echo (apply_filters( 'woocommerce_cart_item_thumbnail', sprintf('<a href="%s" target="_blank">%s</a>', esc_url($product), $_product->get_image()) ));?>
        </div>
            <span class="dashboard-table-card-person-name"><?php echo $product_name; ?></span>
            <div class="dashboard-table-card-person-position"><?php echo $product_position; ?></div>
        </div>
        <div class="dashboard-table-card-info">
            <div class="dashboard-table-card-info-item">
                <div class="dashboard-table-card-info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.25C6.61547 2.25 2.25 6.61547 2.25 12C2.25 17.3845 6.61547 21.75 12 21.75C17.3845 21.75 21.75 17.3845 21.75 12C21.75 6.61547 17.3845 2.25 12 2.25ZM16.5 13.5H12C11.8011 13.5 11.6103 13.421 11.4697 13.2803C11.329 13.1397 11.25 12.9489 11.25 12.75V6C11.25 5.80109 11.329 5.61032 11.4697 5.46967C11.6103 5.32902 11.8011 5.25 12 5.25C12.1989 5.25 12.3897 5.32902 12.5303 5.46967C12.671 5.61032 12.75 5.80109 12.75 6V12H16.5C16.6989 12 16.8897 12.079 17.0303 12.2197C17.171 12.3603 17.25 12.5511 17.25 12.75C17.25 12.9489 17.171 13.1397 17.0303 13.2803C16.8897 13.421 16.6989 13.5 16.5 13.5Z" fill="#5A5A5A"/>
                    </svg>
                </div>
                <div class="dashboard-table-card-info-term">
                    <?php 
                    if ($order_type_employee == null){
                        echo 'Unset'; 
                        } else {
                        echo $order_type_employee; 
                    }
                    ?>
                    </div>
            </div>
            <div class="dashboard-table-card-info-item">
                <div class="dashboard-table-card-info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.625 21C2.625 21.4148 2.96016 21.75 3.375 21.75H20.625C21.0398 21.75 21.375 21.4148 21.375 21V11.1562H2.625V21ZM20.625 4.6875H16.6875V3.1875C16.6875 3.08437 16.6031 3 16.5 3H15.1875C15.0844 3 15 3.08437 15 3.1875V4.6875H9V3.1875C9 3.08437 8.91563 3 8.8125 3H7.5C7.39687 3 7.3125 3.08437 7.3125 3.1875V4.6875H3.375C2.96016 4.6875 2.625 5.02266 2.625 5.4375V9.5625H21.375V5.4375C21.375 5.02266 21.0398 4.6875 20.625 4.6875Z" fill="#5A5A5A"/>
                    </svg>

                </div>
                <div class="dashboard-table-card-info-term"><?php echo $sub_start; ?> - <?php echo $sub_end; ?></div>
            </div>
            <div class="dashboard-table-card-info-item">
                <div class="dashboard-table-card-info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.9999 12C18.7599 12 20.9999 9.76 20.9999 7C20.9999 4.24 18.7599 2 15.9999 2C13.2399 2 10.9999 4.24 10.9999 7C10.9999 9.76 13.2399 12 15.9999 12ZM21.4499 17.6C21.0599 17.2 20.5699 17 19.9999 17H12.9999L10.9199 16.27L11.2499 15.33L12.9999 16H15.7999C16.1499 16 16.4299 15.86 16.6599 15.63C16.8899 15.4 16.9999 15.12 16.9999 14.81C16.9999 14.27 16.7399 13.9 16.2199 13.69L8.94989 11H6.99989V20L13.9999 22L22.0299 19C22.0399 18.47 21.8399 18 21.4499 17.6ZM4.99989 11H0.983887V22H4.99989V11Z" fill="#5A5A5A"/>
                    </svg>

                </div>
                <div class="dashboard-table-card-info-term">$<?php echo $order_sub_price; ?></div>
            </div>
            <div class="dashboard-table-card-info-item">
                <div class="dashboard-table-card-info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.79999 0.8C8.79999 0.587827 8.88428 0.384344 9.03431 0.234315C9.18434 0.0842855 9.38782 0 9.59999 0L14.4 0C14.6122 0 14.8157 0.0842855 14.9657 0.234315C15.1157 0.384344 15.2 0.587827 15.2 0.8C15.2 1.01217 15.1157 1.21566 14.9657 1.36569C14.8157 1.51571 14.6122 1.6 14.4 1.6H12.8V3.392C14.507 3.52273 16.1535 4.08184 17.5872 5.0176C17.619 4.97324 17.6543 4.93151 17.6928 4.8928L19.2928 3.2928C19.3857 3.19993 19.4959 3.12626 19.6173 3.076C19.7386 3.02574 19.8687 2.99987 20 2.99987C20.1313 2.99987 20.2614 3.02574 20.3827 3.076C20.5041 3.12626 20.6143 3.19993 20.7072 3.2928C20.8001 3.38567 20.8737 3.49592 20.924 3.61727C20.9743 3.73861 21.0001 3.86866 21.0001 4C21.0001 4.13134 20.9743 4.26139 20.924 4.38273C20.8737 4.50408 20.8001 4.61433 20.7072 4.7072L19.1472 6.2672C20.8229 7.90096 21.8884 10.0594 22.1664 12.3832C22.4443 14.707 21.9178 17.0558 20.6746 19.0387C19.4314 21.0215 17.5465 22.5187 15.3338 23.2809C13.121 24.0431 10.714 24.0244 8.51337 23.2278C6.31277 22.4312 4.45144 20.9048 3.2393 18.9028C2.02716 16.9009 1.53735 14.5441 1.85145 12.2249C2.16554 9.90574 3.26457 7.76414 4.96554 6.1567C6.66652 4.54925 8.86679 3.57297 11.2 3.3904V1.6H9.59999C9.38782 1.6 9.18434 1.51571 9.03431 1.36569C8.88428 1.21566 8.79999 1.01217 8.79999 0.8ZM3.35999 13.6C3.35999 11.3085 4.27028 9.11091 5.89059 7.4906C7.51091 5.87028 9.70852 4.96 12 4.96C14.2915 4.96 16.4891 5.87028 18.1094 7.4906C19.7297 9.11091 20.64 11.3085 20.64 13.6C20.64 15.8915 19.7297 18.0891 18.1094 19.7094C16.4891 21.3297 14.2915 22.24 12 22.24C9.70852 22.24 7.51091 21.3297 5.89059 19.7094C4.27028 18.0891 3.35999 15.8915 3.35999 13.6ZM12 13.6V6.56C10.8422 6.55986 9.70224 6.84527 8.6811 7.39095C7.65996 7.93664 6.78917 8.72575 6.14586 9.68837C5.50255 10.651 5.1066 11.7574 4.99306 12.9096C4.87953 14.0619 5.05192 15.2243 5.49497 16.294C5.93802 17.3636 6.63805 18.3075 7.53305 19.042C8.42804 19.7765 9.49038 20.2789 10.6259 20.5048C11.7615 20.7306 12.9352 20.6729 14.0431 20.3367C15.1511 20.0006 16.159 19.3964 16.9776 18.5776L12 13.6Z" fill="#5A5A5A"/>
                    </svg>
                </div>
                <div style="color: var(--rh-green-color);" class="dashboard-table-card-info-term">
                <script type="text/javascript"> 
                    jQuery(document).ready(function(){
                        spge1 = "<?php echo $sub_end_timer ;?>"; 
                            var countDownDate1 = new Date(spge1).getTime();
                            var x1 = setInterval(function() {
                            var now1 = new Date().getTime();
                            var distance1 = countDownDate1 - now1;
                            var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
                            var hoursdays1 = Math.floor(distance1 / (1000 * 60 * 60 * 24) * 24);
                            var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);
                        document.getElementById('<?php echo $product_order_id; ?>').innerHTML = days1 + "d " + hours1 + ":" + minutes1 + ":" + seconds1; 
                        if (distance1 < 0) {
                            clearInterval(x1);
                                document.getElementById('<?php echo $product_order_id; ?>').innerHTML = "00:00:00";
                            }
                        });
                    });
                </script>
                <?php 
                    if ($order_period == null){
                        echo 'Unset'; 
                        } else {
                        ?>
                        <div id="<?php echo $product_order_id; ?>" class="time_count_end"></div>
                        <?php
                        //echo '<div class="custom-table-td"><span>'. $order_period . '</span></div>';
                    }
                    ?>
                    </div>
            </div>
        </div>
        <div class="dashboard-table-card-button">Add more time
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 17V9M9 9V1M9 9H17M9 9H1" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>

        </div>
    </div>

<?php
            }
        }
        ?>
</div>







    </div>
    <script>
    let acc = document.getElementsByClassName("accordion");
let i;
let a;
let selSettings = document.getElementsByClassName("th-with-select");
const selPosition = document.querySelector("#sel-position");
const selPeriod = document.querySelector("#sel-period");
const selTotal = document.querySelector("#sel-total");
const selType = document.querySelector("#sel-type");
const selTime = document.querySelector("#sel-time");

function showSettings () {
        selPosition.classList.remove('active');
        selPeriod.classList.remove('active');
        selTotal.classList.remove('active');
        selType.classList.remove('active');
        selTime.classList.remove('active');
        this.classList.add('active');
        this.removeEventListener('click', showSettings);
        this.querySelector('.th-with-select').addEventListener('click', function () {
            var panel2 = this.querySelector('.position-settings-container');
        if (panel2.style.display === "block") {
            panel2.style.display = "none";
        } else {
            panel2.style.display = "block";
        }
        });

        // this.querySelector('.th-with-select-arrow').addEventListener('click', hideSettings);

}

function hideSettings () {
    this.classList.remove('active');
    this.addEventListener('click', showSettings);
    this.removeEventListener('click', hideSettings);
}

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
} 
// for (a = 0; a < selSettings.length; a++) {
//     selSettings[a].addEventListener('click', showSettings);
// }
// table with employees item pagination for mobile devices
if (document.documentElement.clientWidth < 768) {
    const paginationNumbers = document.getElementById("pagination-numbers");
const paginatedList = document.getElementById("paginated-list");
const listItems = paginatedList.querySelectorAll(".tr-employee-item");
const nextButton = document.getElementById("next-button");
const prevButton = document.getElementById("prev-button");

const paginationLimit = 1;
const pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage = 1;

const disableButton = (button) => {
  button.classList.add("disabled");
  button.setAttribute("disabled", true);
};

const enableButton = (button) => {
  button.classList.remove("disabled");
  button.removeAttribute("disabled");
};

const handlePageButtonsStatus = () => {
  if (currentPage === 1) {
    disableButton(prevButton);
  } else {
    enableButton(prevButton);
  }

  if (pageCount === currentPage) {
    disableButton(nextButton);
  } else {
    enableButton(nextButton);
  }
};

const handleActivePageNumber = () => {
  document.querySelectorAll(".pagination-number").forEach((button) => {
    button.classList.remove("active");
    const pageIndex = Number(button.getAttribute("page-index"));
    if (pageIndex == currentPage) {
      button.classList.add("active");
    }
  });
};

const appendPageNumber = (index) => {
  const pageNumber = document.createElement("button");
  pageNumber.className = "pagination-number";
  pageNumber.innerHTML = index;
  pageNumber.setAttribute("page-index", index);
  pageNumber.setAttribute("aria-label", "Page " + index);

  paginationNumbers.appendChild(pageNumber);
};

const getPaginationNumbers = () => {
  for (let i = 1; i <= pageCount; i++) {
    appendPageNumber(i);
  }
};

const setCurrentPage = (pageNum) => {
  currentPage = pageNum;

  handleActivePageNumber();
  handlePageButtonsStatus();
  
  const prevRange = (pageNum - 1) * paginationLimit;
  const currRange = pageNum * paginationLimit;

  listItems.forEach((item, index) => {
    item.classList.add("hidden");
    if (index >= prevRange && index < currRange) {
      item.classList.remove("hidden");
    }
  });
};

window.addEventListener("load", () => {
  getPaginationNumbers();
  setCurrentPage(1);

  prevButton.addEventListener("click", () => {
    setCurrentPage(currentPage - 1);
  });

  nextButton.addEventListener("click", () => {
    setCurrentPage(currentPage + 1);
  });

  document.querySelectorAll(".pagination-number").forEach((button) => {
    const pageIndex = Number(button.getAttribute("page-index"));

    if (pageIndex) {
      button.addEventListener("click", () => {
        setCurrentPage(pageIndex);
      });
    }
  });
});
}
    </script>

</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
