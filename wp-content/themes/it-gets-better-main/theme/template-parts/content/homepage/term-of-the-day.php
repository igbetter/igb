<?php 
  $termOfDayArgs = array(  
    'post_type' => 'glossary',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'meta_query'  => array(
      array(
        'key' => 'featured_term',
        'value' => true
      )
    ), 
    'orderby' => 'title', 
    'order' => 'ASC',
  );

  $termOfTheDay = get_posts( $termOfDayArgs ); 
  $relatedTags = array();
  $section = array();

  foreach($termOfTheDay as $term) {
    foreach(get_the_tags($term->ID) as $tag) {
      array_push($relatedTags, $tag->term_id);
    }
  }

  $conceptCat = "";
  $conceptColor = "";
  $definition = "";
  $termID = "";

  foreach ( $termOfTheDay as $term ) :
    $termID = $term->ID;
    $conceptCat = get_field('concept_group', $termID);
    $conceptColor = get_field('border_color', $termID);
    $definition = get_field('definition', $termID);
?>
    <div class="term-of-the-day-block">
      <div class="wrapper">
        <div class="term-info-section">
          <div class="term-banner">
            <p>Term of the Day</p>
          </div>
          <div class="term-info-section-inner">
            <h2><?php echo get_the_title($term->ID); ?>
              <sub style="color: <?php echo $conceptColor; ?>">(<?php echo $conceptCat; ?>)</sub>
            </h2>
            <p><?php echo $definition; ?></p>
            <a href="<?php echo get_the_permalink($term->ID); ?>" class='wp-block-button__link wp-element-button'>
              Learn More
            </a>
          </div>
        </div>
        <div class="term-video-section">
          <div class="featured-video-wrapper">
            <?php if(!get_field('featured_video', $term->ID )): ?>
              <?php echo the_field('glossary_youtube_link', $term->ID); ?>
            <?php else: ?>
               <iframe src="<?php echo the_field('upload_glossary_video', $term->ID);?>">
             <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
<?php endforeach; ?>

<?php 
  if($relatedTags):
    $commonResultsQuery = array(
      'post_type' => array('video', 'glossary', 'post'),
      'orderby' => 'rand',
      'order' => 'DESC',
      'status'    => 'published',
      'posts_per_page' => 5,
      'meta_query' => array(
        array(
          'key' => '_thumbnail_id',
          'compare' => 'EXISTS'
        ),
      )
    );

    $resultsQuery = array_merge($commonResultsQuery, array('tag__in' => $relatedTags));
    $results = new WP_Query($resultsQuery);

?>
  <div class="term-of-the-day-related-contents alignfull flex flex-col py-6 overflow-hidden">
    <div class="flex flex-row justify-between items-center mb-4 px-default">
      <h2 class="section-header">
        Related Content
      </h2>
      <a href="<?php echo get_the_permalink($termID); ?>" class="wp-block-button__link wp-element-button hidden md:block">
        More <?php echo get_the_title($termID); ?>-Related Content
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
