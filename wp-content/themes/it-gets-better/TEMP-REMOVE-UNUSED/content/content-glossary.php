<?php
/**
 * Template part for displaying single glossary
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="glossary-heading">
    <div class="w-full lg:w-1/2 h-auto px-default py-4">
      <h1 class="glossary-term">
        <?php echo get_the_title(); ?>
      </h1>
      <p>
        <?php echo get_field('definition'); ?>
      </p>
    </div>
    <div class="thumbnail-container">
      <div class="thumbnail" style="background-image:url(' <?php echo get_field('header_image');  ?> ')"></div>
    </div>
  </div>
  <div class="featured-video-content">
    <div class="video-container">
      <h2>Featured <?php the_title(); ?> Video</h2>
      <div class="featured-video-wrapper">
        <?php the_field('glossary_youtube_link'); ?>
      </div>
    </div>
  </div>
  <div class="flex flex-col w-full h-full relative py-10">
    <?php   
      get_template_part( 'template-parts/content/content', 'relatedBlogs');
      get_template_part( 'template-parts/content/content', 'relatedVideos');
    ?>
    <div class="px-default pt-6">
      <div class="flex justify-between items-center mb-6">
        <h2 class="section-header !mb-0">
          Explore Other Terms
        </h2>
        <a href="<?php echo home_url('/glossary'); ?>" class="ml-auto hidden md:block wp-block-button__link wp-element-button">
          Go To Glossary
        </a>
      </div>
      <?php get_template_part( 'template-parts/content/content', 'moreGlossary' ); ?>
    </div>
    
  </div>
</article><!-- #post-${ID} -->