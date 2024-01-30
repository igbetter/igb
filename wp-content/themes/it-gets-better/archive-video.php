<?php
/*
Template Name: Video Archive Template
*/

get_header();
?>

	<section id="primary">
		<main id="main">
			<?php
			/* Start the Loop */
				get_template_part( 'template-parts/loop/grid' );
      ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();