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
			<?php //get_template_part('acf_blocks/big-banner', 'blue'); ?>
      <?php //get_template_part('acf_blocks/text-with-image'); ?>
      <?php //get_template_part('acf_blocks/curated-playlist'); ?>
			<?php //get_template_part('acf_blocks/dividers/divider', 'blue'); ?>
			<?php //get_template_part('template-parts/landingPage/section-image-with-text');?>
			<?php //get_template_part('template-parts/content/homepage/featured-blog');?>

			<?php //get_template_part('acf_blocks/featured-video-with-related-contents');?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
