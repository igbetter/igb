<?php 
  $args = array(
      'post_type' => 'glossary',
      'orderby' => 'title',
      'order' => 'ASC', 
      'status' => 'published',
      'posts_per_page' => -1,
  );
  $the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
  <div class="flex flex-col md:flex-row justify-center w-full h-auto">
    <div class='flex flex-row py-10'>
      <div class='flex flex-col p-10'>
        <?php 
          while ($the_query->have_posts()): 
            $the_query->the_post();
            get_template_part('template-parts/content/content', 'glossaryItem');
          endwhile;
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>
