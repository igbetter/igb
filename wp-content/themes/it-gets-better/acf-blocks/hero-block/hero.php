<?php
/**
 * Testimonial Block template.
 *
 * @param array $block The block settings and attributes.
 */

 // acf values

$heading_text = get_field( 'hero_heading_text' );
$subheading_text = get_field( 'hero_subheading_text' );
$paragraph_text = get_field( 'hero_paragraph_text' );
$button_text = get_field( 'hero_cta_button_text' );
$button_url = get_field( 'cta_button_link' );
$search_label = !empty(get_field( 'hero_search_label' )) ? get_field( 'hero_search_label' ) : 'Search for...';

$svg_frame = get_field( 'frame_option' );
$image = get_field( 'hero_image' );

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>


<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?> section_hero image_right">
	<div class="hero_text-container">
		<?php if ( $subheading_text ) {
			echo '<h6 class="subhead">' . esc_html( $subheading_text ) . '</h6>';
			} ?>
		<h1><?php echo esc_html( $heading_text ); ?></h1>
		<?php if ( $paragraph_text ) {
			echo '<p>' . wp_kses_post( $paragraph_text ) . '</p>';
			} ?>
		<?php if ( $button_text && $button_url ) {
			echo '<a href="' . esc_url( $button_url ) . '" class="button primary_button">' . esc_html( $button_text) . '</a>';
			} ?>
	</div>
	<div class="hero_image-container">
		<svg class="feature_frame" preserveAspectRatio="xMaxYMid meet" viewBox="0 0 100 115">
			<use xlink:href="#igb_<?php echo esc_html( $svg_frame ) ?>"></use>
		</svg>
		<img src="<?php echo esc_url( $image ) ?>" />

	</div>
</section>
