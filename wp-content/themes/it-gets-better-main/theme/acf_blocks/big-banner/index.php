<?php if($is_preview): ?>
	<style>
		.block-editor-block-list__block.wp-block-acf-big-colored-banner {
		  width: 100%;
		  max-width: unset !important;
		}
	</style>
<?php endif; ?>
<?php if ($is_preview && empty($block['data'])) : ?>
	<img loading="lazy" src="<?php echo get_template_directory_uri().'/acf_blocks/big-banner/preview.png'; ?>" style="width:100%;height:auto;">
<?php else:  ?> 
	<section class="wp-group big-banner px-default <?php echo get_field('background_color'); ?> <?php echo "text-" . $block['alignText']; ?> <?php echo "align-" . $block['align']; ?>" title="<?php echo $block['title']; ?>">
		<p><?php echo get_field('text_content'); ?></p>
	</section>
<?php endif; ?>