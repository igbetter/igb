<?php
/**
 * The template for landing pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

				get_template_part( 'template-parts/singular/page' );

				endwhile; // End of the loop.
			?>
			<div class="playlist_archive_container">

			<?php
			$playlists_to_exclude = get_terms(
				array(
					'fields'	=> 'ids',
					'slug'		=> array(
						'none',
						'general',
						// any other playlists to ignore go here
					),
					'taxonomy'	=> 'playlist'
				)
			);
			$playlistargs = array(
				'taxonomy' 		=> 'playlist',
				'hide_empty'	=> true,
				'exclude'		=> $playlists_to_exclude,
			);
			$playlist_query = get_terms( $playlistargs );


			foreach( $playlist_query as $playlist ) :

			$playlist_id = $playlist->term_id;
				get_template_part(
					'template-parts/loop/list',
					'playlist',
					array(
						'playlist_id'	=> $playlist_id
					)
				);
			endforeach;
			?>

			</div>
		</main><!-- #main -->

		<aside id="supplementary" class="additional_content related_content_container">
			<?php igb_display_latest_blog_posts( 6, 'Latest Blog Posts' ) ?>
		</aside>
	</section><!-- #primary -->

<?php
get_footer();
