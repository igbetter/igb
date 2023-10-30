<?php 
  $postTypeParam = isset($_GET['postType']) ? $_GET['postType'] : null;

  $featuredVideoQuery = array(
    'post_type' => 'video',
    'orderby' => 'date',
    'order' =>  'asc',
    'status'  => 'published',
    'posts_per_page' => 4,
    'meta_query'  => array(
      array(
        'key' => 'featured_video',
        'value' => true
      )
    )
  );


  $featuredBlogQuery = array(
    'post_type' => 'post',
    'orderby' => 'date',
    'order' =>  'asc',
    'status'  => 'published',
    'posts_per_page' => 4,
    'tax_query'  => array(
      'taxonomy' => 'algorithm_adjustment',
			'field' => 'slug',
			'terms' => 'featured',
    ) 
  );

  
  $results = array();

  if($postTypeParam === "video") {
    $results = new WP_Query($featuredVideoQuery);
  }
  else if($postTypeParam === "blog") {
    $results = new WP_Query($featuredBlogQuery);
  }
  else {
    $featuredVideoResult = get_posts($featuredVideoQuery);
    $featuredBlogResult = get_posts($featuredBlogQuery);
    $ids = array();

    foreach($featuredVideoResult as $result) {
      array_push($ids, $result->ID);
    }

    foreach($featuredBlogResult as $result) {
      array_push($ids, $result->ID);
    }

    $results = new WP_Query(
      array(
        'post_type' => array('post','video'),
        'orderby' => 'date',
        'order' =>  'asc',
        'status'  => 'published',
        'posts_per_page' => 5,
        'post__in' => $ids
      )
    );
  }

  $featuredContentHeading = "Featured Content";
  $backgroundColors = ['bg-igb-purple','bg-igb-pink','bg-igb-blue'];
  $tagTemplate = '<a class="post-tag %s" href="%s"><span class="skew-fix inline-flex">%s</span></a>';

  if ($results->have_posts()) :
?>
  <div class="md:col-span-2 lg:col-span-3">
    <div class="featured-content-section alignfull flex flex-col">
      <div class="more-featured-videos-section overflow-hidden">
        <h2 class="section-header">
          <?php echo $featuredContentHeading; ?>
        </h2>
      </div>
      <div class="featured-content-slider px-default">
        <?php while($results->have_posts()): $results->the_post(); ?>
          <div>
            <?php get_template_part('template-parts/content/cards/browse', 'card'); ?>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
<?php endif; ?>