<?php
  $id = get_the_ID();
  $postTags = get_the_tags(); 
  $tagTemplate = '<a class="associated-post-tag %s"  href="%s"><span>%s</span></a>';  

  $type = get_post_type($id) === 'video' ? 'video' : 'article';
  $thumbnail =  get_the_post_thumbnail_url($id) ?  get_the_post_thumbnail_url($id) : get_template_directory_uri() . '/icons/placeholder.svg';
  $backgroundColors = ['bg-igb-purple', 'bg-igb-pink'];

  $filteredArray = array();
  
  if($postTags) {
    $filteredArray = array_filter($postTags, function ($var) {
      return strlen($var->name) < 10 && !str_contains($str, ' ');
    });
  }
?>
<div class="cards card-<?php echo $type; ?>">
  <div class="thumbnail-and-indicator">
    <a class="text-igb-purple font-semibold dark:text-white" href="<?php echo get_the_permalink($id); ?>">
      <div>
        <div class="thumbnail" style="background-image: url(<?php echo $thumbnail; ?>);"></div>
        <div class="indicator"></div>
      </div>  
    </a>
    <?php if (!empty($filteredArray)): ?>
      <div class="associated-post-tag-wrapper">
        <?php 
          $count = 0;
          foreach(array_slice($filteredArray, 0, 2) as $tag) :
            $color = $backgroundColors[$count];
            $tagLink = get_tag_link($tag->term_id);
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
                  <?php foreach($postTags as $tag): ?>
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
  </div>
  <a class="text-igb-purple font-semibold dark:text-white" href="<?php echo get_the_permalink($id); ?>">
    <?php echo get_the_title($id); ?>
  </a>
</div>
