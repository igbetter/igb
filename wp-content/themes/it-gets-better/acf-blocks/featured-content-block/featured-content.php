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

		//	var_dump( $video_fields );
			?>
			<h2>video</h2>
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
						<p><a href="" class="primary_button">Learn More</a></p>
					</div>
				</div>
				<div class="column_right">

				<?php
				//echo $featured_term_id;
				$is_video_hosted_here = get_field( 'featured_video', $featured_term_id, false );
				if ( $is_video_hosted_here === '0' ) :
					// youtube video
					$video_url = get_field( 'glossary_youtube_link', $featured_term_id, false);

					$videoargs = array(
						'width'		=> '700',
					);
					$youtube_embed = wp_oembed_get( esc_url( $video_url ), $videoargs );
					echo $youtube_embed;

				else :
					// self hosted video
					$video_embed = get_field( 'upload_glossary_video', $featured_term_id );

				//	var_dump( $video_embed );

					printf(
						'<video poster="%s" controls>
							<source src="%s" type="%s"/>
						</video>',
						esc_url( get_the_post_thumbnail_url(get_the_ID(),'full') ),
						esc_url( $video_embed['url'] ),
						esc_attr( $video_embed['mime_type'])
					);

				endif;
				?>

				</div>

				</div>
			</div>
		<?php endif; ?>
	</div>
</section>