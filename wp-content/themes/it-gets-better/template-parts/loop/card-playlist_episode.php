<?php /**
 *
 * display of a single video, with description
 */

$episode = get_field( 'episode_number' );
$description = get_field( 'featured_description' );

$post_type = get_post_type( get_the_ID() );

 if( $post_type === 'eduguide' ) {
	get_template_part('template-parts/loop/card', 'eduguide');
 } else {
?>

<article id="cardID-<?php echo get_the_ID(); ?>" class="video_card two_column">
	<div class="description_side">
		<div class="content_container">

		<?php if ( $episode ) : ?>
			<span class="episode_number">
				Episode <?php esc_html_e( $episode ); ?>
			</span>
		<?php endif; ?>
		<?php the_title('<h3>', '</h3>' ); ?>

		<?php if ( $description ) : ?>
			<div class="episode_description">
			<?php echo wp_kses_post( $description ); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
	<div class="video_side">
		<?php echo igb_display_video_embed( get_the_ID(),  'upload_video', 'youtube_link' ) ?>
	</div>
</article>

<?php }