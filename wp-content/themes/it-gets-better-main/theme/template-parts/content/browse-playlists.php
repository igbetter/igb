
<?php
  $playlists = get_terms(
    array(
      'taxonomy' => 'playlist',
      'posts_per_page' => '-1',
      'hide_empty' => true,
      'meta_query' => array(
        'relation' => 'OR',
        array(
           'key'       => 'header_image',
           'value'     => '',
           'compare'   => '!='
        ),
        array(
          'key'       => 'curated_featured_image',
          'value'     => '',
          'compare'   => '!='
       ),
      )  
    )
  );

  $slideTemplate = '<div><a class="curated-playlist-slide" href="%s" style="background-image: url(%s);"><div class="overlay" style="background-color:%s;"></div><span>%s</span></a></div>';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('all-playlists'); ?>>
  <div class="px-default">
    <div class="py-2">
      <h3 class="mb-0">All Playlists</h3>
    </div>
    <div class="archive-cards">
      <?php
        if($playlists):
          foreach($playlists as $playlist):
            $curatedFeaturedImage = esc_url(get_field('curated_featured_image', $playlist)['url']);
            $headerImage = esc_url(get_field('header_image', $playlist)['url']);

            $link = get_term_link($playlist);
            $slug = esc_attr($playlist->slug);
            $name = $playlist->name;
            $image = !empty($curatedFeaturedImage) ? $curatedFeaturedImage : $headerImage;

            echo sprintf($slideTemplate, $link, $image,  $color,  $name);
          endforeach;
        endif;
      ?>
    </div>
  </div>
</article>