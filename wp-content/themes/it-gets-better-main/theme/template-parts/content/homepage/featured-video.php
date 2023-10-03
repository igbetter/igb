<!-- Note: Temporary template file only. It will be removed once we utilized the custom blocks. -->
<?php
  $featured_video = get_posts(
    array(
      'post_type' => 'video',
      'orderby' => 'date',
      'status' => 'published',
      'posts_per_page' => 1,
      'meta_query'  => array(
        array(
          'key' => 'featured_video',
          'value' => true
        )
      )
    )
  );

  $video_title = "";
  $video_permalink = "";
  $video_file_link = "";
  $featured_description = "";

  if ($featured_video):
    foreach ( $featured_video as $video ) : 
      $video_title = $video->post_title;
      $video_permalink = get_the_permalink($video->ID);
      $video_file_link = get_field('youtube_link', $video->ID);
      $featured_description = get_field('featured_description', $video->ID);
    endforeach;

    $featuredVideoTags = '<a class="associated-post-tag" style="background-color: %s" href="%s"><span>%s</span></a>';  
    $count = 0;
?>
  <section class="featured-video-wrapper-section">
    <h2 class="section-header">Featured Video</h2>
    <div class="featured-video-wrapper">
      <?php echo $video_file_link; ?>
    </div>
    <?php if($video_title): ?>
      <h3><?php echo $video_title; ?></h3>
    <?php endif; ?>
    <?php if($featured_description): ?>
      <p><?php echo $featured_description; ?></p>  
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section>
<?php endif; ?>