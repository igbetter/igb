<?php
/**
 * Template part for displaying video archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */
?>
<div id="template-archive-glossary" <?php post_class(); ?>>
  <?php the_content(); ?>
  <?php get_template_part( 'template-parts/content/content', 'videoListItem' ); ?>
</div><!-- #post-${ID} -->

