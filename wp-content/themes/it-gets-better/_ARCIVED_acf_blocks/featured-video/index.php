<?php if ($is_preview && !empty($block['data'])) : ?>
  <img loading="lazy" src="<?php echo get_template_directory_uri().'/acf_blocks/featured-video/preview.png'; ?>" style="width:100%;height:auto;">
<?php else: ?>
  <?php 
    $sectionHeader = get_field('section_header');
    $featuredVideo = get_field('featured_video');
    $showRelatedContents = get_field('show_related_contents');
    $relatedContents = get_field('related_contents');
    $content = get_field('content');

    $relatedContentHeader = get_field('related_content_header');
    $relatedContentLink = get_field('related_content_link');

    $results = array();

    if($showRelatedContents === 'tags') {
      $tags = get_the_tags($featuredVideo);
      $tagsArray = array();
      
      foreach($tags as $tag) {
        array_push($tagsArray, $tag->term_id);
      }

      $commonResultsQuery = array(
        'post_type' => array('video', 'glossary', 'post'),
        'orderby' => 'rand',
        'order' => 'DESC',
        'status'    => 'published',
        'posts_per_page' => 5,
        'tag__in' => $tagsArray
      );
      $results = new WP_Query($commonResultsQuery);
    }
    else if($showRelatedContents === 'pick') {
      $tags = get_the_tags($featuredVideo);
      $idsArray = array();
      
      foreach($relatedContents as $content) {
        array_push($idsArray, $content['content']->ID);
      }

      $results = new WP_Query(
        array(
          'post_type' => array('video', 'glossary', 'post'),
          'orderby' => 'rand',
          'order' => 'DESC',
          'status'    => 'published',
          'posts_per_page' => 5,
          'post__in' => $idsArray
        )
      );
    }
?>
<div class="featured-video-content">
  <div class="video-container">
    <h2><?php echo $sectionHeader ? $sectionHeader : 'Featured Video'; ?></h2>
    <div class="featured-video-wrapper">
      <?php the_field('youtube_link', $featuredVideo); ?>
    </div>
  </div>
  <?php if($showRelatedContents !== 'hide' && $results->have_posts()): ?>
    <div class="alignfull flex flex-col py-6 overflow-hidden">
      <div class="hidden md:flex flex-row justify-between items-center mb-4 px-default">
        <h3 class="text-igb-purple dark:text-white mb-0">
          <?php echo  $relatedContentHeader; ?>
        </h3>
        <?php if($relatedContentLink): ?>
        <a href="<?php echo $relatedContentLink['url']; ?>" class="wp-block-button__link wp-element-button">
          <?php echo $relatedContentLink['title']; ?>
        </a>
        <?php endif; ?>
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


<?php endif; ?>

