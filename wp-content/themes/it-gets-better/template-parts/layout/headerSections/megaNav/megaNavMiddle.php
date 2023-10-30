<?php
$megaNavMiddleItems = array(
	(object) [
		'id' => '4469',
		'link' => '#',
		'image' => array(
			'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-1.png',
			'width' => 546,
			'height' => 307
		),
		'label' => 'Resources',
		'submenu' => array(
			(object) [
				'id' => '4473',
				'link' => home_url('/get-help/'),
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-2.png',
					'width' => 685,
					'height' => 385
				),
				'label' => 'Get Help',
			],
			(object) [
				'id' => '4472',
				'link' => home_url('/introducing-imi/'),
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-3.png',
					'width' => 719,
					'height' => 404
				),
				'label' => 'imi: A Mental Health Resource'
			]
		)
	],
	(object) [
		'id' => '4470',
		'link' => '#',
		'image' => array(
			'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-2.png',
			'width' => 685,
			'height' => 385
		),
		'label' => 'Get Involved',
		'submenu' => array(
			(object) [
				'id' => '4473',
				'link' => home_url('/youth-voices'),
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-3.png',
					'width' => 719,
					'height' => 404
				),
				'label' => 'Youth Voices',
			],
			(object) [
				'id' => '4475',
				'link' => home_url('/take-the-pledge'),
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-4.png',
					'width' => 719,
					'height' => 404
				),
				'label' => 'Take the Pledge'
			],
			(object) [
				'id' => '4479',
				'link' =>  home_url('/contribute-content'),
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-3.png',
					'width' => 719,
					'height' => 404
				),
				'label' => 'Contribute Content',
			],
			(object) [
				'id' => '4480',
				'link' => home_url('/fundraising'),
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-2.png',
					'width' => 685,
					'height' => 385
				),
				'label' => 'Fundraising',
			],
			(object) [
				'id' => '4481',
				'link' =>  home_url('/50states-50grants'),
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-2.png',
					'width' => 685,
					'height' => 385
				),
				'label' => '50 States. 50 Grants. 5000 Voices.',
				
			]
		),
	],
	(object) [
		'id' => '4471',
		'link' => '#',
		'image' => array(
			'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-3.png',
			'width' => 719,
			'height' => 404
		),
		'label' => 'About',
		'submenu' => array(
			(object) [
				'id' => '4476',
				'link' =>  home_url() . '/about/',
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-4.png',
					'width' => 719,
					'height' => 404
				),
				'label' => 'About Our Work',
			],
			(object) [
				'id' => '4477',
				'link' =>  home_url() . '/team/',
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-3.png',
					'width' => 719,
					'height' => 404
				),
				'label' => 'Meet the Team'
			],
			(object) [
				'id' => '4478',
				'link' => home_url() . '/financials/',
				'image' => array(
					'url' =>   get_template_directory_uri() . '/dummy/mega-nav/dummy-2.png',
					'width' => 685,
					'height' => 385
				),
				'label' => 'Financials',
			]
		)
	]
);
?>
<?php if($megaNavMiddleItems): ?>
	<ul id="megaNavMiddle" class="megaNavMiddle-menu" aria-label="submenu">
		<li class="back-button-wrapper"><button class="back-button">&#8592; Back</button></li>
		<?php foreach($megaNavMiddleItems as $item): ?>
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
				<?php if($item->submenu): ?>
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
