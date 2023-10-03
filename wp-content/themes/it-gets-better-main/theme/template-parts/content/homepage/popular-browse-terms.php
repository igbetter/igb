<?php
  $popularTermsQuery = array(
    'post_type' => 'glossary',
    'orderby' => 'rand',
    'status' => 'published',
    'posts_per_page' => 11,
    'meta_query'  => array(
      array(
        'key' => 'popular',
        'value' => true
      )
    )
  );

  $results = get_posts($popularTermsQuery);

  $popularBrowseTermsHeading = "Popular Browse Terms";
  $tagTemplate = '<a class="associated-post-tag" style="background-color: %s" href="%s"><span>%s</span></a>';  
  $glossaryLink = home_url('glossary');
?>

<?php if($results): ?>
  <section class="popular-browse-terms">
    <h2 class="section-header">
      <?php echo $popularBrowseTermsHeading; ?>
    </h2>
    <div class="associated-post-tag-wrapper">
      <?php        
        foreach ( $results as $result ) : 
          $color = get_field('border_color', $result->ID);
          $tagLink = get_the_permalink($result);
          $name = get_field('button_text', $result->ID);
          // $name = $result->post_title;
          echo sprintf($tagTemplate, $color, $tagLink, $name);
        endforeach;
      ?>
      <a href="<?php echo $glossaryLink?>" class="associated-post-tag-more-link hidden md:block">
        <span>more...</span>
      </a>

      <a class="associated-post-tag mobile-only bg-white "  href="<?php echo $glossaryLink?>">
        <span class="!text-igb-purple">more...</span>
      </a>
    </div>
  </section>
<?php endif; ?>