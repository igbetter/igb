<!-- Note: Temporary template file only. It will be removed once we utilized the custom blocks. -->
<?php
$curatedPlaylistHeading = "Popular Playlists";
$allPlaylistButtonLabel = 'All Playlists';
$playlistLink = home_url('/playlists');
$query = array(
	'taxonomy' => 'playlist',
	'number' => 7,
	'hide_empty' => false,
    'meta_query' => array(
		array(
			'key' => 'show_as_curated',
			'value' => true
		)
	)
);

$terms = get_terms($query);
?>

<section class="popular-playlist-section more_content_section more_playlists">
	<header class="section_header more_content_header">
		<h3><?php echo $curatedPlaylistHeading; ?></h3>

		<a href="<?php echo $playlistLink; ?>" class='wp-block-button__link secondary_button'>
			<?php echo $allPlaylistButtonLabel; ?>
		</a>
	</header>
	<div class="popular-playlist-slider more_content_slider horizontal_fade">
		<ul class="horizontal_slider">
			<li class="spacer"></li>
		<?php
			foreach ($terms as $term):
				$imagearray = get_field ( 'header_image', 'term_' . $term->term_id );
				$image = ($imagearray != '' ) ? esc_url( $imagearray['url'] ) : '';
				$link = get_term_link($term);
				$slug = esc_attr( $term->slug );
				$name = esc_html( $term->name );
				$colorarray = get_field( 'main_color', 'term_' . $term->term_id);
				$color = ( $colorarray != '' ) ?  esc_html( $colorarray['label'] ) : 'default';

				printf( '
					<li class="slide background-%s" style="background-image: url(\'%s\');">
						<a href="%s" class="slide_content overlay-%s">
							<span>%s</span>
						</a>
					</li>',
					$color,
					$image,
					$link,
					$color,
					$name
				);
			endforeach;
			?>
		</ul>
	</div>
	<footer class="section_footer more_content_footer">
		<a href="<?php echo $playlistLink; ?>" class='wp-block-button__link primary_button'>
			<?php echo $allPlaylistButtonLabel; ?>
		</a>
	</footer>
</section>