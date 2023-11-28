<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

?>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		the_content();
		wp_link_pages(
			array('before' => '<div>' . __( 'Pages:', 'it-gets-better' ),	'after'  => '</div>')
		);
	?>
</main><!-- #post-<?php the_ID(); ?> -->
