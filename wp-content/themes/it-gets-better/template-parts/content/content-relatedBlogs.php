<?php
  $term = get_field('button_text');

  $results = new WP_Query(
    array(
      'post_type' => 'post',
      'orderby'   => 'date',
      'status'    => 'published',
      'posts_per_page' => 10,
      'tag' => $term
    )
  );
?>
<?php if ($results->have_posts()): ?>
  <div class="alignfull flex flex-col py-6 overflow-hidden px-default">
    <div class="flex justify-between items-center mb-6">
      <h2 class="section-header !mb-0">
        Related Blogs
      </h2>
      <a href="<?php echo home_url('/browse-content/?postType=blog'); ?>" class="ml-auto hidden md:block wp-block-button__link wp-element-button">
        View More
      </a>
    </div>
    <div class="featured-content-slider">
      <?php while($results->have_posts()): $results->the_post(); ?>
        <div>
          <?php get_template_part('template-parts/content/cards/browse', 'card'); ?>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
<?php endif; ?>