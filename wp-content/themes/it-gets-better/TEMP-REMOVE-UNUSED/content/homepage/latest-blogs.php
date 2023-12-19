<?php
  $resultsQuery = array(
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'status'    => 'published',
    'posts_per_page' => 5,
  );
  
  $blogArchiveLink = home_url('/browse-content/?postType=blog');
  $results = new WP_Query($resultsQuery);
?>

<div class="alignfull flex flex-col py-6 overflow-hidden">
  <div class="hidden md:flex flex-row justify-between items-center mb-4 px-default">
    <h3 class="text-igb-purple dark:text-white mb-0">
      Latest Blogs
    </h3>
    <a href="<?php echo $blogArchiveLink; ?>" class="wp-block-button__link wp-element-button">
      All Blogs
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