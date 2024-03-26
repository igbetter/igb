<?php
/*
Template Name: Blog Archive Template
*/

get_header();
?>

	<section id="primary">
		<main id="main">
			<section class="blog_posts_container list_container">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/loop/list' );
				endwhile;
				?>
			</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();