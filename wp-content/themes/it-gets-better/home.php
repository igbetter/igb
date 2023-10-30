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
					<?php get_template_part('template-parts/content/homepage/hero-section'); ?>
					<div class="featured-video alignfull flex flex-col xl:flex-row gap-8 px-default">
						<div class="featured-video-part">
							<?php get_template_part('template-parts/content/homepage/featured-video'); ?>
						</div>
						<div class="popular-browse-terms-part ">
							<?php get_template_part('template-parts/content/homepage/popular-browse-terms'); ?>
						</div>
					</div>

					<?php get_template_part('template-parts/content/homepage/more-featured-videos'); ?>
					<?php get_template_part('template-parts/content/homepage/featured-playlist'); ?>
					<?php get_template_part('template-parts/content/homepage/curated-playlist'); ?>
					<?php get_template_part('template-parts/content/homepage/svg-divider-orange'); ?>
					<?php get_template_part('template-parts/content/homepage/term-of-the-day'); ?>
					<?php get_template_part('template-parts/content/homepage/featured-program'); ?>
					<?php get_template_part('template-parts/content/homepage/featured-blog'); ?>
					<?php get_template_part('template-parts/content/homepage/latest-blogs'); ?>
					<?php get_template_part('template-parts/content/homepage/program-blocks'); ?>
				</div>
			</article>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
