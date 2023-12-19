<?php
/**
 * 	Template part for singular page display
 *  DEFAULT view
 *
 *
 */


?>

<main id="post-<?php the_ID(); ?>" <?php post_class( 'singular_page' ); ?>>
	<?php
		the_content();
		wp_link_pages(
			array('before' => '<div>' . __( 'Pages:', 'it-gets-better' ),	'after'  => '</div>')
		);
	?>
</main>