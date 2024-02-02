<?php
/**
 * The template for displaying tag results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package It_Gets_Better
 */

get_header();

$playlist = get_queried_object();



$header_image = get_field( 'header_image', $playlist );
$subheading = get_field( 'sub_heading', $playlist );
$description = term_description();
$partnership_byline = get_field( 'partnership_byline', $playlist );
$trailer = get_field( 'trailer', $playlist );
$main_color = get_field( 'main_color', $playlist );
$custom_css = get_field( 'custom_css', $playlist );

$color_class = '';
if( $main_color ) {
	$color_class = 'overlay-' . esc_attr( $main_color['label']);
}
?>
<div class="next_previous_playlist top">
	<a href="/playlists/" class="playlist_back_link">View all Playlists</a>
	<?php
	/* the_post_navigation(
	array(
		'prev_text'  => __( '&laquo; Previous: <em>%title</em>' ),
		'next_text'  => __( 'Next: <em>%title</em> &raquo;' ),
		'taxonomy'	=> 'playlist',
		) ); */
		?>

</div>

<section id="primary" class="playlist_detail_page" style=" <?php echo $custom_css; ?>">
	<header class="playlist_header">
		<div class="playlist_header_image"
			<?php echo ( !empty( $header_image ) ) ? ' style="background-image: url(' . esc_url( $header_image['url'] ) . ');"' : ''; ?>
		>
		<div class="playlist_header_text">
			<span class="header_post_type_icon smaller content_type playlist">
				<svg class="icon-content_type">
					<use xlink:href="#CONTENT_TYPE_playlist"></use>
				</svg>

			</span>
			<h6 class="playlist_tag">Playlist:</h6>
			<h1><?php echo wp_kses_post( $playlist->name ); ?></h1>
			<?php if( $subheading ) { echo '<h3 class="subhead">' . esc_html( $subheading ) . '</h3>'; } ?>

		</div>

		</div>
	</header>
	<main id="main">
		<div class="playlist_details_row flex-row">
			<div class="playlist_description">
				<p>
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>

			<div class="partnership">
				<?php
				echo wp_kses_post( $partnership_byline );

				if( have_rows( 'partner_logos', $playlist ) ) :
					while( have_rows( 'partner_logos', $playlist ) ) :
						the_row();
						$image = get_sub_field( 'upload_logo', $playlist );
						echo '<img src="' . esc_url( $image[ 'url' ] ) . '" alt="' . esc_attr( $image[ 'alt' ] ) . '" class="partner_logo" />';
					endwhile;
				endif;
				?>

			</div>
		</div>
		<?php if( $trailer ) : ?>
			<div class="series_trailer <?php esc_html_e( $color_class ); ?>">
				<h4>Trailer:</h4>
				<div class="video_container">
					<?php the_field( 'trailer', $playlist ); ?>
				</div>

			</div>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
	  <section class="episode_list_container">
			<?php
				while ( have_posts() ) :
					the_post();
					get_template_part('template-parts/loop/card', 'playlist_episode');
				endwhile;
				wp_reset_postdata();

			?>

		<?php
			else:
				//
			endif;
		?>
      </section>
		</main><!-- #main -->
		<aside id="supplementary" class="additional_content related_content_container">
			<h3 class="aside_heading">Dig Deeper...</h3>
			<?php
			$playlist_id = get_queried_object()->term_id;
			$playlist_id_formatted = 'playlist_' . $playlist_id; // for acf fields


			// grab all the videos in this playlist...
			$playlist_video = get_field( 'playlist_video', $playlist_id_formatted );

			if( $playlist_video ) {
				// then lets grab all the associated glossary terms for each of them into a nice little array
				$all_glossary_term_ids = [];
				foreach( $playlist_video as $video ) {
					$videos_glossary_terms = get_field( 'video_related_glossary_terms', $video->ID, false );
					foreach( $videos_glossary_terms as $single_term ) {
						$all_glossary_term_ids[] = $single_term;
					}
				}
				// remove the duplicates
				$glossary_terms_duplicates_removed = array_unique( $all_glossary_term_ids );

				// and start our query
				$args = array(
					'post_type'		=> 'glossary',
					'orderby'		=> 'rand',
					'post__in'		=>  $glossary_terms_duplicates_removed,
				);

				$related_glossary_terms_query = new WP_Query( $args );
				if( $related_glossary_terms_query->have_posts() ) : ?>
					<section class="related_content_container glossary_terms related">
						<header class="section_header">
							<h6>Related Glossary Terms</h6>
						</header>
					</section>
					<div class="content_grid_container glossary">
					<?php while( $related_glossary_terms_query->have_posts() ) :
						$related_glossary_terms_query->the_post();

						get_template_part( 'template-parts/loop/grid' );

					endwhile;
					echo '</div>';
				endif;
				wp_reset_postdata();
			}

			igb_display_latest_blog_posts( 7, 'Latest Blog Posts' );
			?>


		</aside>
		<div class="next_previous_playlist bottom">
	<a href="/playlists/" class="playlist_back_link">View All Playlists</a>
		<?php
		/* the_post_navigation(
		array(
			'prev_text'  => __( '&laquo; Previous: <em>%title</em>' ),
			'next_text'  => __( 'Next: <em>%title</em> &raquo;' ),
			'taxonomy'	=> 'playlist',
			) ); */
			?>

	</div>
	</section><!-- #primary -->
<?php
get_footer();
