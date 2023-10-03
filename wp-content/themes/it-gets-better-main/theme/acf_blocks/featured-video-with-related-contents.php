<?php 
  
    $commonResultsQuery = array(
      'post_type' => array('video', 'glossary', 'post'),
      'orderby' => 'rand',
      'order' => 'DESC',
      'status'    => 'published',
      'posts_per_page' => 5,
    );

    $results = new WP_Query($commonResultsQuery);
?>
<div class="featured-video-content">
  <div class="video-container">
    <h2>Featured Video</h2>
    <?php the_field('youtube_link', 3089); ?>
  </div>
  <?php if($results->have_posts()): ?>
    <div class="alignfull flex flex-col py-6 overflow-hidden">
      <div class="hidden md:flex flex-row justify-between items-center mb-4 px-default">
        <h3 class="text-igb-purple dark:text-white mb-0">
          Related Content
        </h3>
        <a href="<?php echo get_the_permalink($termID); ?>" class="wp-block-button__link wp-element-button">
          More EDU Content
        </a>
      </div>
      <div class="featured-content-slider px-default">
        <?php while($results->have_posts()): $results->the_post(); ?>
          <div>
            <?php get_template_part('template-parts/content/cards/browse', 'card'); ?>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  <?php endif; ?>
</div>

