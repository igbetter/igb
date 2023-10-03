<?php
  $megaNavFooterItems = array(
    (object) [
      'id' => '4480',
      'link' => home_url() . '/shop',
      'label' => 'Shop',
    ],
    (object) [
      'id' => '4481',
      'link' => 'https://give.itgetsbetter.wpengine.com/give/250737/#!/donation/checkout',
      'label' => 'Donate',
    ]
  );
?>
<?php if($megaNavFooterItems): ?>
  <ul id="megaNavFooter" class="megaNavFooter-menu md:bg-red" aria-label="submenu">
    <?php foreach($megaNavFooterItems as $item): ?>
      <li id="menu-item-<?php echo $item->id; ?>" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-<?php echo $item->id; ?>">
        <a href="<?php echo $item->link; ?>"><?php echo $item->label; ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>