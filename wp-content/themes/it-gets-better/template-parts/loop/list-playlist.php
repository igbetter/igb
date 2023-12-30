<?php /**
 *
 * loop through playlists (playlist archive page)
 */

$playlist_id = $args['playlist_id'];
$playlist_id_formatted = 'playlist_' . $playlist_id; // for acf fields
$playlist_object = get_term( $playlist_id );

$header_image = get_field( 'header_image', $playlist_id_formatted );
$main_color = get_field( 'main_color', $playlist_id_formatted );
$subhead = get_field( 'sub_heading', $playlist_id_formatted );

if( is_array( $header_image ) ) :
	$header_image = $header_image['url'];
endif;
$playlist_color_highlight = '';
if( $main_color ) {
	$playlist_color_highlight = 'underline-';
	if( is_array( $main_color ) ) :
		$playlist_color_highlight .= $main_color['label'];
	else :
		$playlist_color_highlight .= $main_color;
	endif;
}

?>

<article id="playlist_ID-<?php echo esc_attr($playlist_id ); ?>" class="single_playlist <?php echo esc_attr( $playlist_color_highlight ); ?>"  style="background-image: url('<?php echo esc_url( $header_image ) ?>');">
<div class="two_column container">
	<div class="col_one">
	<header class="single_playlist_header">

		<h3 class="playlist">
			<a href="/playlist/<?php echo esc_attr( $playlist_object->slug ); ?>">
			<span class="subhead"><?php echo esc_html( $subhead ); ?></span>
			<?php echo esc_html( $playlist_object->name ); ?>
			</a>
		</h3>
	</header>
	<main class="playlist_main">

		<p class="playlist_description">
			<?php echo wp_kses_post( $playlist_object->description ); ?>
		</p>
	</main>
	</div>
		<aside class="col_two">

		</aside>
	</div>

</article>
