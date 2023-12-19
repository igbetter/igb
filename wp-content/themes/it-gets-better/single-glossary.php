<?php
/**
 * The template for displaying all single term pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package It_Gets_Better
 */

get_header();

 $color = get_field( 'border_color' );
 $color_label = ( is_array( $color ) ? $color['label'] : $color );
?>

	<section id="primary">
		<main id="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>
				<div class="next_previous_glossary top">
					<a href="/glossary/" class="glossary_back_link">Back to the Glossary</a>
					<?php the_post_navigation(
					array(
						'prev_text'  => __( '&laquo; Previous: <em>%title</em>' ),
						'next_text'  => __( 'Next: <em>%title</em> &raquo;' ),
						) ); ?>

				</div>
				<header class="glossary_term_header">
					<div class="two_column container">
						<div class="col_one">
							<h1 class="underline-<?php esc_html_e( $color_label ); ?>"><?php the_title(); ?></h1>
							<div class="definition">
								<div class="flex-row">

									<div class="phonetic">
										<?php
										if ( get_field( 'phonetic_spelling' ) ) :
											echo '<span class="pronunciation">[' . esc_html(  get_field( 'phonetic_spelling' ) ) . ']</span>';
										endif;
										?>
									</div>
									<div class="category">
										<?php echo igb_display_glossary_term_category( get_the_ID(), true, 'full' ); ?>
									</div>

								</div>


								<p>
								<?php
									$pos = get_field( 'part_of_speech' );
									if ( $pos ) :
										$pos = is_array( $pos ) ? implode( "; ", $pos ) : $pos;
										echo '<span class="part_of_speech">' . esc_html( $pos ) . '. </span> ';
								endif;
								?>
									<?php the_excerpt(); ?>
								</p>
							</div>
						</div>
						<div class="col_two">
							<?php echo igb_display_video_embed( get_the_ID(), 'glossary_upload_file', 'glossary_youtube_link' ); ?>
						</div>
					</div>

				</header>
				<article id="single_glossary_term-ID-<?php echo esc_html( $post->ID ); ?>" class="extended_definition">
					<?php
					$extended_content = get_field( 'extended_definition' );
					if ( $extended_content ) :
						the_field( 'extended_definition' );
					else :
						the_content();
					endif;
					 ?>
				</article>

			<div class="next_previous_glossary bottom">
				<?php the_post_navigation(
					array(
						'prev_text'  => __( '&laquo; Previous: <em>%title</em>' ),
						'next_text'  => __( 'Next: <em>%title</em> &raquo;' ),
						) ); ?>
				<a href="/glossary/" class="glossary_back_link">Back to the Glossary</a>
			</div>
			<svg class="full_width svg_divider">
				<use xlink:href="#line_divider_option_01" />
			</svg>
			<?php endwhile;
			?>

		</main><!-- #main -->
		<aside id="supplementary" class="additional_content related_content_container">
			<h3 class="aside_heading underline-<?php esc_html_e( $color_label ); ?>">More <?php the_title( '<span>', '</span>' ); ?> Related Content</h3>
			<?php
			$related_videos = get_field( 'glossary_term_related_videos' ); // returns post object
			$related_posts = get_field( 'glossary_term_related_posts' ); // returns post object
			$related_playlists = get_field( 'glossary_term_related_playlists' ); // returns array of term id(s)
			$related_eduguides = get_field( 'glossary_term_related_eduguide' ); // returns post object

			$max_display = 7;

			////////////////////// related videos ////////////////
			if( $related_videos ) :
				$count = count( $related_videos );
				$id_array = [];
				$i = 0;
				foreach( $related_videos as $related_video ) :
					$id_array[] = $related_video->ID;
					if (++$i == $max_display ) break;
				endforeach; ?>

				<section class="related_videos_container related">
					<header class="section_header flex-row">
						<h6>Videos <span class="count">(<?php echo esc_attr( $count ); ?>)</span></h6>
					</header>
				</section>

			<?php
				$args = array(
					'post_type'		=> 'any',
					'post__in'		=>  $id_array,
				);
				$more_content_query = new WP_Query( $args );
				if( $more_content_query->have_posts() ) :
					echo '<div class="content_grid_container">';
					while( $more_content_query->have_posts() ) :
						$more_content_query->the_post();
						get_template_part( 'template-parts/loop/grid' );
					endwhile;
					echo '</div>';
				endif; // end loop
			endif; // end if videos

			////////////////////// related posts ////////////////
			if( $related_posts ) :
				$count = count( $related_posts );
				$id_array = [];
				$i = 0;
				foreach( $related_posts as $related_post ) :
					$id_array[] = $related_post->ID;
					if (++$i == $max_display ) break;
				endforeach; ?>

				<section class="related_videos_container related">
					<header class="section_header flex-row">
						<h6>Blog Posts <span class="count">(<?php echo esc_attr( $count ); ?>)</span></h6>
					</header>
				</section>

			<?php
				$args = array(
					'post_type'		=> 'any',
					'post__in'		=>  $id_array,
				);
				$more_content_query = new WP_Query( $args );
				if( $more_content_query->have_posts() ) :
					echo '<div class="content_grid_container">';
					while( $more_content_query->have_posts() ) :
						$more_content_query->the_post();
						get_template_part( 'template-parts/loop/grid' );
					endwhile;
					echo '</div>';
				endif; // end loop
			endif; // end if blog posts

			////////////////////// related eduguides ////////////////
			if( $related_eduguides ) :
				$count = count( $related_eduguides );
				$id_array = [];
				$i = 0;
				foreach( $related_eduguides as $related_eduguide ) :
					$id_array[] = $related_eduguide->ID;
					if (++$i == $max_display ) break;
				endforeach; ?>

				<section class="related_videos_container related">
					<header class="section_header flex-row">
						<h6>EduGuides <span class="count">(<?php echo esc_attr( $count ); ?>)</span></h6>
					</header>
				</section>

			<?php
				$args = array(
					'post_type'		=> 'any',
					'post__in'		=>  $id_array,
				);
				$more_content_query = new WP_Query( $args );
				if( $more_content_query->have_posts() ) :
					echo '<div class="content_grid_container">';
					while( $more_content_query->have_posts() ) :
						$more_content_query->the_post();
						get_template_part( 'template-parts/loop/grid' );
					endwhile;
					echo '</div>';
				endif; // end loop
			endif; // end if eduguides

			////////////////////// related playlists ////////////////
			if( $related_playlists ) :
				$count = count( $related_playlists );
			//	$id_array = [];
				/* $i = 0;
				foreach( $related_playlists as $related_playlist ) :
					$id_array[] = $related_playlists->ID;
					if (++$i == $max_display ) break;
				endforeach; */ ?>

				<section class="related_videos_container related">
					<header class="section_header flex-row">
						<h6>Playlists <span class="count">(<?php echo esc_attr( $count ); ?>)</span></h6>
					</header>
				</section>

			<?php
				$args = array(
					'post_type'		=> 'any',
					'post__in'		=>  $related_playlists,
				);
				$more_content_query = new WP_Query( $args );
				if( $more_content_query->have_posts() ) :
					echo '<div class="content_grid_container">';
					while( $more_content_query->have_posts() ) :
						$more_content_query->the_post();
						get_template_part( 'template-parts/loop/grid' );
					endwhile;
					echo '</div>';
				endif; // end loop
			endif; // end if playlists
			?>


		</aside>
	</section><!-- #primary -->

<?php
get_footer();
