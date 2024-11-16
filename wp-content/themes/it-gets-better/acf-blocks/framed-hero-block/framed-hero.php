<?php
/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

 // acf values

$secondary_column_content = get_field( 'secondary_column_content' );


if( $secondary_column_content === '1' ) {
	$box1_array = get_field( 'box_1_content' );
}

if( $secondary_column_content === '2' ) {
	$box1_array = get_field( 'box_1_content' );
	$box2_array = get_field( 'box_2_content' );
}

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

$display_options = $hero_content[ 'display_options' ];

// because ACF makes a blank array even when an option isn't selected, we'll only populate this variable if "cta_button" is in the "display options" array
$cta_button_array = '';
if( in_array( 'cta_button', $display_options ) ) {
	$cta_button_array = $hero_content[ 'cta_button' ];
}



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

// Support "full height"
if ( ! empty( $block['fullHeight'] ) ) {
	$class_name .= ' is-full-height';
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
	<?php if( $secondary_column_content >= 1 ) {
		echo '<div class="hero_secondary secondary_column">';

		if( isset( $box1_array ) ) {
			$background_option = $box1_array[ 'background_options' ];
				$background_class = '';
				$background_style = '';
				$background_class = 'no_background';
				if( $background_option === 'dynamic' ) {
					$background_class = 'background-' . $box1_array[ 'dynamic_color' ];
				}
				if( $background_option === 'solid' ) {
					$background_class = 'background-' . $box1_array[ 'solid_color' ];
				}
				if( $background_option === 'gradient' ) {
					$background_class = 'background-' . $box1_array[ 'gradient' ];
				}
				if( $background_option === 'custom' ) {
					//$background_style = $box1_array[ 'custom_color' ];

					$custom_color_array = $box1_array[ 'custom_color' ];
					$background_color = $custom_color_array[ 'custom_background_color' ];
					$text_color = $custom_color_array[ 'custom_text_color' ];

					$background_style = 'style="background-color: ' . esc_attr( $background_color ) . '; color: ' . esc_attr( $text_color ) . '; a, a:visited, a:hover, a:hover:visited : ' . esc_attr( $text_color ) . ';"';
				}

			$content_type1 = $box1_array[ 'box_content_type' ];

			if( $content_type1 === 'link' ) {
				// content is a link to content on the site
				$url = $box1_array[ 'internal_link' ];
				$link_id = url_to_postid( $url );

				$link_title = ( true === $box1_array[ 'override_title'] ) ? $box1_array[ 'link_title' ] : get_the_title( $link_id );
				$link_image_url = ( true === $box1_array[ 'override_image'] ) ? $box1_array[ 'featured_image' ] : wp_get_attachment_url( get_post_thumbnail_id( $link_id ) );

				$content = sprintf(
					'
					<a href="%s" class="box_link_container">
						<span class="link_title"> %s </span>
						<img src="%s" class="link_image" />
					</a>
					',
					$url,
					$link_title,
					$link_image_url
				);

			} else {
				// content is freeform text box
				$content = $box1_array[ 'main_text' ];
			}

			printf(
				'
				<div class="secondary_box %s type-%s" %s>
					<div class="box_content">
						%s
					</div>
				</div>
				',
				esc_attr( $background_class ),
				esc_html( $content_type1 ),
				$background_style,
				wp_kses_post( $content )
			);

		}

		if( isset( $box2_array ) ) {
			$background_option = $box2_array[ 'background_options' ];
				$background_class = '';
				$background_style = '';
				$background_class = 'no_background';
				if( $background_option === 'dynamic' ) {
					$background_class = 'background-' . $box2_array[ 'dynamic_color' ];
				}
				if( $background_option === 'solid' ) {
					$background_class = 'background-' . $box2_array[ 'solid_color' ];
				}
				if( $background_option === 'gradient' ) {
					$background_class = 'background-' . $box2_array[ 'gradient' ];
				}
				if( $background_option === 'custom' ) {
					//$background_style = $box1_array[ 'custom_color' ];

					$custom_color_array = $box2_array[ 'custom_color' ];
					$background_color = $custom_color_array[ 'custom_background_color' ];
					$text_color = $custom_color_array[ 'custom_text_color' ];

					$background_style = 'style="background-color: ' . esc_attr( $background_color ) . '; color: ' . esc_attr( $text_color ) . '; a, a:visited, a:hover, a:hover:visited : ' . esc_attr( $text_color ) . ';"';
				}
			$content_type2 = $box2_array[ 'box_content_type' ];

			if( $content_type2 === 'link' ) {
				// content is a link to content on the site
				$url = $box2_array[ 'internal_link' ];
				$link_id = url_to_postid( $url );

				$link_title = ( true === $box2_array[ 'override_title'] ) ? $box2_array[ 'link_title' ] : get_the_title( $link_id );
				$link_image_url = ( true === $box2_array[ 'override_image'] ) ? $box2_array[ 'featured_image' ] : wp_get_attachment_url( get_post_thumbnail_id( $link_id ) );

				$content = sprintf(
					'
					<a href="%s" class="box_link_container">
						<span class="link_title"> %s </span>
						<img src="%s" class="link_image" />
					</a>
					',
					$url,
					$link_title,
					$link_image_url
				);

			} else {
				// content is freeform text box
				$content = $box2_array[ 'main_text' ];
			}

			printf(
				'
				<div class="secondary_box %s type-%s" %s>
					<div class="box_content">
						%s
					</div>
				</div>
				',
				esc_attr( $background_class ),
				esc_html( $content_type2 ),
				$background_style,
				wp_kses_post( $content )
			);
		}

		echo '</div>';
	} ?>
</section>
