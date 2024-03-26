<?php
/**
 * 	Template part for singular post display
 *  DEFAULT view
 *
 *
 */

$post_type = get_post_type( get_the_ID() );


$post_class_list = 'singular_post';
if( has_post_thumbnail() ) :
	$post_class_list .= ' has_featured_image';
else :
	$post_class_list .= ' no_image';
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class_list ); ?>>
	<header class="post_header">
		<span class="header_post_type_icon content_type <?php esc_html_e( $post_type ); ?>">
			<svg class="icon-content_type">
				<use xlink:href="#CONTENT_TYPE_<?php esc_html_e( $post_type ); ?>"></use>
			</svg>
			<h6>Press Release</h6>
		</span>
		<?php the_title( '<h1 class="post_title">', '</h1>' ); ?>
		<div class="post_date">
			<?php echo get_the_date('M d, Y'); ?>
		</div>

		<?php
		if( has_post_thumbnail() ) :
			echo '<figure class="featured_image">';
			the_post_thumbnail( 'large', array( 'class' => 'simple_parallax_scroll' ) );
			echo '</figure>';
		endif;
		?>


	</header>
	<main class="post_main">
		<?php the_content(); ?>
	</main>
	<footer class="post_footer">
		<?php
		$pdf = get_field( 'pdf' );

		if( $pdf ) {
			$pdf_url = $pdf['url'];
			echo '<div class="centered download_button"><a href="' . esc_url( $pdf_url ) . '" class="button primary_button">Download in PDF format</a></div>';
		}
		?>
		<div class="list_of_all_tags">
			<?php the_tags( '', ' | ', '' ); ?>
		</div>
		<svg class="full_width svg_divider">
			<use xlink:href="#line_divider_option_02" />
		</svg>
	</footer>

</article>
<aside id="supplementary" class="additional_content related_content_container">

	<?php
	igb_display_related_content( get_the_ID(), 'glossary_terms', 'Related Glossary Terms', 25 );
	igb_display_related_content_by_current_tags( get_the_ID(), 'video', 8 );
	igb_display_related_content_by_current_tags( get_the_ID(), 'post', 3, 'Related Blog Posts' );

	// igb_display_related_content( get_the_ID(), 'eduguide', 'Related EduGuides', 5 );

	?>




</aside>

