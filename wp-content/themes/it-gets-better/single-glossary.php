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
						) );
						?>

				</div>
				<header class="glossary_term_header">
					<div class="two_column container">
						<div class="col_one">
							<span class="header_post_type_icon smaller content_type glossary term">
								<svg class="icon-content_type">
									<use xlink:href="#CONTENT_TYPE_term"></use>
								</svg>
								<h6>Glossary Term</h6>
							</span>
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
			igb_display_related_content( get_the_ID(), 'videos', 'Related Videos', 5 );
			igb_display_related_content( get_the_ID(), 'posts', 'Related Blog Posts', 5 );
			igb_display_related_content( get_the_ID(), 'eduguide', 'Related EduGuides', 5 );
			igb_display_related_content( get_the_ID(), 'playlists', 'Related Playlists', 5 );
			?>




		</aside>
		<div class="next_previous_glossary bottom">
			<?php the_post_navigation(
				array(
					'prev_text'  => __( '&laquo; Previous: <em>%title</em>' ),
					'next_text'  => __( 'Next: <em>%title</em> &raquo;' ),
					) ); ?>
			<a href="/glossary/" class="glossary_back_link">Back to the Glossary</a>
		</div>
	</section><!-- #primary -->

<?php
get_footer();
