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

<section class="popular-playlist-section more_content_section more_playlists splide" aria-labelledby="more_content_heading--playlists">
	<header class="section_header more_content_header">
		<h3 id="more_content_heading--playlists"><?php echo $curatedPlaylistHeading; ?></h3>

		<a href="<?php echo $playlistLink; ?>" class='wp-block-button__link wp-element-button secondary_button'>
			<?php echo $allPlaylistButtonLabel; ?>
		</a>
	</header>
	<div class="popular-playlist-slider more_content_slider splide__track">
		<ul class="horizontal_slider splide__list">
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
					<li class="slide background-%s splide__slide" style="background-image: url(\'%s\');">
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
</section>