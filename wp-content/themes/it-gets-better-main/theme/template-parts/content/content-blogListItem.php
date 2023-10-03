<?php
  $query = new WP_Query(
    array(
      'post_type' => 'post',
      'order'   => 'rand',
      'orderby' => 'asc',
      'status'    => 'published',
      'posts_per_page' => 50,
    ) 
  );

  if ( $query->have_posts() ) :
    while ($query->have_posts()): $query->the_post();
      get_template_part('template-parts/content/cards/browse', 'card');
    endwhile; 
  endif;
