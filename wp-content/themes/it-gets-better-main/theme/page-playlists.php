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
			<?php get_template_part( 'template-parts/content/browse','playlists'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
