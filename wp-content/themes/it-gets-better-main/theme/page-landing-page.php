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

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) {
				// 	comments_template();
				// }

				endwhile; // End of the loop.
			?>
			<?php get_template_part('template-parts/landingPage/section', 'big-banner'); ?>
			<?php get_template_part('template-parts/landingPage/section', 'image-with-text'); ?>
			<?php get_template_part('template-parts/content/homepage/featured-blog'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
