<!-- Note: Temporary template file only. It will be removed once we utilized the custom blocks. -->
<?php
    $featuredPlaylist = get_terms(
      array(
        'taxonomy' => 'playlist',
        'meta_key' => 'show_as_featured',
        'meta_value' => true
      )
    );
?>

<?php if($featuredPlaylist): ?>
	<?php foreach(array_slice($featuredPlaylist, 0, 1) as $item): ?>
		<section class="wp-block-media-text alignfull has-media-on-the-right is-stacked-on-mobile featured-playlist">
			<div class="wp-block-media-text__content">
				<h6>FEATURED PLAYLIST</h6>
				<h2><?php echo $item->name; ?></h2>
				<?php echo term_description($item->term_id) ? term_description($item->term_id) : ""; ?>
				<div class="wp-block-buttons is-layout-flex">
					<div class="wp-block-button">
						<a class="wp-block-button__link wp-element-button" href="<?php echo get_term_link($item); ?>">
							Go to the Playlist
						</a>
					</div>
				</div>
			</div>
			<figure class="masked_image_container_double"><img src="<?php echo get_template_directory_uri() . '/_assets/images/placeholder-image-2.png' ?>" alt="" class="wp-image-4503 size-full"></figure>

			<svg height="0" width="0" class="svg-clip">
				<defs>
					<clipPath id="image_mask_double_slash" clipPathUnits="objectBoundingBox">

						<polygon fill="none"
						points=" 	.25,	.1
									.65,	.1
									.4,		1
									0,		1 "/>
						<polygon fill="none"
						points=" 	.75,	0
									1.15,	0
									.9,	.90
									.5,	.90 "/>
					</clipPath>
				</defs>
			</svg>
		</section>
		<?php endforeach; ?>
<?php endif; ?>
