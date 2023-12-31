<?php
/**
 * The template for displaying all single video pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package It_Gets_Better
 */

get_header();
?>

	<section id="primary" class="single_video_page">
		<header class="post_header">
			<span class="header_post_type_icon content_type video">
				<svg class="icon-content_type">
					<use xlink:href="#CONTENT_TYPE_video"></use>
				</svg>
				<h6>Video</h6>
			</span>

			<?php the_title( '<h2 class="video_title">', '</h2>'); ?>
		</header>
		<main id="main">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				echo igb_display_video_embed( get_the_ID(),  'upload_video', 'youtube_link' );



				if( the_field( 'featured_description' ) ) :
					echo '<div class="video_description_container">' . wp_kses_post( get_field( 'featured_description' ) ) . '</div>';
				endif;

				$related_eduguides = get_field( 'video_related_eduguide' );
				$related_playlist = get_the_terms( get_the_ID(), 'playlist' );

				//var_dump( $related_playlist );

				if( $related_playlist ) :
					echo '<div class="related_playlist_container"><h6>Watch The Entire Playlist:</h6>';
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

				if( $related_eduguides ) :
					get_template_part('template-parts/loop/card', 'eduguide');
				endif; // end if there are related eduguide(s)

				// End the loop.
			endwhile;
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
