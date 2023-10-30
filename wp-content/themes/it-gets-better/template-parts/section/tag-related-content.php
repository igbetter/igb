<?php
  $tags = array();
  $query = array();

  $useTermCondition = is_tax('playlist') || is_page('browse/playlists');

  if($useTermCondition) {
    $tags = get_terms( 'playlist', array('hide_empty' => true));
    $query = array(
      'post_type' => array('video'),
      'orderBy' => 'rand',
      'posts_per_page' => 5,
      'post__not_in' => array(get_the_ID())
    );
  }
  else {
    $tags = get_the_tags(get_the_ID());

    $query = array(
      'post_type' => array('post', 'video', 'glossary'),
      'orderBy' => 'rand',
      'posts_per_page' => 5,
      'post__not_in' => array(get_the_ID())
    );
  }
?>
<section class="you-might-also-like-section">
  <p>You might also like...</p>
  <?php 
    $index = 0;

    foreach(array_slice($tags, 0, 3) as $tag):
      if($useTermCondition) {
        $query = array_merge($query, 
          array(
            'tax_query' => array(
              array('taxonomy' => 'playlist', 'field' => 'slug', 'terms' => array($tag->slug))
            )
          )
        );
      }
      else {
        $query = array_merge($query, array('tag__in' => array($tag->term_id)));
      }
      $results = new WP_Query($query);
  ?>
    <?php if($results->have_posts()): ?>
      <?php if($index !== 0): ?>
        <hr />
      <?php endif; ?>    
      <div class="alignfull flex flex-col">
        <div class="flex justify-between items-center mb-6">
          <h2 class="section-header mb-0"><?php echo $tag->name; ?></h2>
          <a href="<?php echo get_tag_link($tag); ?>" class="ml-auto hidden md:block wp-block-button__link wp-element-button">
            More <?php echo $tag->name; ?>-Related Content
          </a>
        </div>
        <div class="featured-content-slider">
          <?php while($results->have_posts()): $results->the_post(); ?>
            <div>
              <?php get_template_part('template-parts/content/cards/browse', 'card'); ?>
            </div>
          <?php $index++; endwhile; wp_reset_postdata(); ?>
        </div> 
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
</section>