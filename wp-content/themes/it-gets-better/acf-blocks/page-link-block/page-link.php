<?php
/**
 * 	block to highlight and link to a page. similar to the
 * 	text/media block, with additional options
 *
 */

 // Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'page_link_section';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// acf values
$page_link = get_field( 'page_link' );
$link_id = $page_link[0]->ID;
$link_description = get_field( 'link_description' );

$page_title_override = get_field( 'override_page_title' );
if( $page_title_override === true ) {
	// override page title
	$link_title = get_field( 'link_title' );
} else {
	$link_title = $page_link[0]->post_title;
}
$subheading_text = get_field( 'subtitle' );

$featured_image_override = get_field( 'featured_image_override' );
if ( $featured_image_override === true ) {

	$image = get_field( 'new_featured_image' );
} else {

	$image = get_the_post_thumbnail_url( $link_id, 'large' );
}

$frame_option = get_field( 'decoration_option' );

?>
<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> image_left">
	<div class="page_link-text_container">
		<a href="<?php echo esc_url( get_the_permalink( $link_id ) ); ?>">
			<h3 class="link_title">
				<?php
				if( $subheading_text ) {
					echo '<span class="subheading">' . esc_html( $subheading_text ) . '</span>';
				}
				?>
				<?php echo wp_kses_post( $link_title ); ?> <span> &raquo; </span>
			</h3>
			<?php if( $link_description ) : ?>
				<div class="link_description">
					<?php echo wp_kses_post( $link_description ); ?>
				</div>
			<?php endif; ?>
			<span class="fake_secondary_button fake_button">Visit: <?php echo wp_kses_post( $link_title ); ?>&nbsp;&rarr;</span>
		</a>
	</div>
	<div class="page_link-image_container" aria-hidden="true">
		<?php if( $frame_option != 'none' ) : ?>
		<svg class="small_frame" preserveAspectRatio="none" viewBox="0 0 100 70">
			<use xlink:href="#igb_<?php echo esc_html( $frame_option ) ?>"></use>
		</svg>
		<?php endif; ?>
		<?php if( $image ) : ?>
			<figure class="masked_image_container_single">
				<img src="<?php echo esc_url( $image ); ?>" class="page_link_thumbnail" />
			</figure>
			<svg height="0" width="0" class="svg-clip">
				<defs>
					<clipPath id="image_mask_slash" clipPathUnits="objectBoundingBox">

						<polygon fill="none" points="0.23,0
										1,0
										0.77,1
										0,1"/>
					</clipPath>
				</defs>
			</svg>
		<?php endif; ?>
	</div>
</section>