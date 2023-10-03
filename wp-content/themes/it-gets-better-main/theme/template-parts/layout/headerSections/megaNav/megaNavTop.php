<?php 
  $megaNavTopItems = array(
    (object) [
      'id' => '4456',
      'link' => home_url('/browse-content'),
      'image' => array(
        'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-1.png',
        'width' => 546,
        'height' => 307
      ),
      'label' => 'Browse Content',
      'submenu' => array(
        (object) [
          'id' => '4457',
          'link' =>  home_url('/browse-content/?postType=video'),
          'image' => array(
            'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-2.png',
            'width' => 685,
            'height' => 385
          ),
          'label' => 'Videos',
        ],
        (object) [
          'id' => '4458',
          'link' =>  home_url('/browse-content/?postType=blog'),
          'image' => array(
            'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-3.png',
            'width' => 719,
            'height' => 404
          ),
          'label' => 'Blogs'
        ]
      )
    ],
    (object) [
      'id' => '4455',
      'link' => home_url('/glossary'),
      'image' => array(
        'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-4.png',
        'width' => 719,
        'height' => 404
      ),
      'label' => 'Glossary',
      'submenu' => array()
    ]
  );
?>
<?php if($megaNavTopItems): ?>
  <ul id="megaNavTop" class="megaNavTop-menu" aria-label="submenu">
    <li class="back-button-wrapper"><button class="back-button">&#8592; Back</button></li>
    <?php foreach($megaNavTopItems as $item): ?>
      <li id="menu-item-<?php echo $item->id; ?>" class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $item->submenu ? 'menu-item-has-children' : ''; ?> menu-item-<?php echo $item->id; ?>">
    
        <a 
          href="<?php echo $item->link; ?>"       
          data-overlay-image="<?php echo $item->image['url']; ?>" 
          data-overlay-height="<?php echo $item->image['height']; ?>" 
          data-overlay-width="<?php echo $item->image['width']; ?>"
        >
          <?php echo $item->label; ?>
        </a>
        <span></span>
        <?php if($item->submenu):  ?>
          <div class="sub-menu-wrapper">
            <ul class="sub-menu">
        	    <?php foreach($item->submenu as $submenu): ?>
                <li id="menu-item-<?php echo $submenu->id; ?>" class="menu-item menu-item-sub menu-item-type-post_type menu-item-object-page menu-item-<?php echo $submenu->id; ?>">
                  <a 
                    href="<?php echo $submenu->link; ?>" 
                    data-overlay-image="<?php echo $submenu->image['url']; ?>" 
                    data-overlay-height="<?php echo $submenu->image['height']; ?>" 
                    data-overlay-width="<?php echo $submenu->image['width']; ?>"
                  >
                    <?php echo $submenu->label; ?>
                  </a>
                  <span></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>