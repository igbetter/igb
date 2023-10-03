<?php if ($is_preview && !empty($block['data'])) : ?>
	<img loading="lazy" src="<?php echo get_template_directory_uri().'/acf_blocks/two-columns-image-and-text/preview.png'; ?>">
<?php else: ?>

  <?php    
  	$heading = get_field('heading');
  	$subheading = get_field('subheading');   
    $excerpt = get_field('excerpt');   
    $learnMoreLink = get_field('learn_more_link');
    $image  = get_field('featured_image');
  ?>
  <section class="section-image-with-text left-image" >
    <div class="image-part">
      <?php if($image): ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
      <?php endif; ?>
    </div>
    <div class="text-part">
      <div class="text-content">
          <?php if($subheading): ?>
          <h4><?php echo $subheading; ?></h4>
        <?php endif; ?>
        <?php if($heading):?>
          <?php echo $heading; ?>
        <?php endif; ?>
        <?php if($excerpt): ?>
          <p>
            <?php echo $excerpt; ?>
          </p>
        <?php endif; ?>
        <?php if($learnMoreLink): ?>
          <a href="<?php echo $learnMoreLink['url']; ?>" class='wp-block-button__link wp-element-button'>
            <?php echo $learnMoreLink['title'] ? $learnMoreLink['title'] : 'Learn More'; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>