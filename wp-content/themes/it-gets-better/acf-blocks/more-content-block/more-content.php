<?php
/**
 * 	More content Block template
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'more_content_section';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

 // acf values
$heading_text = get_field( 'heading_text' );
$subheading_text = get_field( 'subheading_text' );
$num_results = (int) get_field( 'number_of_items_to_display' );
$background_color = get_field( 'background_color' );
$layout = get_field( 'layout' );

$content_types = get_field( 'content_types_to_display' );
$auto_or_manual_query = get_field( 'content_selection' );

if( $auto_or_manual_query ===  true  ) {
	// manual selection of content
	$selected_content = get_field( 'manually_selected_content' );

	$selected_content_ID_array = [];

	foreach( $selected_content as $content ) {
		$selected_content_ID_array[] = $content->ID;
	}


	$args = array(
		'post_type'		=> 'any',
		'post__in'		=>  $selected_content_ID_array ,
	);

}

if( $auto_or_manual_query === false ) {
	// auto / query content

	$filter_array = get_field( 'content_filter' );

	if( have_rows( 'content_filter' ) ) :
		while( have_rows( 'content_filter' ) ) : the_row();
			$tag_filter =  get_sub_field( 'show_only_these_tags' );
		endwhile;
	endif;

	$args = array(
		'posts_per_page'		=>  $num_results,
		'post_type'				=> $content_types,
		'tag__in'				=> $tag_filter,
	);

}
$extra_carousel_class = '';
if( $layout === 'carousel' ) :
	 $extra_carousel_class = 'splide';
endif;

?>

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ) . ' layout-' . esc_attr( $layout ) . ' background-' . esc_html( $background_color ) . ' ' . esc_attr( $extra_carousel_class ); ?>">
	<header class="more_content_header">
		<div class="header_text">
			<?php if ( $subheading_text ) {
				echo '<h6 class="subhead">' . esc_html( $subheading_text ) . '</h6>';
				} ?>
			<h2><?php echo wp_kses_post( $heading_text ); ?></h2>
		</div>
	</header>
		<?php
		$more_content_query = new WP_Query( $args );

		if( $more_content_query->have_posts() ) :
			echo '<div class="content_' . esc_attr( $layout ) . '_container">';
			if( $layout === 'carousel' ) { ?>
			<div class="more_content_slider splide__track">
				<ul class="horizontal_slider splide__list">
			<?php }

			while( $more_content_query->have_posts() ) :
				$more_content_query->the_post();

				get_template_part( 'template-parts/loop/' . $layout  );

			endwhile;

			if( $layout === 'carousel' ) { ?>
				</ul>
			</div>
			<?php }
			echo '</div>';
			wp_reset_postdata();
		endif;
		?>

	</div>
</section>