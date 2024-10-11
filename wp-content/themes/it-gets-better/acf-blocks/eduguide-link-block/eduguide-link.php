<?php
/**
 * 	block to highlight and link to an eduguide. similar to the
 * 	text/media block, with additional options and includes gated download links
 *
 */

 // Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'eduguide_link_section';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// acf values
$eduguide_link = get_field( 'eduguide_link' );
$link_id = $eduguide_link[0]->ID;
$eduguide_description = get_field( 'eduguide_description' );

$page_title_override = get_field( 'override_page_title' );
if( $page_title_override === true ) {
	// override page title
	$link_title = get_field( 'link_title' );
} else {
	$link_title = $eduguide_link[0]->post_title;
}

$featured_image_override = get_field( 'featured_image_override' );
if ( $featured_image_override === true ) {

	$image = get_field( 'new_featured_image' );
} else {

	$image = get_the_post_thumbnail_url( $link_id, 'large' );
}


?>
<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> eduguide_link_block">
	<div class="eduguide_link-container">
		<div class="eduguide_link-image_container eduguide_thumbnail" aria-hidden="true">
			<?php if( $image ) : ?>
				<img src="<?php echo esc_url( $image ); ?>" class="eduguide_link_thumbnail" />
			<?php endif; ?>
		</div>
		<div class="eduguide_link-text_container">
			<h6>EduGuide:</h6>
			<a href="<?php echo esc_url( get_the_permalink( $link_id ) ); ?>">
				<h3 class="eduguide_title">
					<?php echo wp_kses_post( $link_title ); ?> <span> &raquo; </span>
				</h3>
			</a>
			<?php if( $eduguide_description ) : ?>
				<div class="eduguide_description">
					<?php echo wp_kses_post( $eduguide_description ); ?>
				</div>
			<?php endif; ?>
			<section class="eduguide_download_button_container">
				<div class="flex-row">
					<a href="<?php echo esc_url( get_the_permalink( $link_id ) ); ?>" class="subtle_overlay_button">View the EduGuide &raquo;</a>
					<?php
					$eduguide_downloads = get_field( 'eduguide_pdfs', $link_id );

					if( $eduguide_downloads ) :

						foreach( $eduguide_downloads as $download ) :
							$language_select = $download['language'];
							$pdf_array = $download['pdf'];
							$download_id = $pdf_array['ID'];

							if( 'other' === $language_select ) : // we're not displaying other languages here. ignore them.
							else :
								get_template_part( 'template-parts/loop/eduguide-download-button', null,
									array(
										'download_id'	=> $download_id,
										'language'		=> $language_select
									)
								 );

							endif;
						endforeach;
					endif; ?>
				</div>
			</section>
		</div>
	</div>

</section>