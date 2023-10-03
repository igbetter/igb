<?php
  $termGroup = isset($_GET['termGroup']) ? $_GET['termGroup'] : null;
  $term = isset($_GET['term']) ? $_GET['term'] : null;

  $glossariesQuery = array(
    'post_type' => 'glossary',
    'orderby'   => 'rand',
    'status'    => 'published',
    'posts_per_page' => 4,
  );

  if($termGroup) {
    $glossariesQuery = array_merge(
      $glossariesQuery, array(
        'tax_query' => array(
          array(
            'taxonomy' => 'term-category',
            'field' => 'slug',
            'terms' => $termGroup,
          )
        )
      )
    );
  }

  if($term) {
    $glossariesQuery = array_merge(
      $glossariesQuery, array(
        "s" => $term
      )
    );
  }

  $glossaries = get_posts($glossariesQuery);
  $glossaryLink = home_url('glossary');
  $heading = $term === null ? "Explore the Terms" : "Related Glossary Terms";
?>

<?php if($glossaries): ?>
  <section class="lg:mb-16">
    <div class="flex justify-between items-center mb-6">
      <h2 class="section-header"><?php echo $heading; ?></h2>
      <a href="<?php echo $glossaryLink; ?>" class="ml-auto hidden md:block wp-block-button__link wp-element-button">
        Go to the Glossary
      </a>
    </div>
    <div class="glossary-slider">
      <?php 
        foreach($glossaries as $glossary): 
          $id = $glossary->ID;
          get_template_part('template-parts/content/cards/browse', 'glossary-card');
        endforeach;
      ?>
    </div>
    <div class="md:hidden py-2">
      <a href="<?php echo $glossaryLink; ?>" class="w-full wp-block-button__link wp-element-button">
        Go to the Glossary
      </a>
    </div>

  </section>
<?php endif; ?>