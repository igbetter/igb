<?php
/**
 * The template for displaying all single term pages
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
				the_post(); ?>

				<header class="glossary_term_header">
					<div class="two_column container">
						<div class="col_one">
							<h1><?php the_title(); ?></h1>
							<div class="definition">
								<p><?php the_field( 'definition' ); ?></p>
							</div>
						</div>
						<div class="col_two">
							<?php echo igb_display_video_embed( get_the_ID(), 'glossary_upload_file', 'glossary_youtube_link' ); ?>
						</div>
					</div>

				</header>
				<article id="single_glossary_term-ID-<?php echo esc_html( $post->ID ); ?>">
					<?php the_content(); ?>
				</article>

			<?php	//get_template_part( 'template-parts/content/content', 'glossary' );
	// End the loop.
			endwhile;
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
