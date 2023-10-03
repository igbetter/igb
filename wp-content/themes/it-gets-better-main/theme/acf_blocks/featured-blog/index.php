<?php if ($is_preview && !empty($block['data'])) : ?>
	<img loading="lazy" src="<?php echo get_template_directory_uri().'/acf_blocks/featured-blog/preview.png'; ?>" style="width:100%;height:auto;">
<?php else: ?>
  <?php 
    $behavior = get_field('behavior');
    $id = "";

    if($behavior === 'use_default') {
      $featured_blog = wp_get_recent_posts(
        array(
          'numberposts' => 1,
          'post_status' => 'publish',
          'meta_key'         => 'featured_blog_post',
          'meta_value'       => true,
        )
      );
 

      $result = get_posts(
        array(
          "post_type" => "post",
          "posts_per_page" => 1,
          "status" => "published",
          "meta_query" => array(   
            'meta_key' => 'featured_blog_post',
            'meta_value' => true
          )
        )
      );
      
      $id = $result[0]->ID;
    }
    else {
      $id = get_field('selected_blog');
    }
  

    $bgImage =  get_the_post_thumbnail_url($id,"full");
    $title = get_the_title($id);
    $description = get_the_excerpt($id);
    $permalink = get_permalink($id);
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
<?php endif; ?>