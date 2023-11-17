<?php if ($is_preview && !empty($block['data'])) : ?>
	<img loading="lazy" src="<?php echo get_template_directory_uri().'/acf_blocks/playlist-slider-block/preview.png'; ?>">
<?php else: ?>
  <?php
  $overlay = [ 'rgba(24,0,132,0.45)', 'rgba(73,183,0,0.32)', 'rgba(193,177,0,0.6)', 'rgba(193,177,0,0.6)', 'rgba(191,0,191,0.5)' ];
  $slideTemplate = '<div><a class="curated-playlist-slide" href="%s" style="background-image: url(%s);"><div class="overlay" style="background-color:%s;"></div><span>%s</span></a></div>';

  $sectionHeader = get_field('section_header');
  $learnMoreLink = get_field('learn_more_link');
  $behavior = get_field('behavior');

  $results = array();

  if($behavior === 'curated') {
    $useCuratedQuery = get_field('use_curated_query');
    $results = get_terms(
      array(
        'taxonomy' => 'playlist',
        'number' => $useCuratedQuery['playlist_limit'],
        'hide_empty' => false,
        'meta_query' => array(
          array(
            'key' => 'show_as_curated', 
            'value' => true
          )
        )
      )
    );
  }
  else {
    $pickedPlaylist = get_field('pick_playlist_manually');

    foreach($pickedPlaylist['playlists'] as $picked) {
      array_push($results, $picked['playlist']);
    }
  }
?>

<div class="curated-playlist-section alignfull flex flex-col sm:visible my-6">
  <div class='hidden md:flex flex-row justify-between items-center mb-4 px-default'>
    <h3 class="text-igb-purple dark:text-white mb-0">
      <?php echo $sectionHeader ; ?>
    </h3>
    <?php if($learnMoreLink): ?>
      <a href="<?php echo $learnMoreLink['url']; ?>" class='wp-block-button__link wp-element-button'>
        <?php echo $learnMoreLink['title']; ?>
      </a>
    <?php endif; ?>
  </div>
  <h2 class="flex md:hidden text-igb-purple dark:text-white mb-0 px-default">
    <?php echo $sectionHeader; ?>
  </h2>
  <div class="curated-playlist-slider px-default my-4">
    <?php 
      if($results): 
        $count = 0;
        foreach ($results as $term):
          $image = esc_url(get_field('curated_featured_image', $term)['url']);
          $link = get_term_link($term);
          $slug = esc_attr($term->slug);
          $name = $term->name;
          $color = $overlay[$count > 4 ? $count % 5 : $count];

          echo sprintf($slideTemplate, $link, $image,  $color,  $name);
          $count++;
        endforeach; 
      endif;
    ?>
  </div>
  <div class="px-default visible md:hidden">
    <?php if($learnMoreLink): ?>
      <a href="<?php echo $learnMoreLink['url']; ?>" class='wp-block-button__link wp-element-button'>
        <?php echo $learnMoreLink['title']; ?>
      </a>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>




