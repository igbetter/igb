<?php
/**
 * 	Template part for singular eduguide (post) display
 *  DEFAULT view
 *
 *
 */
$post_type = get_post_type( get_the_ID() );

$eduguide_downloads = get_field( 'eduguide_pdfs', get_the_ID() );
if( $eduguide_downloads ) {

//	$eduguide_download_file_type = $eduguide_download['subtype'];
//	$eduguide_download_size = $eduguide_download['filesize'];
//	$eduguide_download_url = $eduguide_download['url'];
}


 $post_class_list = 'singular_eduguide';
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
			<h6>EduGuide</h6>
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

		<?php echo igb_display_related_glossary_term_tags( get_the_ID(), 'blog_post' ); ?>

		<!--

		**** for a8c:
			this is where the popup gateway is to be added. the code within the `if( $eduguide_downloads )` section is
			only displaying the buttons from the ACF fields (a repeater), and not connected to the formidable forms popup
			as it should.
	-->
		<?php if( $eduguide_downloads ) :
			$other_langauges = []; ?>
			<section class="eduguide_download_button_container">
				<div class="flex-row">
					<?php foreach ( $eduguide_downloads as $download ):
						$language_select = $download['language'];
						$pdf_array = $download['pdf'];

						if( 'en' === $language_select ) : // english download button
							$download_button_text = 'Download <span class="lang">(English)</span>';
							$language = 'en';
							$formidable_form_modal_anchor = sprintf(
								'<a data-js-action="formidable-form-popup" href="%s" data-bs-target="frm-modal-0" class="primary_button main_eduguide_download_button lang-%s">
									%s
									<span class="file_size">%s</span>
								</a>',
								esc_url( $pdf_array['url'] ),
								$language,
								$download_button_text,
								size_format( filesize( get_attached_file( $pdf_array['ID'] ) ) )
							);
							
							echo do_shortcode( '[frmmodal-content size="large" modal_title="Sign Up for Educational Resources" button_html="'.str_replace('"', '\'', $formidable_form_modal_anchor).'"]' . '[formidable id=6]' . '[/frmmodal-content]' );
						endif;

						if( 'es' === $language_select ) : // spanish download button
							$download_button_text = 'Descargar <span class="lang">(Español)</span>';
							$language = 'es';
							printf(
								'<a data-js-action="formidable-form-popup" href="%s" class="primary_button main_eduguide_download_button lang-%s">
									%s
									<span class="file_size">%s</span>
								</a>',
								esc_url( $pdf_array['url'] ),
								$language,
								$download_button_text,
								size_format( filesize( get_attached_file( $pdf_array['ID'] ) ) )
							);
						endif;

						if( 'other' === $language_select ) : // "other" language links (don't need gateway or popup. saving to array to print links out below)

							$other_langauges[] = $download;

						else :

							$file_id = $pdf_array['ID'];

							igb_display_eduguide_download_button( $language_select, $file_id );

						endif;
						?>

					<?php endforeach; ?>
				</div>

				<?php if( count( $other_langauges ) > 0 ) : $i=1; // there's other languages ?>
					<div class="additional_languages">
						Also available in:
						<?php foreach( $other_langauges as $other_langauge ) {
							$language_name = $other_langauge['other_langauge'];
							$download_url = $other_langauge['pdf']['url'];

							printf(
								' <a href="%s" alt="Download %s guide">%s</a> ',
								esc_url( $download_url ),
								esc_html( $language_name ),
								esc_html( $language_name )
							);

							if( $i < count( $other_langauges ) ) {
								echo ' &nbsp;&bull;&nbsp; ';
							}
							$i++;

						} ?>
					</div>
				<?php endif; ?>
			</section>

			<?php
			//  *** CODE SAVED FROM CURRENT LIVE VERSION. REMOVE ONCE COMPLETE ***
			//	$formidable_form_modal_anchor = "<a data-js-action=\"formidable-form-popup\" href=\"" . esc_url( $eduguide_download_url ) . "\" class=\"primary_button main_eduguide_download_button filetype--" . esc_attr( $eduguide_download_file_type ) . "\">";
			//	$formidable_form_modal_anchor .= "Download the EduGuide";
			//	$formidable_form_modal_anchor .= "<span class=\"file_size\">(&nbsp;";
			//	$formidable_form_modal_anchor .= size_format( filesize( get_attached_file( $eduguide_download['ID'] ) ) );
			//	$formidable_form_modal_anchor .= "&nbsp;)</span></a>";
			//	echo do_shortcode( '[frmmodal-content size="large" modal_title="Sign Up for Educational Resources" button_html="<a data-js-action=\'formidable-form-popup\' class=\'primary_button filetype-' . esc_attr( $eduguide_download_file_type ) . '\' href=\'' . esc_url( $eduguide_download_url ) . '\'>Download the EduGuide<span class=\'file_size\'>(&nbsp;' . size_format( filesize( get_attached_file( $eduguide_download['ID'] ) ) ) . '&nbsp;)</span></a>"]' . '[formidable id=6]' . '[/frmmodal-content]' );
			//  *** END PREVIOUS CODE TO DELETE LATER ***
			?>
			<script type="text/javascript">
			  document.addEventListener('DOMContentLoaded', function () {
			    // Find all elements with data-js-action="formidable-form-popup"
			    var formidableFormPopups = document.querySelectorAll('[data-js-action="formidable-form-popup"]');

			    // Add click event listener to each matching element
			    formidableFormPopups.forEach(function (element) {
			      element.addEventListener('click', function (event) {

					// Get the value of data-bs-target attribute
					// This is the ID of the modal that will be opened
					var targetPopupID = event.target.closest('a').getAttribute('data-bs-target').replace('#', '');

			        // Find the div/modal with the specified ID that we are looking for
			        var targetDiv = document.getElementById(targetPopupID);

			        // Check if the div/modal has the hidden input field we are looking for, and if it does, set the value of the input field to the original href
			        if (targetDiv && targetDiv.querySelector('input#field_pdf_asset_redirect')) {
			          // Get the original anchor's href
			          var originalHref = event.target.href;

			          // Set the value attribute of the input field to the original href
			          targetDiv.querySelector('input#field_pdf_asset_redirect').value = originalHref;
			        }
			      });
			    });
			  });
			</script>
		<?php endif;?>
	</header>
	<main class="post_main">
		<?php the_content(); ?>
	</main>
	<footer class="post_footer">
		<div class="list_of_all_tags">
			<?php the_tags( '', ' | ', '' ); ?>
		</div>
		<svg class="full_width svg_divider">
			<use xlink:href="#line_divider_option_02" />
		</svg>
	</footer>

</article>


