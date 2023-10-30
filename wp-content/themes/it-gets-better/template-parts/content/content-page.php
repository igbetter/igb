<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content prose">
		<?php
			the_content();
			wp_link_pages(
				array('before' => '<div>' . __( 'Pages:', 'it-gets-better' ),	'after'  => '</div>')
			);
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
