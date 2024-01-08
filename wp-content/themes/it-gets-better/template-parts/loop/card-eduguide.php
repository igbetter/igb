<?php /**
 *
 * display of an EDUguide
 */
$eduguide_download = get_field( 'eduguide_pdf', get_the_ID() );

if( $eduguide_download ) {
	$eduguide_download_file_type = $eduguide_download['subtype'];
	$eduguide_download_size = $eduguide_download['filesize'];
	$eduguide_download_url = $eduguide_download['url'];
}
?>

<article id="cardID-<?php echo get_the_ID(); ?>" class="eduguide_card">

		<div class="content_container">
			<span class="content_type <?php esc_html_e( $post_type ); ?>">
				<svg class="icon-content_type">
					<use xlink:href="#CONTENT_TYPE_eduguide"></use>
				</svg>
			</span>

			<a href="<?php the_permalink(); ?>">
				<?php the_title('<h3 class="eduguide_title"><span>EduGuide:</span> ', '</h3>' ); ?>
			</a>
			<?php the_post_thumbnail(); ?>
			<div class="button_container">
				<a href="<?php the_permalink(); ?>" class="subtle_overlay_button">
					View the EduGuide
				</a>
				<?php if( $eduguide_download ) : ?>
					<a href="<?php echo esc_url( $eduguide_download_url ); ?>" class="primary_button filetype-<?php echo esc_attr( $eduguide_download_file_type ); ?>">
						Download the EduGuide <span class="file_size">(&nbsp;<?php
							echo size_format( filesize( get_attached_file( $eduguide_download['ID'] ) ) );
								 ?>&nbsp;)</span>
					</a>
				<?php endif;?>

			</div>
		</div>

</article>