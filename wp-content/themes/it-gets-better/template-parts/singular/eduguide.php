<?php
/**
 * 	Template part for singular eduguide (post) display
 *  DEFAULT view
 *
 *
 */
$post_type = get_post_type( get_the_ID() );

$eduguide_download = get_field( 'eduguide_pdf', get_the_ID() );
if( $eduguide_download ) {
	$eduguide_download_file_type = $eduguide_download['subtype'];
	$eduguide_download_size = $eduguide_download['filesize'];
	$eduguide_download_url = $eduguide_download['url'];
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
		<?php if( $eduguide_download ) : ?>
			<?php
				$formidable_form_modal_anchor = "<a data-js-action=\"formidable-form-popup\" href=\"" . esc_url( $eduguide_download_url ) . "\" class=\"primary_button main_eduguide_download_button filetype--" . esc_attr( $eduguide_download_file_type ) . "\">";
				$formidable_form_modal_anchor .= "Download the EduGuide";
				$formidable_form_modal_anchor .= "<span class=\"file_size\">(&nbsp;";
				$formidable_form_modal_anchor .= size_format( filesize( get_attached_file( $eduguide_download['ID'] ) ) );
				$formidable_form_modal_anchor .= "&nbsp;)</span></a>";
				echo do_shortcode( '[frmmodal-content size="large" button_html="<a data-js-action=\'formidable-form-popup\' class=\'primary_button filetype-' . esc_attr( $eduguide_download_file_type ) . '\' href=\'' . esc_url( $eduguide_download_url ) . '\'>Download the EduGuide<span class=\'file_size\'>(&nbsp;' . size_format( filesize( get_attached_file( $eduguide_download['ID'] ) ) ) . '&nbsp;)</span></a>"]' . '[formidable id=6]' . '[/frmmodal-content]' );
			?>
			<script type="text/javascript">
			  document.addEventListener('DOMContentLoaded', function () {
			    // Find all elements with data-js-action="formidable-form-popup"
			    var formidableFormPopups = document.querySelectorAll('[data-js-action="formidable-form-popup"]');

			    // Add click event listener to each matching element
			    formidableFormPopups.forEach(function (element) {
			      element.addEventListener('click', function (event) {
			        // Get the value of data-bs-target attribute
			        var targetId = event.target.getAttribute('data-bs-target').replace(/#/g, '');

			        // Find the div with the specified ID
			        var targetDiv = document.getElementById(targetId);

			        // Check if the div and the child input field exist
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


