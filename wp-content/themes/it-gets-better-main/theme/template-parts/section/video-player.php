<?php
  $backgroundColors = ['bg-igb-purple','bg-igb-pink','bg-igb-blue'];
  $tagTemplate = '<a class="associated-post-tag %s" href="%s"><span>%s</span></a>';  
  $tags = get_the_tags();

  $filteredArray = array();
  
  if($tags) {
    $filteredArray = array_filter($tags, function ($var) {
      return strlen($var->name) < 10 && !str_contains($str, ' ');
    });
  }
?>
<div class="featured-video-wrapper-section">
  <div class="featured-video-content">
    <div class="video-content">
      <div class="featured-video-wrapper">
        <?php the_field('youtube_link'); ?>
      </div>

      <div class="info-and-share-section" class="hidden">
        <div>
          <?php if($tags): ?>
            <div class="associated-post-tag-wrapper">
              <?php 
                $count = 0;
                foreach(array_slice($filteredArray, 0, 2) as $tag ) :
                  $color = $backgroundColors[$count];
                  $tagLink = get_tag_link($tag);
                  $name = $tag->name;

                  echo sprintf($tagTemplate, $color, $tagLink, $name);
                  $count++;
                endforeach;
              ?>
              <div class="all-tags-dropdown">
                <span class="popover-wrapper">
                  <a href="#" data-role="popover" data-popover="true" data-contentElement="#<?php echo "card-" . $id . "-popover"; ?>" class="associated-post-tag-more-link" data-placement="auto">
                    <span>&hellip;</span>
                  </a>
                  <div class="popover-modal" id="<?php echo "card-" . $id . "-popover"; ?>">
                    <div class="popover-body">
                      <p>Tags</p>
                      <ul>
                        <?php foreach($tags as $tag): ?>
                          <li>
                            <a href="<?php echo get_tag_link($tag->term_id); ?>">
                              <?php echo $tag->name; ?>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </span>
              </div>
            </div>
          <?php endif; ?>
          <h1><?php the_title(); ?></h1>
          <?php if(the_field('featured_description')): ?>
            <p><?php the_field('featured_description'); ?></p>
          <?php endif;?>
        </div>
        <div class="hidden lg:block">
          <?php get_template_part( 'template-parts/section/social','share-links');  ?>
        </div>
      </div>
    </div>
    <div class="blpck lg:hidden">
      <?php get_template_part( 'template-parts/section/social','share-links');  ?>
    </div>
  </div>
</div>