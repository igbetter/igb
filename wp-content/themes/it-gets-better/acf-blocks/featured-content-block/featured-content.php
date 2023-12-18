<?php /**
 *		Featured content block template
 *
 *
 */

 $feature_type = get_field( 'type' );
 $background_color = get_field( 'background_color' );


 // Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'featured_content';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ) . ' ' . esc_attr( $feature_type ) . ' background-' . esc_html( $background_color ); ?>">
	<div class="section_content">
		<?php if ( $feature_type === 'video' ) :
			$video_fields = get_field( 'video_details' );
			$video_post_object = $video_fields[ 'video_to_feature' ];
			$video_post_id = $video_post_object[0]->ID;
			$video = get_post( $video_post_id );

			$is_video_hosted_here = get_field( 'video_file_location', $video_post_id, false );
			?><br />
			<h6 class="subhead">Featured Video</h6>
			<div class="video_wrapper">
			<?php echo igb_display_video_embed( $video_post_id ) ?>
			</div>
			<a href="<?php echo get_the_permalink( $video_post_id ); ?>" class="featured_video_title"><?php echo esc_html( $video->post_title ); ?></a>
			<?php echo igb_display_related_glossary_term_tags( $video_post_id, 'video', true ); ?>
			<?php if ( $video_fields[ 'display_additional_videos' ] === true ) : ?>
				<div class="related_videos">
					<h6>More Videos</h6>
					<div class="related_videos_container flex-row">
						<?php if ( $video_fields[ 'additional_video_selection' ] === 'auto' ) :
							$videotags = wp_get_post_terms( $video_post_id, 'post_tag', ['fields' => 'ids'] );
							$args = [
								'post__not_in'        => array( $video_post_id ),
								'posts_per_page'      => 4,
								'ignore_sticky_posts' => 1,
								'orderby'             => 'rand',
								'tax_query' => [
									[
										'taxonomy' => 'post_tag',
										'terms'    => $videotags
									]
								]
							];
							$more_videos_query = new wp_query( $args );
							if( $more_videos_query->have_posts() ) :
								while( $more_videos_query->have_posts() ) :
									$more_videos_query->the_post();
									$videoID = get_the_ID();?>
									<div class="related_video small">
										<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( array( 400, 90 ), true ); ?>
										<?php the_title(); ?>
										</a>
									</div>
								<?php endwhile;
							endif;

						else :
							// TODO: this.
						endif;
						?>
					 </div>
				</div>
			<?php endif; ?>
		<?php elseif ( $feature_type === 'playlist' ):
			$playlist_fields = get_field( 'playlist_details' );
			$playlist_id = $playlist_fields['playlist_to_feature'];
			$featured_playlist = get_term_by( 'id', $playlist_id , 'playlist');
			$featured_playlist_id = $featured_playlist->term_id;
			$playlist_id_formatted = 'playlist_' . $featured_playlist_id;
			$featured_image = get_field( 'header_image', $playlist_id_formatted );

			$featured_image_url = $featured_image['url'];

			if( $playlist_fields['featured_image_override'] === true ) {
				$featured_image_url = $playlist_fields['new_featured_image'];
			} ?>
			<div class="two_column">
				<div class="column_left">
					<h6 class="subhead">Featured Playlist</h6>
					<h2><?php echo esc_html( $featured_playlist->name ); ?></h2>
					<div class="excerpt">
						<?php
						$playlist_fields[ 'playlist_description_override' ]=== true ? $playlist_description = $playlist_fields['new_playlist_description']  :  $playlist_description = $featured_playlist->description ;
						echo wp_kses_post( $playlist_description ); ?>
						<p><a href="<?php echo esc_url( get_term_link( (int) $playlist_id, 'playlist' ) );?>" class="primary_button">View Playlist</a></p>
					</div>
				</div>
				<div class="column_right">
					<figure class="masked_image_container_double"><img src="<?php echo esc_url( $featured_image_url ); ?>"></figure>
					<svg height="0" width="0" class="svg-clip">
						<defs>
							<clipPath id="image_mask_double_slash" clipPathUnits="objectBoundingBox">

								<polygon fill="none"
								points=" 	.25,	.1
											.65,	.1
											.4,		1
											0,		1 "/>
								<polygon fill="none"
								points=" 	.75,	0
											1.15,	0
											.9,	.90
											.5,	.90 "/>
							</clipPath>
						</defs>
					</svg>
				</div>
			</div>
		<?php elseif ( $feature_type === 'blog' ) :
			$blog_fields = get_field( 'blog_details' );

			if( $blog_fields['blog_post_selection'] === false ) :
				// auto select
				$autoargs = array(
					'posts_per_page'	=> 1,
					'orderby'			=> 'date',
					'order'				=> 'DESC',
					'meta_query'		=> [
						[
							'key' 			=> 'featured_blog_post',
							'value'			=> 1
						]
					]
				);
				$postquery = new WP_Query( $autoargs );

			else :
				// manual selection
				$selected_blog = $blog_fields['select_blog'];
				$selected_blog_id = $selected_blog[0]->ID;

				$manualargs = array(
					'p'				=> $selected_blog_id,
					'post_type'		=> 'post',
				);
				$postquery = new WP_Query( $manualargs );
			endif;
			?>
			<div class="featured_blog_container">
				<h6 class="subhead">Featured Blog</h6>
				<?php
				if ( $postquery->have_posts() ) :
					while ( $postquery->have_posts() ) :
						$postquery->the_post();
						echo '<a href="' . get_the_permalink() . '">';
						the_post_thumbnail(); ?>
						<div class="blog_overlay">
							<?php the_title( '<h2>', '</h2>'); ?>
							<div class="excerpt">
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="primary_button">View Blog</a>
							</div>
						</div>
					</a>
					<?php endwhile;
				endif;
				?>
			 </div>
		<?php elseif ( $feature_type === 'term' ) :
			$glossary_term_fields = get_field( 'glossary_term_details' );

			$feature_label = $glossary_term_fields[ 'feature_label' ];
			$featured_term_object = $glossary_term_fields[ 'choose_term' ];

			$featured_term_id = $featured_term_object[0]->ID; ?>
			<div class="two_column">
				<div class="column_left">
					<h6 class="subhead"><?php echo $feature_label != '' ? esc_html( $feature_label ) : 'Featured Term'; ?></h6>
					<h2><?php esc_html_e( $featured_term_object[0]->post_title ); ?></h2>
					<div class="excerpt">
						<?php echo wp_kses_post( $featured_term_object[0]->post_excerpt ) ?>
						<p><a href="<?php the_permalink( $featured_term_id ); ?>" class="primary_button">Learn More</a></p>
					</div>
				</div>
				<div class="column_right">
					<?php echo igb_display_video_embed( $featured_term_id,  'upload_glossary_video', 'glossary_youtube_link' ) ?>

				</div>

				</div>
				<?php if ( $glossary_term_fields[ 'display_related_content' ] === true ) : ?>
				<div class="related_content splide">
					<?php

					$relatedglossaryargs = array(
						'post_type'		=> 'any',
						'posts_per_page' => 8,
						'orderby'		=> 'date',
						'order'			=> 'desc',
						'meta_query' => array(
							array(
								'value' => sprintf(':"%s";', $featured_term_id),
								'compare' => 'LIKE'
							)
						),
					);
					$related_content_query = new WP_Query( $relatedglossaryargs );
					?>
					<h6>Related Content</h6>
					<div class="related-content-slider more_content_slider splide__track">

						<ul class="horizontal_slider splide__list">
							<?php
							if( $related_content_query->have_posts() ) :
								while( $related_content_query->have_posts() ) :
									$related_content_query->the_post();
									$featured_image_url = get_the_post_thumbnail_url( 'large' );
									printf(
										'
										<li class="slide splide__slide">
											<a href="%s">
												%s
												%s
											</a>
										</li>
										',
										get_the_permalink(),
										get_the_post_thumbnail( get_the_ID(), array( 400, 175 ) ),
										get_the_title()
									);
								endwhile;
							endif;
							?>
						</ul>
					</div>
				</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>