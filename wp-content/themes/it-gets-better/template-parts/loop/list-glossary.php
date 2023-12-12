<?php /**
 *
 * loop through glossary terms (glossary archive page)
 */

 $color = get_field( 'border_color' );
 $color_label = ( is_array( $color ) ? $color['label'] : $color );
?>
<a href="<?php the_permalink(); ?>">
<article id="glossary_term_ID-<?php echo esc_attr( get_the_ID() );?>" class="single_term color-<?php echo esc_attr( $color_label ); ?>">
<div class="two_column container">
	<div class="col_one">
	<header class="glossary_term_header">
		<h3 class="glossary_term"><?php the_title(); ?>
			<?php echo igb_display_glossary_term_category( get_the_ID(), false, 'subscript' ); ?>
		</h3>
	</header>
	<main class="glossary_term_main">

		<p>
		<?php
			$pos = get_field( 'part_of_speech' );
			if ( $pos ) :
				$pos = is_array( $pos ) ? implode( "; ", $pos ) : $pos;
				echo '<span class="part_of_speech">' . esc_html( $pos ) . '. </span> ';
		endif;
		?>
			<?php the_excerpt(); ?>
		</p>
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