<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package It_Gets_Better
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) : ?>
            <div class="search-results-wrapper">
			<?php
			// Start the Loop.
            
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'searchItem' );
				// End the loop.
			endwhile;

			// Previous/next page navigation.
			//it_gets_better_the_posts_navigation();

		else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
        </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
