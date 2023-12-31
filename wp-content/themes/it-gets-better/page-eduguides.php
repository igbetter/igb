<?php
/**
 * The template for displaying EduGuide archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

get_header();
?>

	<section id="primary" class="eduguides_archive">
		<main id="main">

			<section class="eduguide_header">
				<?php the_content(); ?>
			</section>

			<section class="eduguide_list">
				<?php
				$eduguide_args = array(
					'post_type'	 		=> 'eduguide',
					'posts_per_page'	=> 99,
					'orderby'			=> 'date',
					'order'				=> 'DESC',
				);

				$eduguide_query = new WP_Query( $eduguide_args );

				if( $eduguide_query->have_posts() ) :
					echo '<div class="grid_container">';
					while( $eduguide_query->have_posts() ) :
						$eduguide_query->the_post();

						get_template_part('template-parts/loop/card', 'eduguide');
					endwhile;
					echo '</div>';
				endif;
				?>

			</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
