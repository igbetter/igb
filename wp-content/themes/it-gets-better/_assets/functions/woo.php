<?php
/**
 *
 * functions for modifying woo functionality
 *
 */

add_filter( 'woocommerce_single_product_image_thumbnail_html', 'igb_remove_product_link' );

function igb_remove_product_link( $html ) {
	return strip_tags( $html, '<div><img>' );
}

/**
 * Change the "Add to Cart" button text for out of stock products.
 *
 * @param string $text Original text.
 * @param WC_Product $product Product object.
 *
 * @return string
 */
function igb_out_of_stock_button_text( $text, $product ) {
	if ( ! $product->is_in_stock() ) {
		return esc_html__( 'Sold Out', 'it-gets-better' );
	}

	return $text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'igb_out_of_stock_button_text', 10, 2 );
