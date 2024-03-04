<?php /**
 *
 * display of an EDUguide
 */

 if( isset( $args['eduguide_id'] ) ) :
	$eduguide_id =  $args['eduguide_id'] ;
else :
	$eduguide_id = get_the_ID();
endif;
$eduguide_download = get_field( 'eduguide_pdf', $eduguide_id);

if( $eduguide_download ) {
	$eduguide_download_file_type = $eduguide_download['subtype'];
	$eduguide_download_size = $eduguide_download['filesize'];
	$eduguide_download_url = $eduguide_download['url'];
}
?>

<article id="cardID-<?php echo $eduguide_id ?>" class="eduguide_card">

		<div class="content_container">
			<span class="content_type <?php esc_html_e( $post_type ); ?>">
				<svg class="icon-content_type">
					<use xlink:href="#CONTENT_TYPE_eduguide"></use>
				</svg>
			</span>

			<a href="<?php the_permalink( $eduguide_id ); ?>">
			<h3 class="eduguide_title">
				<span>EduGuide:</span>
				<?php echo get_the_title( $eduguide_id );?>
			</h3>
			</a>
			<?php echo get_the_post_thumbnail( $eduguide_id ); ?>
			<div class="button_container">
				<a href="<?php the_permalink( $eduguide_id ); ?>" class="subtle_overlay_button">
					View the EduGuide
				</a>
				<?php if( $eduguide_download ) : ?>
          <?php
  					$formidable_form_modal_anchor = "<a data-js-action=\"formidable-form-popup\" href=\"" . esc_url( $eduguide_download_url ) . "\" class=\"primary_button filetype-" . esc_attr( $eduguide_download_file_type ) . "\">";
  					$formidable_form_modal_anchor .= "Download the EduGuide";
  					$formidable_form_modal_anchor .= "<span class=\"file_size\">(&nbsp;";
  					$formidable_form_modal_anchor .= size_format( filesize( get_attached_file( $eduguide_download['ID'] ) ) );
  					$formidable_form_modal_anchor .= "&nbsp;)</span></a>";
  					echo do_shortcode( '[frmmodal-content size="large" button_html="<a data-js-action=\'formidable-form-popup\' class=\'primary_button filetype-' . esc_attr( $eduguide_download_file_type ) . '\' href=\'' . esc_url( $eduguide_download_url ) . '\'>Download the EduGuide<span class=\'file_size\'>(&nbsp;' . size_format( filesize( get_attached_file( $eduguide_download['ID'] ) ) ) . '&nbsp;)</span></a>"]' . '[formidable id=6]' . '[/frmmodal-content]' );
          ?>
				<?php endif;?>
			</div>
		</div>

</article>