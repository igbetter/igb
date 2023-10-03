<?php
  $borderColor = get_field('border_color', $id);
  $definitionField = get_field('definition', $id);
  $type = substr($definitionField, 0, strpos($definitionField, "."));
  $definition = substr($definitionField, strpos($definitionField, ".") + 1, strlen($definitionField));

  $splittedTypes = explode(", ", $type);
  $convertedTypes = array();
  $types = array("noun" => "n.", "verb" => "v.", "adjective" => "adj.", "adjectives" => "adj." );
  
  foreach($splittedTypes as $str) {
    if($str !== "") {
      array_push($convertedTypes, $types[strtolower($str)]);
    }
  }
?>
<div>
  <div class="glossary-card">
    <div class="content">
      <h3>
        <?php echo get_the_title($id); ?>
        <?php if($convertedTypes):?>
          <span>(<?php echo join(", ", $convertedTypes); ?>)</span>
        <?php endif; ?>
      </h3>
      <p><?php echo $definition; ?></p>
      <a href="<?php echo get_the_permalink($id); ?>" class="wp-block-button__link wp-element-button">
        Learn More
      </a>
    </div>
    <div class="border-color" style="background-color: <?php echo $borderColor; ?>"></div>
  </div>

</div>
