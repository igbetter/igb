<?php
/**
 * The template for displaying tag results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package It_Gets_Better
 */

get_header();

$playlist = get_queried_object();



$header_image = get_field( 'header_image', $playlist );
$subheading = get_field( 'sub_heading', $playlist );
$description = term_description();
$partnership_byline = get_field( 'partnership_byline', $playlist );
$trailer = get_field( 'trailer', $playlist );
$main_color = get_field( 'main_color', $playlist );
$custom_css = get_field( 'custom_css', $playlist );

$color_class = '';
if( $main_color ) {
	$color_class = 'overlay-' . esc_attr( $main_color['label']);
}
?>

<section id="primary" class="playlist_detail_page" style=" <?php echo $custom_css; ?>">
	<header class="playlist_header">
		<div class="playlist_header_image"
			<?php echo ( !empty( $header_image ) ) ? ' style="background-image: url(' . esc_url( $header_image['url'] ) . ');"' : ''; ?>
		>
		<div class="playlist_header_text">
			<h6 class="playlist_tag">Playlist:</h6>
			<h1><?php echo wp_kses_post( $playlist->name ); ?></h1>
			<?php if( $subheading ) { echo '<h3 class="subhead">' . esc_html( $subheading ) . '</h3>'; } ?>

		</div>

		</div>
	</header>
	<main id="main">
		<div class="playlist_details_row flex-row">
			<div class="playlist_description">
				<p>
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>

			<div class="partnership">
				<?php
				echo wp_kses_post( $partnership_byline );

				if( have_rows( 'partner_logos', $playlist ) ) :
					while( have_rows( 'partner_logos', $playlist ) ) :
						the_row();
						$image = get_sub_field( 'upload_logo', $playlist );
						echo '<img src="' . esc_url( $image[ 'url' ] ) . '" alt="' . esc_attr( $image[ 'alt' ] ) . '" class="partner_logo" />';
					endwhile;
				endif;
				?>

			</div>
		</div>
		<?php if( $trailer ) : ?>
			<div class="series_trailer <?php esc_html_e( $color_class ); ?>">
				<h4>Trailer:</h4>
				<div class="video_container">
					<?php the_field( 'trailer', $playlist ); ?>
				</div>

			</div>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
	  <section class="episode_list_container">
			<?php
				while ( have_posts() ) :
					the_post();
					get_template_part('template-parts/loop/card', 'playlist_episode');
				endwhile;
				wp_reset_postdata();

			?>

		<?php
			else:
				//
			endif;
		?>
      </section>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
