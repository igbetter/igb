<?php
/**
 * 	Template part for singular eduguide (post) display
 *  DEFAULT view
 *
 *
 */
$post_type = get_post_type( get_the_ID() );

$eduguide_downloads = get_field( 'eduguide_pdfs', get_the_ID() );
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

		<?php if( $eduguide_downloads ) :
			$other_langauges = []; ?>
			<section class="eduguide_download_button_container">
				<div class="flex-row">

					<?php foreach ( $eduguide_downloads as $download ):
						$language_select = $download['language'];
						$pdf_array = $download['pdf'];
						$download_id = $pdf_array['ID'];


						if( 'other' === $language_select ) : // "other" language links (don't need gateway or popup. saving to array to print links out below)

							$other_langauges[] = $download;

						else :

							get_template_part( 'template-parts/loop/eduguide-download-button', null,
								array(
									'download_id'	=> $download_id,
									'language'		=> $language_select
								)
							);

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
					  var anchorElement = event.target.closest('a');
					  var originalHref = anchorElement.href;
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


