<?php
  $megaNavParallelogramItems = array(
    (object) [
      'id' => '4478',
      'link' => home_url('/global'),
      'label' => 'It Gets Better Global',
    ],
    (object) [
      'id' => '4479',
      'link' => home_url('/education'),
      'label' => 'It Gets Better EDU',
    ]
  );
?>
<?php if($megaNavParallelogramItems): ?>
  <ul id="megaNavParallelogram" class="megaNavParallelogram-menu" aria-label="submenu">
    <?php foreach($megaNavParallelogramItems as $item): ?>
      <li id="menu-item-<?php echo $item->id; ?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?php echo $item->id; ?>">
        <a
          href="<?php echo $item->link; ?>"
        >
          <?php echo $item->label; ?>
        </a>
        <span></span>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>