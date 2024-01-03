<?php
/**
 * The template for displaying tag results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package It_Gets_Better
 */

get_header();

$tag = get_queried_object();

$term_args = array(
	'post_type' => 'glossary',
	'orderby' => 'asc',
	'status' => 'published',
	'meta_query'  => array(
		 array(
			'key' => 'button_text',
			'compare' => '=',
			'value' => $tag->slug
		)
	)
);

$matchingTerm = get_posts( $term_args )[0];
?>
	<section id="primary">
		<main id="main">
			<article id="tag-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if($matchingTerm): ?>
				<h1><?php echo get_the_title( $matchingTerm->ID ); ?></h1>
				<p><?php  echo get_field( 'definition', $matchingTerm->ID ); ?></p>
			<?php else: ?>
				<h1><?php echo esc_html( $tag->name ); ?></h1>
				<p><?php  echo esc_html( $tag->description ); ?></p>
			<?php endif; ?>

			<?php if(have_posts()): ?>
            <section class="content_grid_container">
				<?php while (have_posts()): the_post(); ?>
				<?php get_template_part('template-parts/loop/grid'); ?>
              <?php endwhile; ?>
            </section>
          <?php endif; ?>
        </div>
      </article>
		</main>
	</section>

<?php
get_footer();
