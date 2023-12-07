<?php /**
 *
 * loop through glossary terms (glossary archive page)
 */

 $color = get_field( 'border_color' );
 $color_label = ( is_array( $color ) ? $color['label'] : $color );

 $glossary_term_category = get_field( 'concept_group' );

?>

<article id="glossary_term_ID-<?php echo esc_attr( get_the_ID() );?>" class="single_term color-<?php echo esc_attr( $color_label ); ?>">
	<header class="glossary_term_header">
		<h3 class="glossary_term"><?php the_title(); ?> <sub><?php esc_html_e( $glossary_term_category ); ?></sub></h3>
	</header>
	<main class="glossary_term_main">
		<p><?php the_field( 'definition' ); ?></p>
	</main>
	<footer class="glossary_term_footer glossary_term_bottom_border background-<?php echo esc_attr( $color_label ); ?>">
	</footer>
</article>