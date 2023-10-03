<?php if($is_preview): ?>
	<style>
		.block-editor-block-list__block.wp-block-acf-two-column-text-image {
		  width: 100%;
		  max-width: unset !important;
		}
	</style>
<?php endif; ?>
<?php if ($is_preview && empty($block['data'])) : ?>
	<img loading="lazy" src="<?php echo get_template_directory_uri().'/acf_blocks/two-columns-text-and-image/preview.png'; ?>" style="width:100%;height:auto;">
<?php else: ?>
<?php    
	$heading = get_field('heading');
	$subheading = get_field('subheading');   
  $excerpt = get_field('excerpt');   
  $learnMoreLink = get_field('learn_more_link');
  $image  = get_field('featured_image');
?>
<div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center featured-playlist">
  <div class="wp-block-media-text__content">
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
      <div class="wp-block-buttons is-layout-flex">
        <div class="wp-block-button">
          <a class="wp-block-button__link wp-element-button" href="<?php echo $learnMoreLink['url']; ?>">
            <?php echo $learnMoreLink['title'] ? $learnMoreLink['title'] : 'Learn More'; ?>
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <?php if($image): ?>
    <figure class="wp-block-media-text__media">
      <img decoding="async" loading="lazy" width="1024" height="880" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="wp-image size-full" >
    </figure>
  <?php endif; ?>
</div>
<?php endif; ?>