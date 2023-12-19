<?php
/**
 * Template part for displaying single video
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

?>

<?php
  $browseContentPage = get_posts(
    array(
      'name'        => 'browse-content',
      'post_type'   => 'page',
      'post_status' => 'published',
      'numberposts' => 1
    )
  )[0];

  $tags = get_the_tags(get_the_ID());
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="px-default">
    <?php get_template_part( 'template-parts/section/page', 'breadcrumb'); ?>
    <?php get_template_part( 'template-parts/section/video', 'player'); ?>
    <?php if($tags): ?>
      <hr>
      <?php get_template_part('template-parts/section/tag', 'related-content'); ?>
    <?php endif; ?>
  </div>
</article><!-- #post-${ID} -->