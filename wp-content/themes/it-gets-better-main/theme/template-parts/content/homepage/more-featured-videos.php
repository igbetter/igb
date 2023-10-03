<?php 
  $featuredVideosQuery = array(
    'post_type' => 'video',
    'orderby'   => 'date',
    'status'    => 'published',
    'offset'    => 1,
    'posts_per_page' => 4,
    'meta_query'  => array(
      array(
        'key' => 'featured_video',
        'value' => true
      )
    )
  );

  $videoArchiveLink = home_url() . '/videos';
  $allVideosLabel = "All Videos";
  $moreFeaturedVideosHeading = "More Featured Videos";
  $backgroundColors = ['bg-igb-purple','bg-igb-pink','bg-igb-blue'];
  $tagTemplate = '<a class="post-tag %s" href="%s"><span class="skew-fix inline-flex">%s</span></a>';

  $results = new WP_Query($featuredVideosQuery);

  if ($results):
?>
  <div class="alignfull flex flex-col my-6 sm:visible px-default">
    <div class="more-featured-videos-section overflow-hidden">
      <div class='flex flex-row justify-between items-center mb-4'>
        <h2 class="section-header">
          <?php echo $moreFeaturedVideosHeading; ?>
        </h2>
        <a href='<?php echo $videoArchiveLink; ?>' class='wp-block-button__link wp-element-button hidden md:block'>
          <?php echo $allVideosLabel; ?>
        </a>
      </div>
      <div class="more-featured-videos-slider">
        <?php 
          while($results->have_posts()): $results->the_post();
            echo "<div>";
            get_template_part('template-parts/content/cards/browse', 'card');
            echo "</div>"; 
          endwhile; wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>