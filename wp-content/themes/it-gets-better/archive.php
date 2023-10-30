<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

get_header();
?>

	<section id="primary">
		<main id="main">
			<article id="tag-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="px-default">
          <?php get_template_part( 'template-parts/section/page', 'breadcrumb'); ?>
					<?php if($matchingTerm || $tag->name || $tag->description): ?>
	          <div class="py-2">
	            <?php if($matchingTerm): ?>
	              <h3><?php echo get_the_title($matchingTerm->ID); ?></h3>
	              <p><?php  echo get_field('definition', $matchingTerm->ID); ?></p>
	            <?php else: ?>
								<?php if($tag->name): ?>
	              	<h3><?php echo $tag->name; ?></h3>
								<?php endif; ?>
								<?php if($tag->description): ?>
	              	<p><?php  echo $tag->description; ?></p>
								<?php endif; ?>
	            <?php endif; ?>
	          </div>
					<?php endif; ?>
          <?php if(have_posts()): ?>
            <section class="archive-cards">
              <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/content/cards/browse', 'card'); ?>
              <?php endwhile; ?>
            </section>
          <?php endif; ?>
        </div>
      </article>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
