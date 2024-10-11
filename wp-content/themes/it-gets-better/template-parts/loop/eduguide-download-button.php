<?php /**
 *
 * display EduGuide button (with gated popup)
 */
if( $args['download_id'] ) {
	$download_id = $args['download_id'];
} else {

}
if( $args['language'] ) {
	$language_select = $args['language'];
}
$download_url = wp_get_attachment_url( esc_html( $download_id ) );
$download_button_text = ( 'en' === $language_select ) ? 'Download <span class="lang">(English)</span>' : 'Descargar <span class="lang">(Español)</span>';
$modal_intro_text = ( 'en' === $language_select ) ? 'Sign Up for Educational Resources' : 'Regístrese para obtener recursos educativos';

$formidable_form_modal_anchor = sprintf(
	'<a data-js-action="formidable-form-popup" href="%s" class="primary_button main_eduguide_download_button">
		%s
	</a>',
	esc_url( $download_url ),
	$download_button_text,

);

// the str_replace() here is ensuring that we are NOT using " in the html string. This is necessary for the shortcode to work properly.
$button_html_text = str_replace( '"', '\'', $formidable_form_modal_anchor );

echo do_shortcode( '[frmmodal-content size="large" modal_title="' . $modal_intro_text . '" button_html="' . $button_html_text . '"]' . '[formidable id=6]' . '[/frmmodal-content]' );