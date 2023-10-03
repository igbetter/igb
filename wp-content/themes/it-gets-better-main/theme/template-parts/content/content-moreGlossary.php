<?php 
  $result = new WP_Query(
    array(
      'post_type' => 'glossary',
      'orderby' => 'rand',
      'status' => 'published',
      'posts_per_page' => 4,
      'post__not_in' => array( get_the_ID() )
    )
  );
?>

<?php if ( $result->have_posts() ) : ?>
  <div class="explore-glossary-term-section">
    <?php while ($result->have_posts()):  $result->the_post(); ?>
      <div class="explore-glossary-term-blocks" style="border-bottom: 8px solid <?php echo get_field('border_color', $post->ID) ?>;">
        <h3>
          <?php echo get_the_title($post->ID); ?>
          <sub class="text-sm" style="color:#45acce;">(<?php echo get_field( 'concept_group' ); ?>) </sub>
        </h3>
        <p>
          <?php echo get_field('definition'); ?>
        </p>
        <a class="wp-block-button__link wp-element-button w-auto" alt="View Glossary Term  <?php echo  get_the_title($post->ID); ?>" href="<?php echo get_the_permalink($post->ID); ?>">
          View Glossary Term
        </a>
      </div>
    <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</div>
<?php endif; ?>