<?php
/*
Template Name: Glossary Archive Template
*/
 
get_header();
?>

	<section id="primary">
		<main id="main">

			<?php
			/* Start the Loop */
				get_template_part( 'template-parts/content/content', 'glossaryArchive' );
            ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();