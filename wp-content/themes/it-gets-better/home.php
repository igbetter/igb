<?php
/**
 * The template for displaying all pages
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
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<section class="section_hero image_right">
						<div class="hero_text-container">
							<h1>Empowering LGBTQ+ youth to define their own journey.</h1>
							<p>Search for...</p>
							<p>(and the search box will go here)</p>
						</div>
						<div class="hero_image-container">
							<svg class="feature_frame" preserveAspectRatio="xMaxYMid meet" viewBox="0 0 100 115">
								<use xlink:href="#igb_frame_option_01"></use>
							</svg>
							<img src="<?php echo get_template_directory_uri(); ?>/_assets/images/home-hero-placeholder.png" />
						</div>

					</section>

					<section class="featured_video_and_popular_terms two_column full_width background-subtle_grey">
						<div class="featured_video">
							<?php get_template_part('template-parts/content/homepage/featured-video'); ?>
						</div>
						<div class="popular_terms">
							<?php get_template_part('template-parts/content/homepage/popular-browse-terms'); ?>
						</div>
					</section>

					<?php // get_template_part('template-parts/content/homepage/more-featured-videos'); ?>
					<?php  get_template_part('template-parts/content/homepage/featured-playlist'); ?>
					<?php  get_template_part('template-parts/content/homepage/curated-playlist'); ?>
					<?php  get_template_part('template-parts/content/homepage/svg-divider-orange'); ?>
					<?php  get_template_part('template-parts/content/homepage/term-of-the-day'); ?>
					<?php  get_template_part('template-parts/content/homepage/featured-program'); ?>
					<?php  get_template_part('template-parts/content/homepage/featured-blog'); ?>
					<?php  get_template_part('template-parts/content/homepage/latest-blogs'); ?>
					<?php  get_template_part('template-parts/content/homepage/program-blocks'); ?>
				</div>
			</article>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
