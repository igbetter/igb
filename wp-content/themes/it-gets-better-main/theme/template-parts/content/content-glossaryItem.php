<div class="glossary-row my-4" style="border-bottom: 8px solid <?php echo get_field('border_color', get_the_ID()) ?>;" >
  <div class="term-title">
    <h3>
      <?php echo  get_the_title(get_the_ID()); ?>
      &nbsp;&nbsp;
      <span  class='text-sm' style='color:#45acce;'>
        (<?php echo get_field('concept_group'); ?>)
      </span>
    </h3>
  </div>
  <div class='term-definition'>
    <p>
      <?php echo get_field('definition', get_the_ID()); ?>
    </p>
  </div>
  <div class='term-link'>
    <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="wp-block-button__link wp-element-button">
      View Term
    </a>
  </div>
</div>