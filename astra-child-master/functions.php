<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra-child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'ASTRA_CHILD_THEME_VERSION', '1.0.1' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), ASTRA_CHILD_THEME_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

	
add_filter( 'auto_update_plugin', '__return_false' );

/* added on 28 Oct */
function filter_plugin_updates( $value ) {
    unset( $value->response['woocommerce-all-products-for-subscriptions/woocommerce-all-products-for-subscriptions.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

/* 03 Nov */
add_filter( 'woocommerce_product_tabs', 'custom_remove_description_tab', 11 );
 
function custom_remove_description_tab( $tabs ) {
  unset( $tabs['description'] );
	unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}
/* added on 26 dec 2022 */

/* calculate Subscription plan discounts based on the Regular product/variation price*/
add_filter( 'wcsatt_discount_from_regular', '__return_true' );

// Change add to cart text on product archives page
//add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' ); 
//add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' ); 
function woocommerce_add_to_cart_button_text_archives() {
	global $product;
	$product = wc_get_product();
	if( $product->is_type( 'variable' )) {
        return __( 'Select Option', 'woocommerce' );
    }
	else{
		return __( 'Add To Cart', 'woocommerce' );
	}   
}