<?php /**
 *
 * display of an EDUguide
 */

if( isset( $args['eduguide_id'] ) ) :
	$eduguide_id =  $args['eduguide_id'] ;
else :
	$eduguide_id = get_the_ID();
endif;
$eduguide_downloads = get_field( 'eduguide_pdfs', $eduguide_id); ?>

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
				<span>&raquo;</span>
			</h3>
			</a>
			<?php echo get_the_post_thumbnail( $eduguide_id ); ?>

		</div>

</article>