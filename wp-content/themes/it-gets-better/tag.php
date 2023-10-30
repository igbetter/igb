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
        <div class="px-default">
          <?php get_template_part( 'template-parts/section/page', 'breadcrumb'); ?>
          <div class="py-2">
            <?php if($matchingTerm): ?>
              <h3><?php echo get_the_title($matchingTerm->ID); ?></h3>
              <p><?php  echo get_field('definition', $matchingTerm->ID); ?></p>
            <?php else: ?>
              <h3><?php echo $tag->name; ?></h3>
              <p><?php  echo $tag->description; ?></p>
            <?php endif; ?>
          </div>
          <?php if(have_posts()): ?>
            <section class="archive-cards">
              <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/content/cards/browse', 'card'); ?>
              <?php endwhile; ?>
            </section>
          <?php endif; ?>
        </div>
      </article>
		</main>
	</section>

<?php
get_footer();
