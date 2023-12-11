<?php /**
 *
 * loop through glossary terms (glossary archive page)
 */

 $color = get_field( 'border_color' );
 $color_label = ( is_array( $color ) ? $color['label'] : $color );

$general_term_category = get_term_by( 'name', 'general', 'term-category');
$general_term_category_ID = $general_term_category->term_id; // so we can exclude the "general" category in the arrays below

$glossary_term_categories = get_the_terms( get_the_ID(), 'term-category');


if( $glossary_term_categories ) :
	// if this has term categories set, start an array to store the term_ids
	$term_categories_ID_array = [];
	foreach( $glossary_term_categories as $glossary_term_category ) :
		$term_categories_ID_array[] = $glossary_term_category->term_id;
	endforeach;

	// now remove the 'general' term_id
	$term_categories_ID_array = array_diff($term_categories_ID_array, array( $general_term_category_ID ) );
endif;
?>
<a href="<?php the_permalink(); ?>">
<article id="glossary_term_ID-<?php echo esc_attr( get_the_ID() );?>" class="single_term color-<?php echo esc_attr( $color_label ); ?>">
<div class="two_column container">
	<div class="col_one">
	<header class="glossary_term_header">
		<h3 class="glossary_term"><?php the_title(); ?>
			<?php
				if ( $term_categories_ID_array ) :
					echo '<sub class="term_category">';
					foreach ( $term_categories_ID_array as $single_term_cat ) :
						$acftermid = 'term-category_' . $single_term_cat;
						$term_name = get_term( $single_term_cat, 'term-category' );
						$term_name = $term_name->name;
						echo '(<dfn class="term_category_def" title="' . esc_html( $term_name ) . '">' . get_field( 'sub_headline_abbreviation', $acftermid ) . '</dfn>)';
					endforeach;
					echo '</sub>';
				endif;
			?>
		<sub><?php //esc_html_e( $glossary_term_category ); ?></sub>
		</h3>
	</header>
	<main class="glossary_term_main">

		<p><?php the_field( 'definition' ); ?></p>
	</main>
	</div>
	<div class="col_two">
		<?php the_post_thumbnail( 'medium_large' ); ?>
	</div>
	</div>
	<footer class="glossary_term_footer glossary_term_bottom_border background-<?php echo esc_attr( $color_label ); ?>">
	</footer>
</article>
</a>