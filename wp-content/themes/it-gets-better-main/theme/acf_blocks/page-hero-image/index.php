<?php if($is_preview): ?>
	<style>
		.block-editor-block-list__block.wp-block-acf-page-hero-image {
		  width: 100%;
		  max-width: unset !important;
		}
	</style>
<?php endif; ?>
<?php if ($is_preview && empty($block['data'])) : ?>
	<img loading="lazy" src="<?php echo get_template_directory_uri().'/acf_blocks/page-hero-image/preview.png'; ?>" style="width:100%;height:auto;">
<?php else:  ?> 
  <div class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center hero-section <?php echo is_front_page() || is_home() ? "home" : ""; ?>" style="grid-template-columns:auto 38%">
    <div class="wp-block-media-text__content text-content">
      <?php if($block['data']['sub_heading']): ?>
        <h4>
          <?php echo $block['data']['sub_heading']; ?>
        </h4>
      <?php endif; ?>
      <?php if($block['data']['heading']): ?>
        <h1>
          <?php echo nl2br(  $block['data']['heading']); ?>
        </h1>
      <?php endif; ?>
      <?php if($block['data']['description']): ?>
        <p>
          <?php echo nl2br(  $block['data']['description']); ?>
        </p>
      <?php endif; ?>
      <?php if($block['data']['header_action'] === "1"): ?>
        <?php if($block['data']['header_action_option'] === 'search_form'): ?>
          <form role="search" method="get" action="<?php echo home_url(); ?>" class="wp-block-search__no-button wp-block-search">
            <label for="wp-block-search__input-1" class="wp-block-search__label screen-reader-text">Search</label>
            <div class="wp-block-search__inside-wrapper ">
              <input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Ex: Bisexual Dating" required="" >
            </div>
          </form>
        <?php elseif($block['data']['header_action_option'] === 'link' && $block['data']['cta_page_link']): ?>
          <div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
            <div class="wp-block-button is-style-fill">
              <a class="wp-block-button__link has-background-color has-text-color wp-element-button" href="<?php echo $block['data']['cta_page_link']['url'];?>" target="<?php echo $block['data']['cta_page_link']['target'];?>" rel="<?php echo $block['data']['cta_page_link']['url'];?> noopener">
                <?php echo $block['data']['cta_page_link']['title'];?>
              </a>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <?php if($block['data']['image']): ?>
      <figure class="wp-block-media-text__media">
        <?php echo wp_get_attachment_image($block['data']['image'], 'full'); ?>  
      </figure>
    <?php endif; ?>
  </div>
<?php endif; ?>
