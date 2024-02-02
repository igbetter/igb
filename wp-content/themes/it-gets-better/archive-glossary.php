<?php
/*
Template Name: Glossary Archive Template
*/

get_header();
?>
	<section id="primary" class="glossary_page">
		<main id="main">

		<section class="glossary_header">
			<?php the_content(); ?>
		</section>
		<section id="glossary_term_list" class="glossary_list">
			<?php
			// the query

			$glossary_term_args = array(
				'post_type' 	=> 'glossary',
				'orderby' 		=> 'title',
				'order' 		=> 'ASC',
				'status' 		=> 'published',
				'posts_per_page' => 999,
			);

			$the_query = new WP_Query( $glossary_term_args );

			if( $the_query->have_posts() ) :
				while( $the_query->have_posts() ) :
					$the_query->the_post();
					get_template_part( 'template-parts/loop/list', 'glossary' );
				endwhile;
			endif;


			?>
		</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();