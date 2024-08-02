<?php
/**
 * Helpers for seo functionality
 *
 * @package It_Gets_Better
 */

/**
 * Add "og:image" meta tag to head for "playlist" taxonomy.
 *
 * @return void
 */
function igb_seo_og_image() {
	if ( is_tax( 'playlist' ) ) {
		$term  = get_queried_object();
		$image = get_field( 'header_image', $term );
		if ( isset( $image ) ) {
			echo '<meta property="og:image" content="' . esc_url( $image['url'] ) . '">';
		}
	}
}
add_action( 'wp_head', 'igb_seo_og_image' );
