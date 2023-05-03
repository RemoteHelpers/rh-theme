<?php
/**
 * clean functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package clean
 */
/**
 * Includes.
 */
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}
//creating general info option page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'General information',
        'menu_title' => 'General information',
        'menu_slug' => 'theme-general-info',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}
if (!function_exists('clean_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function clean_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on clean, use a find and replace
         * to change 'clean' to the name of your theme in all the template files.
         */
        load_theme_textdomain('clean', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'clean'),
            )
        );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );
        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'clean_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'clean_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clean_content_width()
{
    $GLOBALS['content_width'] = apply_filters('clean_content_width', 640);
}
add_action('after_setup_theme', 'clean_content_width', 0);
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clean_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'clean'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'clean'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'clean_widgets_init');
/**
 * Register filter sidebar.
 */
function filter_sidebar_init()
{
    register_sidebar(array(
        'name' => 'Filter sidebar',
        'id' => 'filter_sidebar',
        'before_widget' => '<div class="filter-outer">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="filter-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'filter_sidebar_init');
/* Allow to upload SVG-s */
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    return array_merge($file_types, $new_filetypes);
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
/* Enqueue scripts and styles */
add_theme_support('woocommerce');
/*Disable all Woocommerce (three) stylesheets*/
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
add_action('wp_enqueue_scripts', 'clean_scripts');
function clean_scripts()
{
    /*** Global styles & scripts ***/
        /*Fonts*/
    // wp_enqueue_style('fira-sans', 'https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:wght@300&display=swap', false, '1.1', 'all');
    // wp_enqueue_style('montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800;900&display=fallback', false, null, 'all');

    // wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fontawesome/fontawesome-free-5.15.4-web/css/all.css', false, '1.1', 'all');
        /*End of fonts*/

    wp_enqueue_style('clean-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('cart-style', get_template_directory_uri() . '/css/cart.css', false, '1.1', 'all');
    wp_enqueue_style('variables', get_template_directory_uri() . '/css/variables.css', false, '1.1', 'all');
    wp_enqueue_style('checkout-style', get_template_directory_uri() . '/css/checkout.css', false, '1.1', 'all');
    wp_enqueue_style('jsform-checkout-style', get_template_directory_uri() . '/css/custom-form-style.css', false, '1.1', 'all');
    wp_enqueue_style('slick-styles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false, '1.1', 'all');
    /*END of global styles & scripts*/

    wp_enqueue_style('category', get_template_directory_uri() . '/css/category.css', false, '1.1', 'all');
    wp_enqueue_style('header-style', get_template_directory_uri() . '/css/header.css', false, '1.1', 'all');
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/css/footer.css', false, '1.1', 'all');
    wp_enqueue_style('mini-cart-style', get_template_directory_uri() . '/css/mini-cart.css', false, '1.1', 'all');
    wp_enqueue_style('employee-card', get_template_directory_uri() . '/css/employee-card.css', false, '1.1', 'all');
    wp_enqueue_style('error-style', get_template_directory_uri() . '/css/error.css', false, '1.1', 'all');
    wp_enqueue_style('contact-form-component', get_template_directory_uri() . '/css/contact-form-component.css', false, '1.1', 'all');

    wp_enqueue_script('slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('clean-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('secret-popup', get_template_directory_uri() . '/js/simple-slider.js', array(), _S_VERSION, true);
    wp_enqueue_script('clean-script', get_template_directory_uri() . '/js/index.js', array('jquery', 'acf-input'), _S_VERSION, true);
    wp_enqueue_script('font-awesome-script', 'https://kit.fontawesome.com/fe509cfc8f.js', array(), _S_VERSION, true);
    wp_enqueue_script('lozad', '//cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js', array(), _S_VERSION, true);



    acf_enqueue_script('clean-script');

    if (is_front_page()) {
        wp_enqueue_style('home-style', get_template_directory_uri() . '/css/front-page.css', false, '1.1', 'all');
        wp_enqueue_script('home-page', get_template_directory_uri() . '/js/front-page.js', array(), _S_VERSION, true);
    }
    if (is_archive()) {
        wp_enqueue_style('portfolio-cases-css', get_template_directory_uri() . '/css/portfolio-cases.css', false, '1.1', 'all');
        wp_enqueue_script('gsap-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array(), _S_VERSION, true);
        wp_enqueue_script('category-page', get_template_directory_uri() . '/js/category.js', array(), _S_VERSION, true);

    }
    if (is_product()) {
        wp_enqueue_style('single-product', get_template_directory_uri() . '/css/single-product.css', false, '1.1', 'all');
        wp_enqueue_script('jq-in-view-script', 'https://cdnjs.cloudflare.com/ajax/libs/is-in-viewport/3.0.4/isInViewport.min.js', array(), _S_VERSION, true);
        wp_enqueue_script('cv', get_template_directory_uri() . '/js/single-product.js', array(), _S_VERSION, true);

        global $wp_scripts;
        $wp_scripts->registered['wc-single-product']->src = get_template_directory_uri() . '/woocommerce/js/single-product.min.js';
    }
    if (is_page('contacts')) {
        wp_enqueue_style('contacts-style', get_template_directory_uri() . '/css/contacts.css', false, '1.1', 'all');

        wp_enqueue_script('form-page', get_template_directory_uri() . '/js/custom-form.js', array(), _S_VERSION, true);
    }
    if (is_page('faq')) {
        wp_enqueue_style('faq-style', get_template_directory_uri() . '/css/faq.css', false, '1.1', 'all');
        wp_enqueue_script('faq-js', get_template_directory_uri() . '/js/faq.js', array(), _S_VERSION, true);
    }
    if (is_page('privacy-policy')) {
        wp_enqueue_style('privacy-style', get_template_directory_uri() . '/css/privacy.css', false, '1.1', 'all');
        wp_enqueue_script('privacy-js', get_template_directory_uri() . '/js/privacy-policy.js', array(), _S_VERSION, true);
    }
    if (is_page('pricing')) {
        wp_enqueue_style('slick-pricing-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', false, '1.1', 'all');
        wp_enqueue_style('pricing-style', get_template_directory_uri() . '/css/pricing.css', false, '1.1', 'all');
        wp_enqueue_script('jquery-pricing', '//code.jquery.com/jquery-1.11.0.min.js', array(), _S_VERSION, true);
        wp_enqueue_script('slick-pricing', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), _S_VERSION, true);
        wp_enqueue_script('pricing-js', get_template_directory_uri() . '/js/pricing.js', array(), _S_VERSION, true);
    }
    if (is_page('affiliate-page')) {
        wp_enqueue_style('affiliate-page-style', get_template_directory_uri() . '/css/affiliate-page.css', false, '1.1', 'all');
        wp_enqueue_script('form-aff', get_template_directory_uri() . '/js/custom-form.js', array(), _S_VERSION, true);
        wp_enqueue_style('contact-form-component', get_template_directory_uri() . '/css/contact-form-component.css', false, '1.1', 'all');
    }
    if (is_page('about-us')) {
        wp_enqueue_style('about-us-style', get_template_directory_uri() . '/css/about-us.css', false, '1.1', 'all');
        wp_enqueue_style('contact-form-component', get_template_directory_uri() . '/css/contact-form-component.css', false, '1.1', 'all');
        wp_enqueue_script('about-js', get_template_directory_uri() . '/js/about-us.js', array(), _S_VERSION, true);
    }
    if($_SERVER['REQUEST_URI'] == '/blog/'){
        wp_enqueue_style('blog-style', get_template_directory_uri() . '/css/blog.css', false, '1.1', 'all');
    }
    if (is_page('checkout')) {
        wp_enqueue_style('form-checkout-style', get_template_directory_uri() . '/css/form-checkout.css', false, '1.1', 'all');
        wp_enqueue_script('form-checkout', get_template_directory_uri() . '/js/custom-form.js', array(), _S_VERSION, true);
        wp_enqueue_script('woo-errors-checkout', get_template_directory_uri() . '/js/woo-errors-close.js', array(), _S_VERSION, true);
    }
    if (is_page('cart')) {
        wp_enqueue_style('basket-style', get_template_directory_uri() . '/css/cart.css', false, '1.1', 'all');

        wp_enqueue_script('basket-js', get_template_directory_uri() . '/js/cart.js', array(), _S_VERSION, true);
    }
    if (is_page('my-account')) {
        wp_enqueue_style('my-account-style', get_template_directory_uri() . '/css/my-account.css', false, '1.1', 'all');
        wp_enqueue_script('my-account-scripts', get_template_directory_uri() . '/js/my-account.js', array(), _S_VERSION, true);
        wp_enqueue_script('table-sort', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js', array(), _S_VERSION, true);
    }
    if (is_page('testform')) {
        wp_enqueue_style('test-form-style', get_template_directory_uri() . '/css/testform.css', false, '1.1', 'all');
        wp_enqueue_script('test-form-script', get_template_directory_uri() . '/js/testform.js', array(), _S_VERSION, true);
    }
    if (is_singular('cases')) {
        wp_enqueue_style('single-cases', get_template_directory_uri() . '/css/single-cases.css', false, '1.1', 'all');
    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    if (is_singular('post')) {
        wp_enqueue_script('form-single-post', get_template_directory_uri() . '/js/custom-form.js', array(), _S_VERSION, true);
        wp_enqueue_script('blog-js', get_template_directory_uri() . '/js/blog.js', array(), _S_VERSION, true);
    }

    wp_style_add_data('clean-style', 'rtl', 'replace');

}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Implement the Custom script feature.
 */
if (file_exists('scripts.php')) {
    require get_template_directory() . 'scripts.php';
}

//require_once(get_template_directory() . 'example.php');

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Function for human-readable output.
 */
function pprint_r($a)
{
    echo "<pre>", htmlspecialchars(print_r($a, true)), "</pre>";
}

/**
 * Products can only be individually sold.
 */
add_filter('woocommerce_add_to_cart_validation', 'wc_limit_one_per_order', 10, 2);
function wc_limit_one_per_order($passed, $product_id)
{
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
//        if product by id is already in cart - error
        if ($cart_item['data']->get_id() === $product_id) {
            wc_add_notice(__('Only individually sold!', 'woocommerce'), 'error');
            $passed = false;
            break;
        }
    }
    return $passed;
}

/**
 * Function for changing woocommerce loop open/close tags.
 */
function woocommerce_product_loop_start()
{
    echo '<div class="products employees similar_slider">';
}

function woocommerce_product_loop_end()
{
    echo '</div>';
}

// echo discount percentage on product
add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {

  if( $product->is_type('variable')){
      $percentages = array();

      // Get all variation prices
      $prices = $product->get_variation_prices();

      // Loop through variation prices
      foreach( $prices['price'] as $key => $price ){
          // Only on sale variations
          if( $prices['regular_price'][$key] !== $price ){
              // Calculate and set in the array the percentage for each variation on sale
              $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } elseif( $product->is_type('grouped') ){
      $percentages = array();

      // Get all variation prices
      $children_ids = $product->get_children();

      // Loop through variation prices
      foreach( $children_ids as $child_id ){
          $child_product = wc_get_product($child_id);

          $regular_price = (float) $child_product->get_regular_price();
          $sale_price    = (float) $child_product->get_sale_price();

          if ( $sale_price != 0 || ! empty($sale_price) ) {
              // Calculate and set in the array the percentage for each child on sale
              $percentages[] = round(100 - ($sale_price / $regular_price * 100));
          }
      }
      // We keep the highest value
      $percentage = max($percentages) . '%';

  } else {
      $regular_price = (float) $product->get_regular_price();
      $sale_price    = (float) $product->get_sale_price();

      if ( $sale_price != 0 || ! empty($sale_price) ) {
          $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
      } else {
          return $html;
      }
  }
  return '<span class="onsale">' . esc_html__( '-', 'woocommerce' ) . ' ' . $percentage . '</span>';
}

/**
 * Single-page layout.
 */


require_once('inc/rh-single-page.php');
/**
 * Shop page layout.
 */
add_action('template_redirect', 'remove_stuff_from_shop');
function remove_stuff_from_shop()
{
    if (is_shop()) {

        /**
         * Remove breadcrumbs.
         */
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

        /**
         * Remove title.
         */
        add_filter('woocommerce_show_page_title', '__return_false');

        /**
         * Remove result_count, catalog_ordering.
         */
        remove_all_actions('woocommerce_before_shop_loop');

        add_filter('wc_add_to_cart_message_html', '__return_false');

        /**
         * Remove sidebar.
         */
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
}
/**
 * Rename "home" in breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
function wcc_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Apartment'
    $defaults['home'] = 'Home';
    return $defaults;
}
/**
 * Archive layout.
 */
add_action('rh_archive_filter', 'rh_open_sidebar_div', 10);
function rh_open_sidebar_div()
{ ?>
    <div class="archive-page">
    <div class="archive-sidebar">
        <!--            --><?php //dynamic_sidebar( 'filter-sidebar' );
        ?>
        <?php echo do_shortcode('[pwf_filter id="323"]') ?>
    </div>
<?php } ?>
<?php
add_action('rh_add_closing_div', 'rh_close_sidebar_div', 10);
function rh_close_sidebar_div(){ ?></div><?php }
//--------------------
add_action( 'login_head', 'login_head_add_css' );
function login_head_add_css() {
    ?>
    <style>
        body {
            background: url("https://images.unsplash.com/photo-1529511582893-2d7e684dd128?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1933&q=80");
        }
    </style>
    <?php
}
add_action('rh_main_page_filter', 'rh_open_sidebar1_div', 10);
function rh_open_sidebar1_div()
{ ?>
    <div class="main-page">
    <div class="main-sidebar">
        <!--            --><?php //dynamic_sidebar( 'filter-sidebar' );
        ?>
        <?php echo do_shortcode('[pwf_filter id="326"]') ?>
    </div>
<?php } ?>
<?php
add_action('rh_main_page_closing_div', 'rh_close_sidebar1_div', 10);
function rh_close_sidebar1_div()
{ ?>
    </div>
<?php } ?>
<?php
/**
 * Function to draw stars from numbers.
 */
function inactiveStar(): string
{
    return '<i class="fas fa-star"></i>';
}
function activeStar(): string
{
    return '<i class="fas fa-star score"></i>';
}
function printStars($quantity, $max): string
{
    $activeStars = $quantity;
    $inactiveStars = $max - $quantity;
    $stars = '';

    while ($activeStars > 0) {
        $stars .= activeStar();
        $activeStars--;
    }
    while ($inactiveStars > 0) {
        $stars .= inactiveStar();
        $inactiveStars--;
    }
    return $stars;
}
?>
<?php
function drawCards($query)
{
    ?>
    <?php if ($query->have_posts()): ?>
    <div class="rh-query-results">
        <?php while ($query->have_posts()) : $query->the_post();
            global $product ?>
            <?php get_template_part('/woocommerce/content-product'); ?>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <h3>No products in category :(</h3>
<?php endif;
} ?>
<?php
//------------- Get Cards by tag
function getProductsByTag($tag)
{
    $args = array(
        'numberposts' => -1,
        'post_type' => 'product',
        'tax_query' => array(
         array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => $tag,
            'operator' => 'IN',
         )
      ),
    );
    $the_query = new WP_Query($args);
    drawCards($the_query);
} ?>
<?php
//------------- Related Cards
function getProductsByAcf($key, $value)
{
    $args = array(
        'numberposts' => -1,
        'post_type' => 'product',
        'meta_query' => [[
            'key' => $key,
            'value' => $value
        ]],
    );
    $the_query = new WP_Query($args);
    drawCards($the_query);
} ?>
<?php
function getRandomCategory($number)
{
    $field = get_field_object('field_61766d92e2c3f');
    $choices = $field['choices'];
    $positionArr = [];
    foreach ($choices as $c) {
        $positionArr[] = $c;
    }
    $random = array_rand($positionArr, 1);
    $random_pos = $positionArr[$random];
    $args = array(
        'numberposts' => $number,
        'post_type' => 'product',
        'meta_query' => [[
            'key' => 'current_position',
            'value' => $random_pos
        ]],
    );

    $the_query = new WP_Query($args);
    ?>
    <h3>Showing cards from category: <?php echo $random_pos; ?></h3>
    <?php
    drawCards($the_query);
}
?>
<?php
//-----------------------------------
/**
 * Remove fields from checkout page.
 */
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);

    return $fields;
}
?>
<?php
/**
 * Redirect at add to cart.
 */
//function rh_redirect_to_checkout() {
//    $url = wc_get_checkout_url();
//    return $url;
//}
//add_filter('woocommerce_add_to_cart_redirect', 'rh_redirect_to_checkout');
?>
<?php
/**
 * Add cart icon to top meny.
 */
//function rh_add_cart_icon_to_top_menu($items, $args)
//{
//    if (WC()->cart->get_cart_contents_count() === 0) {
//        $items .= '<li class="menu-cart-list-item"><div class="menu-cart-btn-empty" id="menu-cart-btn"><i class="fas fa-shopping-cart"></i></div></li>';
//    } else {
//        $items .= '<li class="menu-cart-list-item"><div class="menu-cart-btn-full" id="menu-cart-btn"><i class="fas fa-shopping-cart"></i></div></li>';
//    }
//    return $items;
//}
//
//add_filter('wp_nav_menu_items', 'rh_add_cart_icon_to_top_menu', 10, 2);
?>
<?php
// function custom_add_to_cart_message() {

//     $return_to  = get_permalink(wc_get_page_id('shop'));
//         $message = sprintf('<a href="%s" class="button">%s</a> %s', $return_to, __('', 'woocommerce'),  __('Has been added to your cart', 'woocommerce') );
//     return $message;
// }
// add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );
add_filter( 'wc_add_to_cart_message', 'quadlayers_custom_wc_add_to_cart_message', 10, 2 ); 
 
function quadlayers_custom_wc_add_to_cart_message( $message, $product_id ) { 
    $message = sprintf(esc_html__('%s has been added to your cart.','tm-organik'), get_the_title( $product_id ) ); 
    return $message; 
}
?>
<?php 
// Open terms & condition in a new tab
add_action( 'wp_footer', 'fww_add_jscript_checkout', 9999 );
function fww_add_jscript_checkout() {
   global $wp;
   if ( is_checkout() && empty( $wp->query_vars['order-pay'] ) && ! isset( $wp->query_vars['order-received'] ) ) {
      ?>
		<script type="text/javascript">
			jQuery(".woocommerce-checkout").on( 'click', 'a.woocommerce-terms-and-conditions-link', function(event) {
				event.stopPropagation();
				let TermsPageLink = jQuery('a.woocommerce-terms-and-conditions-link').attr('href');
				window.open(TermsPageLink, '_blank');
				return false;
			});
			
		</script>
		<?php
   }
}
?>
<?php 
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <?php if ( ! WC()->cart->get_cart_contents_count() == 0 ) {
		echo '<span class="counter">' . WC()->cart->get_cart_contents_count() . '</span>';
	} else {
        echo '<span class="counter" style="display: none;"></span>';
    } ?>
    <?php
    $fragments['span.counter'] = ob_get_clean();
    return $fragments;
}
?>
<?php
/**
* Change Sold Out Text to Something Else
*/
add_filter('woocommerce_get_availability_text', 'themeprefix_change_soldout', 10, 2 );
function themeprefix_change_soldout ( $text, $product) {
    if ( !$product->is_in_stock() ) {
    $text = '<div class="">Already hired.</div>';
    }
    return $text;
}
// remove payment methods
// add_filter('woocommerce_cart_needs_payment', '__return_false');
?>
<?php
function my_wc_hide_in_stock_message( $html, $product ) {
	if ( $product->is_in_stock() ) {
		return '';
	}

	return $html;
}
add_filter( 'woocommerce_get_stock_html', 'my_wc_hide_in_stock_message', 10, 2 );
?>
<?php
//SPLIT CATEGORY PRODUCT TAXONOME (ACF)
function add_child_and_parent_to_acf_taxonomy_choices($choices) {
  $tax_choices = array();
  foreach($choices as $taxonomy => $c) {
    $tax_choices[$taxonomy] = $c;
    if($taxonomy != 'all' && is_taxonomy_hierarchical($taxonomy)) {
      $tax_choices[$taxonomy.'-tax_parent'] = $c.' (parent)';
      $tax_choices[$taxonomy.'-tax_child'] = $c.' (child)';
    }
  }
  return $tax_choices;
}
add_filter('acf/location/rule_values/taxonomy', 'add_child_and_parent_to_acf_taxonomy_choices');
function child_and_parent_taxonomy_split_for_acf($match, $rule, $options) {
  global $tag_ID;
  $taxonomy = $options['taxonomy'] ?? '';
  if(!$taxonomy) {
    return false;
  }
  if($tag_ID) {
    $term_obj = get_term($tag_ID, $taxonomy);
    $tax_rule = str_replace($taxonomy.'-', '', $rule['value']);
    if($tax_rule == 'tax_parent') {
      if($rule['operator'] == "==") {
        $match = !$term_obj->parent;
      } elseif($rule['operator'] == "!=") {
        $match = $term_obj->parent;
      }
    } elseif($tax_rule == 'tax_child') {
      if($rule['operator'] == "==") {
        $match = $term_obj->parent;
      } elseif($rule['operator'] == "!=") {
        $match = !$term_obj->parent;
      }
    }
  } else {
    if($rule['operator'] == "==" ) {
      $match = ($taxonomy == $rule['value']);
      if($rule['value'] == "all") {
        $match = true;
      }
    } elseif($rule['operator'] == "!=") {
      $match = ($taxonomy != $rule['value']);
      if($rule['value'] == "all") {
        $match = false;
      }
    }
  }
  return $match;
}
add_filter('acf/location/rule_match/taxonomy', 'child_and_parent_taxonomy_split_for_acf', 10, 3);
?>
<?php
/**
 * UPLOAD AND DIPLAY SVG 
 */
function svgs_upload_mimes( $mimes = array() ) {
	global $svgs_options;
	if ( empty( $_svgs_options['restrict'] ) || current_user_can( 'administrator' ) ) {
		// allow SVG file upload
		$mimes['svg'] = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
		return $mimes;
	} else {
		return $mimes;
	}
}
add_filter( 'upload_mimes', 'svgs_upload_mimes', 99 );
function svgs_upload_check( $checked, $file, $filename, $mimes ) {
	if ( ! $checked['type'] ) {
		$check_filetype		= wp_check_filetype( $filename, $mimes );
		$ext				= $check_filetype['ext'];
		$type				= $check_filetype['type'];
		$proper_filename	= $filename;
		if ( $type && 0 === strpos( $type, 'image/' ) && $ext !== 'svg' ) {
			$ext = $type = false;
		}
		$checked = compact( 'ext','type','proper_filename' );
	}
	return $checked;
}
add_filter( 'wp_check_filetype_and_ext', 'svgs_upload_check', 10, 4 );
function svgs_allow_svg_upload( $data, $file, $filename, $mimes ) {
	global $wp_version;
	if ( $wp_version !== '4.7.1' || $wp_version !== '4.7.2' ) {
		return $data;
	}
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'				=> $filetype['ext'],
		'type'				=> $filetype['type'],
		'proper_filename'	=> $data['proper_filename']
	];
}
add_filter( 'wp_check_filetype_and_ext', 'svgs_allow_svg_upload', 10, 4 );
//CSS TO CONTAIN SVG
function svg_custom_css() {
  echo '<style>
    table.media .column-title .media-icon img{
      width: 100%;
      height: auto;
    } 
  </style>';
};
add_action('admin_head', 'svg_custom_css');
//FIX GRID LAYOUT SVG
function svgs_disable_srcset( $sources ) {
	$first_element = reset($sources);
	if ( isset($first_element) && !empty($first_element['url']) ) {
		$ext = pathinfo(reset($sources)['url'], PATHINFO_EXTENSION);
		if ( $ext == 'svg' ) {
			$sources = array();
			return $sources;
		} else {
			return $sources;
		}
	} else {
		return $sources;
	}
}
add_filter( 'wp_calculate_image_srcset', 'svgs_disable_srcset' );
?>
<?php
    // remove wc blocks library
    function wpassist_remove_block_library_css(){
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wp-block-library' );
    }
    add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

    // remove wc blocks style
    function themesharbor_disable_woocommerce_block_editor_styles() {
        wp_deregister_style( 'wc-block-editor' );
        wp_deregister_style( 'wc-blocks-style' );
      }

    add_action( 'enqueue_block_assets', 'themesharbor_disable_woocommerce_block_editor_styles', 1, 1 );

    // remove dashicons in frontend to non-admin 
    function wpdocs_dequeue_dashicon() {
        if (current_user_can( 'update_core' )) {
            return;
        }
        wp_deregister_style('dashicons');
    }
    add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

    // remove genericons
    function dequeue_my_css() {
        wp_dequeue_style('genericons');
        wp_deregister_style('genericons');
    }
    add_action('wp_enqueue_scripts','dequeue_my_css', 100);
?>
<?php
//hide product quantity
function custom_remove_all_quantity_fields( $return, $product ) {return true;}
add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );
?>
<?php
//hide word "billing" from woocommerce errors notice
function customize_wc_errors( $error ) {
    if ( strpos( $error, 'Billing ' ) !== false ) {
        $error = str_replace("Billing ", "", $error);
    }
    return $error;
}
add_filter( 'woocommerce_add_error', 'customize_wc_errors' );
?>
<?php
//Move Order Review block ro right side for themplate
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
add_action( 'woocommerce_after_checkout_form', 'woocommerce_order_review', 20 );
?>
<?php
//Add REMOVE button to checkout items
function add_delete( $product_title, $cart_item, $cart_item_key ) {
    if (  is_checkout() ) {
        $cart     = WC()->cart->get_cart();
        foreach ( $cart as $cart_key => $cart_value ){
           if ( $cart_key == $cart_item_key ){
                $product_id = $cart_item['product_id'];
                $_product   = $cart_item['data'] ;
                $return_value = sprintf(
                  '<a href="%s" class="remove_item" title="%s" data-product_id="%s" data-product_sku="%s" data-cart_item_key="%s">&times;</a>',
                  esc_url( wc_get_cart_remove_url( $cart_key ) ),
                  __( 'Remove this item', 'woocommerce' ),
                  esc_attr( $product_id ),
                  esc_attr( $_product->get_sku() ),
                  esc_attr( $cart_item_key )
                );
                $return_value .= '<span class = "product_name" >' . $product_title . '</span>' ;
                return $return_value;
            }
        }
    }else{
        $_product   = $cart_item['data'] ;
        $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
        if ( ! $product_permalink ) {
            $return_value = $_product->get_title() . ';';
        } else {
            $return_value = sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title());
        }
        return $return_value;
    }
}
add_filter ('woocommerce_cart_item_name', 'add_delete' , 10, 3 );
?>
<?php
//Update checkout ajax
function warp_ajax_product_remove()
{
    ob_start();
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }
    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();
    woocommerce_order_review();
    $woocommerce_order_review = ob_get_clean();
}
add_action( 'wp_ajax_product_remove', 'warp_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'warp_ajax_product_remove' );
?>
<?php function product_count_shortcode () {
    $count_posts = wp_count_posts ('product');
    return $count_posts-> publish;
}
add_shortcode ('product_count', 'product_count_shortcode');
?>
<?php
//Remove Product Short Description Tab
function remove_short_description() {
    remove_meta_box( 'postexcerpt', 'product', 'normal');
  }
  add_action('add_meta_boxes', 'remove_short_description', 999);
?>
<?php
// Add IMAGE field
function action_woocommerce_edit_account_form_start() {
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
<!--        <label for="image">--><?php //esc_html_e( 'Profile Avatar', 'woocommerce' ); ?><!--&nbsp;<span class="required">*</span></label>-->
        <input type="file" onchange="loadFile(event)" class="woocommerce-Input" name="image" accept="image/x-png,image/gif,image/jpeg">
        <div class="edit-account-upload-image-wrapper">
            <svg width="200" height="200" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="100" fill="#C4C4C4"/>
                <path d="M70 86.6668C70 88.5002 71.5 90.0002 73.3333 90.0002C75.1667 90.0002 76.6667 88.5002 76.6667 86.6668V80.0002H83.3333C85.1667 80.0002 86.6667 78.5002 86.6667 76.6668C86.6667 74.8335 85.1667 73.3335 83.3333 73.3335H76.6667V66.6668C76.6667 64.8335 75.1667 63.3335 73.3333 63.3335C71.5 63.3335 70 64.8335 70 66.6668V73.3335H63.3333C61.5 73.3335 60 74.8335 60 76.6668C60 78.5002 61.5 80.0002 63.3333 80.0002H70V86.6668Z" fill="#005BBB"/>
                <path opacity="0.3" d="M103.333 116.667C108.856 116.667 113.333 112.189 113.333 106.667C113.333 101.144 108.856 96.6665 103.333 96.6665C97.8106 96.6665 93.3335 101.144 93.3335 106.667C93.3335 112.189 97.8106 116.667 103.333 116.667Z" fill="#5A5A5A"/>
                <path opacity="0.3" d="M130 80.0002H119.433L115.3 75.5002C114.679 74.8181 113.922 74.2732 113.078 73.9001C112.235 73.527 111.323 73.3341 110.4 73.3335H89.0667C89.6333 74.3335 90 75.4335 90 76.6668C90 80.3335 87 83.3335 83.3333 83.3335H80V86.6668C80 90.3335 77 93.3335 73.3333 93.3335C72.1 93.3335 71 92.9668 70 92.4002V126.667C70 130.333 73 133.333 76.6667 133.333H130C133.667 133.333 136.667 130.333 136.667 126.667V86.6668C136.667 83.0002 133.667 80.0002 130 80.0002ZM103.333 123.333C94.1333 123.333 86.6667 115.867 86.6667 106.667C86.6667 97.4668 94.1333 90.0002 103.333 90.0002C112.533 90.0002 120 97.4668 120 106.667C120 115.867 112.533 123.333 103.333 123.333Z" fill="#5A5A5A"/>
            </svg>
            <?php
            // Get current user id
            $user_id = get_current_user_id();
            // Get attachment id
            $attachment_id = get_user_meta( $user_id, 'image', true );
            // True
                // Display Image instead of URL
            ?>
            <div class="user_acc_image"><?php echo wp_get_attachment_image( $attachment_id, 'full'); ?></div>
            <img class="image_uload_file">
        </div>
        <?php if ( wp_get_attachment_url( $attachment_id ) ) {
            ?>
            <div class="edit-account-upload-buttons">
                <a href="#" class="edit-account-upload-buttons-change">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0001 19.9999H5.00005C4.73484 19.9999 4.48048 20.1052 4.29295 20.2928C4.10541 20.4803 4.00005 20.7346 4.00005 20.9999C4.00005 21.2651 4.10541 21.5194 4.29295 21.707C4.48048 21.8945 4.73484 21.9999 5.00005 21.9999H19.0001C19.2653 21.9999 19.5196 21.8945 19.7072 21.707C19.8947 21.5194 20.0001 21.2651 20.0001 20.9999C20.0001 20.7346 19.8947 20.4803 19.7072 20.2928C19.5196 20.1052 19.2653 19.9999 19.0001 19.9999ZM5.00005 17.9999H5.09005L9.26005 17.6199C9.71685 17.5744 10.1441 17.3731 10.4701 17.0499L19.4701 8.04986C19.8194 7.68083 20.0082 7.18837 19.995 6.68039C19.9819 6.17242 19.768 5.69037 19.4001 5.33986L16.6601 2.59986C16.3024 2.26395 15.8338 2.07122 15.3434 2.05831C14.8529 2.0454 14.3748 2.21323 14.0001 2.52986L5.00005 11.5299C4.67682 11.8558 4.47556 12.2831 4.43005 12.7399L4.00005 16.9099C3.98658 17.0563 4.00559 17.204 4.05571 17.3422C4.10584 17.4805 4.18585 17.606 4.29005 17.7099C4.38349 17.8025 4.49431 17.8759 4.61615 17.9256C4.73798 17.9754 4.86845 18.0006 5.00005 17.9999ZM15.2701 3.99986L18.0001 6.72986L16.0001 8.67986L13.3201 5.99986L15.2701 3.99986Z" fill="#005BBB"/>
                    </svg>
                </a>
                <a href="#" class="edit-account-upload-buttons-delete">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 7.5L4.39406 20.7427C4.42314 21.0191 4.55356 21.2751 4.76017 21.4611C4.96679 21.6471 5.23496 21.75 5.51297 21.75H18.487C18.765 21.75 19.0332 21.6471 19.2398 21.4611C19.4464 21.2751 19.5769 21.0191 19.6059 20.7427L21 7.5H3ZM14.625 17.6934L12 15.0684L9.375 17.6934L8.18156 16.5L10.8066 13.875L8.18156 11.25L9.375 10.0566L12 12.6816L14.625 10.0566L15.8184 11.25L13.1934 13.875L15.8184 16.5L14.625 17.6934Z" fill="#005BBB"/>
                        <path d="M21.9375 2.25H2.0625C1.75184 2.25 1.5 2.50184 1.5 2.8125V5.4375C1.5 5.74816 1.75184 6 2.0625 6H21.9375C22.2482 6 22.5 5.74816 22.5 5.4375V2.8125C22.5 2.50184 22.2482 2.25 21.9375 2.25Z" fill="#005BBB"/>
                    </svg>
                </a>
            </div>
        <?php
        } ?>
    </p>
    <?php
}
add_action( 'woocommerce_edit_account_form_start', 'action_woocommerce_edit_account_form_start' );
// Validate
function action_woocommerce_save_account_details_errors( $args ){
    if ( isset($_POST['image']) && empty($_POST['image']) ) {
        $args->add( 'image_error', __( 'Please provide a valid image', 'woocommerce' ) );
    }
}
add_action( 'woocommerce_save_account_details_errors','action_woocommerce_save_account_details_errors', 10, 1 );
// Save
function action_woocommerce_save_account_details( $user_id ) {
    if ( isset( $_FILES['image'] ) ) {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        $attachment_id = media_handle_upload( 'image', 0 );

        if ( is_wp_error( $attachment_id ) ) {
//            update_user_meta( $user_id, 'image', $_FILES['image'] . ": " . $attachment_id->get_error_message() );
        } else {
            update_user_meta( $user_id, 'image', $attachment_id );
        }
   }
}
add_action( 'woocommerce_save_account_details', 'action_woocommerce_save_account_details', 10, 1 );
// Add enctype to form to allow image upload
function action_woocommerce_edit_account_form_tag() {
    echo 'enctype="multipart/form-data"';
} 
add_action( 'woocommerce_edit_account_form_tag', 'action_woocommerce_edit_account_form_tag' );
// Display IMAGE on dashboard navigation
function action_woocommerce_edit_account_form() {
    // Get current user id
    $user_id = get_current_user_id();
    // Get attachment id
    $attachment_id = get_user_meta( $user_id, 'image', true );

    // True
    if ( $attachment_id ) {
        $original_image_url = wp_get_attachment_url( $attachment_id );

        // Display Image instead of URL
        ?>
            <div class="user_acc_image"><?php echo wp_get_attachment_image( $attachment_id, 'full'); ?></div>
        <?php
    }
} 
add_action( 'woocommerce_before_account_custom', 'action_woocommerce_edit_account_form' );
?>
<?php
// Add custom field Company Name
add_action( 'woocommerce_edit_account_form', 'mycompany_add_account_details' );
function mycompany_add_account_details() {
	$user = wp_get_current_user();
	?>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="compan"><?php esc_html_e( 'Company Name', 'your-text-domain' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="compan" id="compan" value="<?php echo esc_attr( $user->compan ); ?>" />
	</p>
	<?php
}
// Save Company Field
add_action( 'woocommerce_save_account_details', 'mycompany_save_account_details' );
function mycompany_save_account_details( $user_id ) {
	if ( isset( $_POST['compan'] ) ) {
		update_user_meta( $user_id, 'compan', sanitize_text_field( $_POST['compan'] ) );
	}
}
// Add custom field Position
add_action( 'woocommerce_edit_account_form', 'myposition_add_account_details' );
function myposition_add_account_details() {
	$user = wp_get_current_user();
	?>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="posit"><?php esc_html_e( 'Position at Company', 'your-text-domain' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="posit" id="posit" value="<?php echo esc_attr( $user->posit ); ?>" />
	</p>
	<?php
}
// Save Company Field
add_action( 'woocommerce_save_account_details', 'myposition_save_account_details' );
function myposition_save_account_details( $user_id ) {
	if ( isset( $_POST['posit'] ) ) {
		update_user_meta( $user_id, 'posit', sanitize_text_field( $_POST['posit'] ) );
	}
}
?>
<?php
// Display Company Name and Position
function compan_info_show_extra_account_details( $user ) {
    $user = wp_get_current_user();
?>
    <div class="navigation-person-info">
        <span class="navigation-person-name"><?php echo wp_get_current_user()->first_name; ?></span>
        <span class="navigation-person-position"><?php echo esc_attr( $user->posit ); ?> at <?php echo esc_attr( $user->compan ); ?></span>
    </div>
<?php
}
add_action( 'woocommerce_before_account_custom', 'compan_info_show_extra_account_details' );
?>
<?php
// add field number
add_action( 'woocommerce_edit_account_form_second', 'mynumber_add_account_details' );
function mynumber_add_account_details() {
	$user = wp_get_current_user();
	?>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="numb"><?php esc_html_e( 'Phone number', 'your-text-domain' ); ?></label>
		<input type="number" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="+1 800 8888 888" name="numb" id="numb" value="<?php echo esc_attr( $user->numb ); ?>" />
	</p>
	<?php
}
// Save nubmer Field
add_action( 'woocommerce_save_account_details', 'mynumber_save_account_details' );
function mynumber_save_account_details( $user_id ) {
	if ( isset( $_POST['numb'] ) ) {
		update_user_meta( $user_id, 'numb', sanitize_text_field( $_POST['numb'] ) );
	}
}
?>
<?php
// add field date
add_action( 'woocommerce_edit_account_form_second', 'mydate_add_account_details' );
function mydate_add_account_details() {
    $user = wp_get_current_user();
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="birth"><?php esc_html_e( 'Date of birth', 'your-text-domain' ); ?></label>
        <input type="date" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="10.09.1986" name="birth" id="birth" value="<?php echo esc_attr( $user->birth ); ?>" />
    </p>
    <?php
}
// Save date Field
add_action( 'woocommerce_save_account_details', 'mydate_save_account_details' );
function mydate_save_account_details( $user_id ) {
    if ( isset( $_POST['birth'] ) ) {
        update_user_meta( $user_id, 'birth', sanitize_text_field( $_POST['birth'] ) );
    }
}
?>
<?php
// add field country
add_action( 'woocommerce_edit_account_form_address', 'mycountry_add_account_details' );
function mycountry_add_account_details() {
    $user = wp_get_current_user();
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="country"><?php esc_html_e( 'Country', 'your-text-domain' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="USA" name="country" id="country" value="<?php echo esc_attr( $user->country ); ?>" />
    </p>
    <?php
}
// Save country Field
add_action( 'woocommerce_save_account_details', 'mycountry_save_account_details' );
function mycountry_save_account_details( $user_id ) {
    if ( isset( $_POST['country'] ) ) {
        update_user_meta( $user_id, 'country', sanitize_text_field( $_POST['country'] ) );
    }
}
?>
<?php
// add field city
add_action( 'woocommerce_edit_account_form_address', 'mycity_add_account_details' );
function mycity_add_account_details() {
    $user = wp_get_current_user();
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="city"><?php esc_html_e( 'City', 'your-text-domain' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="New York City" name="city" id="city" value="<?php echo esc_attr( $user->city ); ?>" />
    </p>
    <?php
}
// Save city Field
add_action( 'woocommerce_save_account_details', 'mycity_save_account_details' );
function mycity_save_account_details( $user_id ) {
    if ( isset( $_POST['city'] ) ) {
        update_user_meta( $user_id, 'city', sanitize_text_field( $_POST['city'] ) );
    }
}
?>
<?php
// add field address
add_action( 'woocommerce_edit_account_form_address', 'myaddress_add_account_details' );
function myaddress_add_account_details() {
    $user = wp_get_current_user();
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="address"><?php esc_html_e( 'Address', 'your-text-domain' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="29 Volodymyr Zelenskyi st." name="address" id="address" value="<?php echo esc_attr( $user->address ); ?>" />
    </p>
    <?php
}
// Save address Field
add_action( 'woocommerce_save_account_details', 'myaddress_save_account_details' );
function myaddress_save_account_details( $user_id ) {
    if ( isset( $_POST['address'] ) ) {
        update_user_meta( $user_id, 'address', sanitize_text_field( $_POST['address'] ) );
    }
}
?>
<?php
// add field post code
add_action( 'woocommerce_edit_account_form_address', 'mypost_add_account_details' );
function mypost_add_account_details() {
    $user = wp_get_current_user();
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="post_code"><?php esc_html_e( 'ZIP code', 'your-text-domain' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="08088" name="post_code" id="post_code" value="<?php echo esc_attr( $user->post_code ); ?>" />
    </p>
    <?php
}
// Save post code Field
add_action( 'woocommerce_save_account_details', 'mypost_save_account_details' );
function mypost_save_account_details( $user_id ) {
    if ( isset( $_POST['post_code'] ) ) {
        update_user_meta( $user_id, 'post_code', sanitize_text_field( $_POST['post_code'] ) );
    }
}
?>
<?php
//Remove Product Short Description and gallery Tab
add_action( 'add_meta_boxes_product', 'custom_remove_metaboxes_edit_product', 9999 );
function custom_remove_metaboxes_edit_product() {
   remove_meta_box( 'woocommerce-product-images', 'product', 'side' );
   remove_meta_box( 'commentsdiv', 'product', 'normal' );
}
//Remove Product Linked products(upsales and crossales) Tab
add_filter('woocommerce_product_data_tabs', 'remove_tab', 10, 1);
function remove_tab($tabs){
    unset($tabs['linked_product']);
    unset($tabs['shipping']);
    return($tabs);
}
?>
<?php
//Set Subscription Variation Product Type ass Default
add_action( 'admin_footer', 'product_type_selector_filter_callback' );
function product_type_selector_filter_callback() {
    global $pagenow, $post_type;
    if( $pagenow === 'post-new.php' && $post_type === 'product' ) :
    ?>
    <script>
    jQuery(function($){
        jQuery('select#product-type').val('variable-subscription').change();
    });
    </script>
    <?php
    endif;
}
?>
<?php
// ACF CUSTOM STYLES
function my_acf_admin_head() {
    ?>
    <style type="text/css">
        .form-table{
            width: 100%;
        }
        #edittag{
            max-width: 100%;
        }
        .proposition-divider{
            padding-bottom: 0.5rem!important;
            min-height: 0!important;
            text-align: center;
        }
    </style>
    <?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');
?>
<?php
//RENAME PRODACTS NAME ADMIN
add_filter( 'woocommerce_register_post_type_product', 'rename_product' );
function rename_product( $args ){
    $labels = array(
        'name'               => __( 'Employees', 'woocommerce' ),
        'singular_name'      => __( 'Employee', 'woocommerce' ),
        'menu_name'          => _x( 'Employees', 'Admin menu name', 'woocommerce' ),
        'add_new'            => __( 'Add Employee', 'woocommerce' ),
        'add_new_item'       => __( 'Add New Employee', 'woocommerce' ),
        'edit'               => __( 'Edit', 'woocommerce' ),
        'edit_item'          => __( 'Edit Employee', 'woocommerce' ),
        'new_item'           => __( 'New Employee', 'woocommerce' ),
        'view'               => __( 'View Employee', 'woocommerce' ),
        'view_item'          => __( 'View Employee', 'woocommerce' ),
        'search_items'       => __( 'Search Employees', 'woocommerce' ),
        'not_found'          => __( 'No Employees found', 'woocommerce' ),
        'not_found_in_trash' => __( 'No Employees found in trash', 'woocommerce' ),
        'parent'             => __( 'Parent Employee', 'woocommerce' ),
        'featured_image'     => __( 'Employee Image', 'woocommerce' ),
		'set_featured_image'    => __( 'Set Employee image', 'woocommerce' ),
		'remove_featured_image' => __( 'Remove Employee image', 'woocommerce' ),
		'use_featured_image'    => __( 'Use as Employee image', 'woocommerce' )
    );
    $args['labels'] = $labels;
    $args['description'] = __( 'This is where you can add new employees to your store.', 'woocommerce' );
    return $args;
}
add_filter( 'woocommerce_taxonomy_args_product_cat', 'custom_wc_taxonomy_args_product_cat' );
function custom_wc_taxonomy_args_product_cat( $args ) {
	$args['label'] = __( 'Product Categories', 'woocommerce' );
	$args['labels'] = array(
        'name' 				=> __( 'Employees Categories', 'woocommerce' ),
        'singular_name' 	=> __( 'Employee Category', 'woocommerce' ),
        'menu_name'			=> _x( 'Categories', 'Admin menu name', 'woocommerce' ),
        'search_items' 		=> __( 'Search Employee Categories', 'woocommerce' ),
        'all_items' 		=> __( 'All Employees Categories', 'woocommerce' ),
        'parent_item' 		=> __( 'Parent Employee Category', 'woocommerce' ),
        'parent_item_colon' => __( 'Parent Employee Category:', 'woocommerce' ),
        'edit_item' 		=> __( 'Edit Employee Category', 'woocommerce' ),
        'update_item' 		=> __( 'Update Employee Category', 'woocommerce' ),
        'add_new_item' 		=> __( 'Add New Employee Category', 'woocommerce' ),
        'new_item_name' 	=> __( 'New Employee Category Name', 'woocommerce' )
	);
	return $args;
}
add_filter('gettext', 'change_product_regular_title', 100, 3 );
function change_product_regular_title( $translated_text, $text, $domain ) {
    global $pagenow;
    if ( is_admin() && 'woocommerce' === $domain && 'Edit Product' === $text  )
    {
        $translated_text =  __( 'Edit Employee', $domain );
    }
    if ( is_admin() && 'woocommerce' === $domain && 'Products' === $text  )
    {
        $translated_text =  __( 'Employees', $domain );
    }
    if ( is_admin() && 'woocommerce' === $domain && 'Product categories' === $text  )
    {
        $translated_text =  __( 'Employees categories', $domain );
    }
    if ( is_admin() && 'woocommerce' === $domain && 'Product tags' === $text  )
    {
        $translated_text =  __( 'Employees tags', $domain );
    }
    return $translated_text;
}
add_filter( 'woocommerce_taxonomy_args_product_tag', 'custom_wc_taxonomy_args_product_tag' );
function custom_wc_taxonomy_args_product_tag( $args ) {
	$args['label'] = __( 'Product Tags', 'woocommerce' );
	$args['labels'] = array(
	    'name' 				=> __( 'Employee Tags', 'woocommerce' ),
	    'singular_name' 	=> __( 'Employee Tag', 'woocommerce' ),
        'menu_name'			=> _x( 'Tags', 'Admin menu name', 'woocommerce' ),
	    'search_items' 		=> __( 'Search Employees Tags', 'woocommerce' ),
	    'all_items' 		=> __( 'All Employee Tags', 'woocommerce' ),
	    'parent_item' 		=> __( 'Parent Employee Tag', 'woocommerce' ),
	    'parent_item_colon' => __( 'Parent Employee Tag:', 'woocommerce' ),
	    'edit_item' 		=> __( 'Edit Employee Tag', 'woocommerce' ),
	    'update_item' 		=> __( 'Update Employee Tag', 'woocommerce' ),
	    'add_new_item' 		=> __( 'Add New Employee Tag', 'woocommerce' ),
	    'new_item_name' 	=> __( 'New Employee Tag Name', 'woocommerce' )
	);
	return $args;
}
// create new items my account
function iconic_account_menu_items( $items ) {
    $items['tariffs'] = __( 'Tariffs', 'iconic' );
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'iconic_account_menu_items', 10, 1 );
/**
 * Add endpoint
 */
function iconic_add_my_account_endpoint() {
    add_rewrite_endpoint( 'tariffs', EP_PAGES );
}
add_action( 'init', 'iconic_add_my_account_endpoint' );
/**
 * Information content
 */
function iconic_information_endpoint_content() {
    get_template_part('page-tariffs');
}
add_action( 'woocommerce_account_tariffs_endpoint', 'iconic_information_endpoint_content' );
// support page
function support_account_menu_items( $items ) {
    $items['support'] = __( 'Support', 'iconic' );
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'support_account_menu_items', 10, 1 );
/**
 * Add endpoint
 */
function support_add_my_account_endpoint() {
    add_rewrite_endpoint( 'support', EP_PAGES );
}
add_action( 'init', 'support_add_my_account_endpoint' );
/**
 * Information content
 */
function support_endpoint_content() {
    get_template_part('page-support');
}
add_action( 'woocommerce_account_support_endpoint', 'support_endpoint_content' );
// subscription page
function subscription_account_menu_items( $items ) {
    $items['subscription'] = __( 'Subscriptions', 'iconic' );
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'subscription_account_menu_items', 10, 1 );
/**
 * Add endpoint
 */
function subscriptions_add_my_account_endpoint() {
    add_rewrite_endpoint( 'subscription', EP_PAGES );
}
add_action( 'init', 'subscriptions_add_my_account_endpoint' );
/**
 * Information content
 */
function subscriptions_endpoint_content() {
    get_template_part('page-subscriptions');
}
add_action( 'woocommerce_account_subscription_endpoint', 'subscriptions_endpoint_content' );
// my account orders rename
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_order', 22, 1 );
function custom_my_account_menu_order( $items ) {
    $items['orders'] = __("Billing History", "woocommerce");
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_downloads', 22, 1 );
function custom_my_account_menu_downloads( $items ) {
    $items['downloads'] = __("Documents", "woocommerce");
    return $items;
}
// my account reorder
add_filter( 'woocommerce_account_menu_items', 'bbloomer_add_link_my_account' );
function bbloomer_add_link_my_account( $items ) {
    $newitems = array(
        'dashboard'       => __( 'Dashboard', 'woocommerce' ),
        'subscription'       => __( 'Subscriptions', 'woocommerce' ),
        'orders'          => __( 'Billing History', 'woocommerce' ),
        'payment-methods' => __( 'Payment methods', 'woocommerce' ),
        'downloads'       => __( 'Downloads', 'woocommerce' ),
        'tariffs'       => __( 'Tariffs', 'woocommerce' ),
        'edit-account'    => __( 'Account details', 'woocommerce' ),
        'support'    => __( 'Support', 'woocommerce' ),
        'customer-logout' => __( 'Logout', 'woocommerce' ),

    );
    return $newitems;
}
add_filter('woocommerce_save_account_details_required_fields', 'wc_save_account_details_required_fields' );
function wc_save_account_details_required_fields( $required_fields ){
    unset( $required_fields['account_display_name'] );
    return $required_fields;
}
function wooc_extra_register_fields() {
    wp_enqueue_script( 'wc-country-select' );
    woocommerce_form_field( 'billing_country', array(
        'type'      => 'country',
        'class'     => array('chzn-drop'),
        'label'     => ('Country'),
        'placeholder' => ('Choose your country.'),
        'required'  => true,
        'clear'     => true
    ));
}
add_action( 'woocommerce_custom_country', 'wooc_extra_register_fields' );

?>
<?php
// REMOVE "Choose an option" FROM VARIATION SELECT
// add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
// function filter_dropdown_option_html( $html, $args ) {
//     $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
//     $show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
//     $html = str_replace($show_option_none_html, '', $html);
//     return $html;
// }
?>
<?php
// RENAME RELATED PRODUCT ON PRODUCT PAGE
add_filter('woocommerce_product_related_products_heading',function(){
    return 'You may also be interested';
 });
?>
<?php
// hide unuseful fields for variable fields in admin panel
add_action('admin_head', 'my_custom_admin_styles');
function my_custom_admin_styles() {
  echo '<style>
  .form-field.variable_low_stock_amount0_field.form-row {
    display: none;
}
  .form-row.form-row-last.form-field.variable_backorders0_field {
    display: none;
  }
  .form-field.variable_stock0_field.form-row.form-row-first {
    width: 100%;
  }
  .form-field.variable_description0_field.form-row.form-row-full {
    display: none;
  }
  .form-row.form-row-last.show_if_variable-subscription {
    display: none !important;
  }
  .form-row.form-row-first.form-field.show_if_variable-subscription.sign-up-fee-cell {
    width: 100%;
  }
  .form-row.form-row-first.upload_image {
    display: none;
  }
  .form-field.variable_sku0_field.form-row.form-row-last {
    width: 48%;
    float: left;
  }
  .form-field._purchase_note_field {
    display: none;
  }
  </style>';
}
?>
<?php
// REMOVE WOOOMMERCE DEFAULT HOOKS
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
?>
<?php
add_filter('woocommerce_dropdown_variation_attribute_options_args','fun_select_default_option',10,1);
//Auto select first aval Variation
function fun_select_default_option( $args)
{
    if(count($args['options']) > 0)
        $args['selected'] = $args['options'][0];
    return $args;
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
//Remove Choose Option from select Variation
function filter_dropdown_option_html( $html, $args ) {
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
    $show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
    $html = str_replace($show_option_none_html, '', $html);
    return $html;
}
?>
<?php
//Remove 'Sales' from breadcrumbs on employees page
function your_prefix_wc_remove_uncategorized_from_breadcrumb( $crumbs ) {
    if ( is_product() ) {
	    $caregory_link 	= get_category_link( 74 );
	        foreach ( $crumbs as $key => $crumb ) {
		        if ( in_array( $caregory_link, $crumb ) ) {
			        unset( $crumbs[ $key ] );
		        }
	        }
	    return array_values( $crumbs );
    }
}
add_filter( 'woocommerce_get_breadcrumb', 'your_prefix_wc_remove_uncategorized_from_breadcrumb' );
?>
<?php
//Custom sorting by Date and Stock Status
add_action( 'woocommerce_product_query', 'custom_sorting_options', 999 );
function custom_sorting_options( $query ) {
    if ( is_admin() ) return;
        $query->set( 'meta_key', '_stock_status' );
        $query->set( 'orderby', array( 'meta_value' => 'ASC', 'date' => 'DESC' )  );
}
?>
<?php
// Modify Product Shortcode to add option INSTOCK (class="instock")
add_filter( 'woocommerce_shortcode_products_query', function( $query_args, $atts, $loop ){
	if($atts['class'] == 'instock') {
		$query_args['meta_query'] = array( array(
		    'key'     => '_stock_status',
		    'value'   => 'instock',
		) );
	}
    return $query_args;
}, 10, 3)
?>