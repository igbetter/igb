<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post(); ?>

				<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				the_content();
				wp_link_pages(
					array('before' => '<div>' . __( 'Pages:', 'it-gets-better' ),	'after'  => '</div>')
				);
				?>
				</main><!-- #post-<?php the_ID(); ?> -->
			<?php
			endwhile;
			// Previous/next page navigation.
			it_gets_better_the_posts_navigation();
		else :
			// no content
		endif;

		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
