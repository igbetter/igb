<?php
  // TODO: Drop this file and use tag-related-content.php once the query was finalized.

  $taxCategory = "term-category";
  $term = isset($_GET['term']) ? $_GET['term'] : null;

  $sections = array(
    array("header" => "Gender Expression", "term" => "gender-expression"),
    array("header" => "Gender Identity", "term" => "gender-identity"),
    array("header" => "Sexual Orientation", "term" => "sexual-orientation"),
  );

  $commonGlossaryQuery = array(
    'post_type' => 'glossary',
    'status' => 'published',
    'posts_per_page' => 999
  );

  $commonResultsQuery = array(
    'post_type' => array('video', 'glossary', 'post'),
    'orderby' => 'rand',
    'order' => 'DESC',
    'status'    => 'published',
    'posts_per_page' => 5,
  );
?>
<hr />
<section class="you-might-also-like-section">
  <p>You might also like...</p>
  <?php foreach($sections as $section):  ?>
    <?php
      $relatedTags = array();

      $glossaryQuery = get_posts(
        array_merge($commonGlossaryQuery,
          array(
            'tax_query' => array(
              array('taxonomy' => 'term-category', 'field' => 'slug', 'terms' => $section['term'])
            )
          )
        )
      );
	foreach($glossaryQuery as $result) {
		$tags = get_the_tags( $result->ID );
		foreach( $tags as $tag ) {
			array_push($relatedTags, $tag->term_id);
		}
	}


      if($relatedTags) $resultsQuery = array_merge($commonResultsQuery, array('tag__in' => $relatedTags));
      if($term) $resultsQuery = array_merge($commonResultsQuery, array('s' => $term));

      $results = new WP_Query($resultsQuery);
    ?>

    <?php  if($results->have_posts()): ?>
      <div class="alignfull flex flex-col py-6">
        <div class="hidden md:flex flex-row justify-between items-center mb-4">
          <h3 class="text-igb-purple dark:text-white mb-0">
            <?php echo $section['header']; ?>
          </h3>
          <a href="<?php echo get_term_link($section['term'], $taxCategory); ?>" class="wp-block-button__link wp-element-button">
            More <?php echo $section['header']; ?>-Related Content
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

  <?php endforeach; ?>

</section>