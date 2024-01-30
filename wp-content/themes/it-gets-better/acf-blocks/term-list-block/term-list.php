<?php
/**
 * term list Block template
 */


 // acf values

 $heading_text = get_field( 'heading_text' );
 $num_results = get_field( 'number_of_terms_to_display' );
 $background_color = get_field( 'background_color' );
 $glossaryLink = home_url('glossary');

 $popularTermsQuery = array(
	'post_type' => 'glossary',
	'orderby' => 'rand',
	'status' => 'published',
	'posts_per_page' => $num_results,
	'meta_query'  => array(
		array(
			'key' => 'popular',
			'value' => true
			)
		)
	);

	$glossary_terms = get_posts($popularTermsQuery);

 // Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'glossary_term_list';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ) . ' popular-browse-terms background-' . esc_html( $background_color ); ?>">
	<div class="section_content">
		<h2><?php echo wp_kses_post( $heading_text ); ?></h2>
		<ul class="term_list">
			<?php foreach( $glossary_terms as $glossary_term ) :
				$color = get_field('border_color', $glossary_term->ID);
				if( is_array( $color ) ) {
					$color = $color['label'];
				}
				$tagLink = get_the_permalink( $glossary_term );
				$name = get_the_title( $glossary_term );
				printf(
					'<li class="term background-%s">
						<a href="%s"><span>%s</span></a>
					</li>',
					esc_html( $color ),
					esc_url( $tagLink ),
					esc_html( $name )
				);
			endforeach; ?>
			<li class="term more_terms">
				<a href="<?php echo esc_url( $glossaryLink ) ?>">
					<span>more...</span>
				</a>
			</li>
		</ul>
	</div>
</section>

