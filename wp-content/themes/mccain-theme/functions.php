<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Social Settings'),
            'menu_title'  => __('Social'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}

/**
 * @snippet       Display Cart @ Checkout Page Only - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_before_checkout_form', 'bbloomer_cart_on_checkout_page_only', 5 );
 
function bbloomer_cart_on_checkout_page_only() {
 
if ( is_wc_endpoint_url( 'order-received' ) ) return;
 
echo do_shortcode('[woocommerce_cart]');
 
}

/**
 * @snippet       Add one item when to cart - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Ivi Hysenbelli
 * @compatible    WooCommerce 3.5.7
 */
add_action( 'template_redirect', 'add_product_to_cart' );
function add_product_to_cart() {

    if ( ! is_admin() && is_page(71) ) {
        $product_id = 34;
        $found = false;
        //check if product already in cart
        if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
            foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
                $_product = $values['data'];
                if ( $_product->id == $product_id ) {
                    $found = true;
                }
            }
            // if product not found, add it
            if ( ! $found ){
                WC()->cart->add_to_cart( $product_id );
            }
        } else {
            // if no products in cart, add it
            WC()->cart->add_to_cart( $product_id );
        }

        // Redirect users to checkout after add to cart
        wp_redirect( wc_get_checkout_url() );
        exit;
    }
}

