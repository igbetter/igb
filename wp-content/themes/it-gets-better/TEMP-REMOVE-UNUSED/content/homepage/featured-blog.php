<?php 
  $featured_blog = wp_get_recent_posts(
    array(
      'numberposts' => 1, // Number of recent posts thumbnails to display
      'post_status' => 'publish', // Show only the published posts
      'meta_key'         => 'featured_blog_post',
      'meta_value'       => true,
    )
  );

  $query = array(
    "post_type" => "post",
    "posts_per_page" => 1,
    "status" => "published",
    "meta_query" => array(
      array(   
        'meta_key' => 'featured_blog_post',
        'meta_value' => true
      )
    )
  );

  $result = get_posts($query);

  foreach( $result as $item ) :    
    $bgImage =  get_the_post_thumbnail_url($item->ID,"full");
    $title = get_the_title($item->ID);
    $description = get_the_excerpt($item->ID);
    $permalink = get_permalink($item->ID);
?>
    <div class="featured-blog-wrapper">
      <div class="image-container" style="background-image: url('<?php echo $bgImage;?>')"></div>
      <div class="featured-blog-section coblocks-animate slideInRight">
        <div class="featured-blog-inner">
          <div>
            <h4>Featured Blog</h4>
            <h2><?php echo $title; ?></h2>
            <p><?php echo $description; ?></p>
            <a href="<?php echo $permalink; ?>" class="wp-block-button__link wp-element-button">Go to the blog</a>
          </div>
        </div>
      </div>
    </div>
<?php endforeach; ?>