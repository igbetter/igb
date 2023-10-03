<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package It_Gets_Better
 */

get_header();
?>

	<section id="primary">
		<main id="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					// the_post_navigation(
					// 	array(
					// 		'next_text' => '<span aria-hidden="true">' . __( 'Next Post', 'it-gets-better' ) . '</span> ' .
					// 			'<span class="sr-only">' . __( 'Next post:', 'it-gets-better' ) . '</span> <br/>' .
					// 			'<span>%title</span>',
					// 		'prev_text' => '<span aria-hidden="true">' . __( 'Previous Post', 'it-gets-better' ) . '</span> ' .
					// 			'<span class="sr-only">' . __( 'Previous post:', 'it-gets-better' ) . '</span> <br/>' .
					// 			'<span>%title</span>',
					// 	)
					// );
				}

				// End the loop.
			endwhile;
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
