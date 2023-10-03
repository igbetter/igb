<!-- Note: Temporary template file only. It will be removed once we utilized the custom blocks. -->
<?php
  $curatedPlaylistHeading = "Browse Guides";
  $allPlaylistButtonLabel = 'All Guides';
  $playlistLink = home_url() . '/';

  $overlay = ['rgba(24,0,132,0.45)', 'rgba(73,183,0,0.32)', 'rgba(193,177,0,0.6)', 'rgba(193,177,0,0.6)', 'rgba(191,0,191,0.5)'];
  $query = array(
    'taxonomy' => 'playlist',
    'number' => 5,
    'hide_empty' => false,
    'meta_query' => array(
      array(
        'key' => 'show_as_curated', 
        'value' => true
      )
    )
  );

  $terms = get_terms($query);

  $slideTemplate = '<div><a class="curated-playlist-slide" href="%s"><img src="%s" width="330" height="150" alt="%s" /><div class="overlay" style="background-color: %s"></div><span>%s</span></a></div>';
?>

<div class="curated-playlist-section alignfull flex flex-col sm:visible my-6">
  <div class='hidden md:flex flex-row justify-between items-center mb-4 px-default'>
    <h3 class="text-igb-purple dark:text-white mb-0">
      <?php echo $curatedPlaylistHeading; ?>
    </h3>
    <a href="<?php echo $playlistLink; ?>" class='wp-block-button__link wp-element-button'>
      <?php echo $allPlaylistButtonLabel; ?>
    </a>
  </div>
  <h2 class="flex md:hidden text-igb-purple dark:text-white mb-0 px-default">
    <?php echo $curatedPlaylistHeading; ?>
  </h2>
  <div class="curated-playlist-slider px-default my-4">
    <?php 
      $count = 0;
      foreach ($terms as $term):
        $image = esc_url(get_field('curated_featured_image', $term)['url']);
        $link = get_term_link($term);
        $slug = esc_attr($term->slug);
        $name = $term->name;
        // $color = get_field('main_color', $term) ? get_field('main_color', $term) :  $overlay[$count];
        $color = $overlay[$count];

        echo sprintf($slideTemplate, $link, $image, $slug, $color, $name);
        $count++;
      endforeach; 
    ?>
  </div>
  <div class="px-default visible md:hidden">
    <a href="<?php echo $playlistLink; ?>" class='wp-block-button__link wp-element-button'>
      <?php echo $allPlaylistButtonLabel; ?>
    </a>
  </div>
</div>