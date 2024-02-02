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
				get_template_part( 'template-parts/singular/eduguide' );


				$related_playlist = get_the_terms( get_the_ID(), 'playlist' );

				if( $related_playlist ) :
					echo '<div class="related_playlist_container"><h6>Watch This Playlist:</h6>';
					foreach( $related_playlist as $playlist ) :

					$playlist_id = $playlist->term_id;
						get_template_part(
							'template-parts/loop/list',
							'playlist',
							array(
								'playlist_id'	=> $playlist_id
							)
						);
					endforeach;
					echo '</div>';
				endif; // end if there is a related playlist to this video

				// End the loop.
			endwhile;
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
