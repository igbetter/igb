<?php
  $paged = isset($_GET['pageNo']) ? $_GET['pageNo'] : 1;

  $query = new WP_Query(
    array(
      'post_type' => 'video',
      'order'   => 'rand',
      'status'    => 'published',
      'posts_per_page' => 18,
      'paged' => $paged,
      'meta_query' => array(
        array(
          'key' => '_thumbnail_id',
          'compare' => 'EXISTS'
        ),
      )
    )
  );
?>

<?php if ($query->have_posts()): ?>
  <section class="archive-cards px-default">
    <?php 
      while ($query->have_posts()): $query->the_post();
        get_template_part('template-parts/content/cards/browse', 'card');
      endwhile;
    ?>
  </section>
  <div>
    <?php 
      $GLOBALS['wp_query'] = $query;

      the_posts_pagination(
        array(
          'format' => '?pageNo=%#%',
          'mid_size' => 2,
          'prev_text' => __('‹'), 
          'next_text' => __('›') ,
          'add_args' => true,
        )
      ); 
    ?>
  </div>
<?php endif; ?> 