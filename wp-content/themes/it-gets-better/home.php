<?php
/**
 * The template for displaying all pages
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

			global $post;
			$page_for_posts_id = get_option('page_for_posts');
			if ( $page_for_posts_id ) :
				$post = get_page( $page_for_posts_id );
				setup_postdata( $post );
				?>
				<div id="post-<?php the_ID(); ?>">
					<div>
						<?php the_content(); ?>
					</div>
				</div>
				<?php
				rewind_posts();
			endif; ?>

			<section class="blog_posts_container list_container">
				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'end_size'	=> 2,
					'prev_text'	=> '&laquo; Previous',
					'next_text'	=> 'Next &raquo;',
				)); ?>
			<?php /* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/loop/list' );


				endwhile; // End of the loop.
			?>
			</section>

			<?php the_posts_pagination( array(
				'mid_size'  => 2,
				'end_size'	=> 2,
				'prev_text'	=> '&laquo; Previous',
				'next_text'	=> 'Next &raquo;',
			)); ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
