<?php
/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

 // acf values

$secondary_column_content = get_field( 'secondary_column_content' );

// get design options (group)
$design_options = get_field( 'design_options' );
$background_options = $design_options[ 'background_options' ];

$background_class = 'no_background';
if( $background_options === 'dynamic' ) {
	$background_class = 'background-' . $design_options[ 'dynamic_color' ];
}
if( $background_options === 'solid' ) {
	$background_class = 'background-' . $design_options[ 'solid_color' ];
}
if( $background_options === 'gradient' ) {
	$background_class = 'background-' . $design_options[ 'gradient' ];
}

$background_decoration = $design_options[ 'background_decoration' ];

$hero_image_array = $design_options[ 'hero_image' ];


 // get content (group)
$hero_content = get_field( 'hero_content' );

$subheading_text = $hero_content[ 'subheading_text' ];
$heading_text = $hero_content[ 'hero_text' ];
$paragraph_text = $hero_content[ 'paragraph_text' ];
$cta_button_array = $hero_content[ 'cta_button' ];




// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>


<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?> section_framed_hero framed_hero-container ">
	<div class="hero_main main_column <?php echo esc_attr( $background_class ); ?>">
		<div class="content_container">
			<?php if ( $subheading_text ) {
				echo '<h6 class="subhead">' . esc_html( $subheading_text ) . '</h6>';
			} ?>
			<h1><?php echo wp_kses_post( $heading_text ); ?></h1>
			<?php if ( $paragraph_text ) {
				echo '<div class="hero_paragraph_text">' . wp_kses_post( $paragraph_text ) . '</div>';
			} ?>
			<?php if ( $cta_button_array != '' ) {
				$url = $cta_button_array[ 'button_url' ];
				$label = $cta_button_array[ 'button_label' ];
				echo '<a href="' .  esc_url( $url ) . '" class="button primary_button">' . esc_html( $label ) . '</a>';
			} ?>
		</div>
		<div class="image_container">
			<?php if ( $hero_image_array ) {

				$image_url = $hero_image_array[ 'url' ];
				$alt = $hero_image_array[ 'alt' ];
				echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_html( $alt ). '" class="hero_image">';
			} ?>
		</div>
		<div class="background_decoration <?php echo esc_attr( $background_decoration ); ?>"></div>
	</div>
</section>
