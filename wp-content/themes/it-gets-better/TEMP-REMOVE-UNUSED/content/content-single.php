<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

 $tags = get_the_tags(get_the_ID());


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-detail-page'); ?>>
	<div class="px-default">
		<?php get_template_part( 'template-parts/section/page', 'breadcrumb'); ?>
		<header class="entry-header">
			<h1 class="text-center"><?php the_title(); ?></h1>
			<!-- <?php //if(get_the_author()): ?>
				<h3>By <?php //echo get_the_author(); ?></h3>
			<?php //endif; ?> -->
			<?php if (!is_page()): ?>
				<div class="entry-meta flex justify-center flex-col text-center">
					<?php if(get_post_type() !== "product"):  ?>
		      	<p class="date">
							<?php echo get_the_modified_date('M d, Y'); ?>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</header>
		<div class="relative blog-detail">
			<?php if( has_post_thumbnail() ) : ?>
		    <div class="thumbnail-section ">
			    <?php it_gets_better_post_thumbnail();  ?>
		    </div>
	    <?php endif; ?>
			<?php get_template_part( 'template-parts/section/tag','list');  ?>
			<div class="hidden lg:block">
				<?php get_template_part( 'template-parts/section/social','share-links');  ?>
			</div>
		</div>
		<div class="block lg:hidden">
			<?php get_template_part( 'template-parts/section/social','share-links');  ?>
		</div>
		<div class="entry-content prose">
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers. */
							__( 'Continue reading<span class="sr-only"> "%s"</span>', 'it-gets-better' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
			?>
		</div>
    <?php if($tags): ?>
      <hr>
      <?php get_template_part('template-parts/section/tag', 'related-content'); ?>
    <?php endif; ?>
	</div>
</article><!-- #post-${ID} -->
