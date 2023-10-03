<?php
  $darkLogo = get_theme_mod('it_gets_better_main_logo_dark_mode');
$megaNavMainProps =  array(
    'theme_location' => 'mega-nav-main',
			'container'      => 'span',
			'menu_class'     => 'mega_menu header main-navigation',
			'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'walker'		 => new Aria_Walker_Nav_Menu(),
);

  // $megaNavMiddleProps = array(
  //   'theme_location' => 'mega-nav-middle',
  //   'menu_id' => 'megaNavMiddle',
  //   'menu_class' => 'megaNavMiddle-menu',
  //   'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
  //   'container' => false,
  //   'walker' => new Meganav_Walker(),
  // );

  // $megaNavParallelogramProps = array(
  //   'theme_location' => 'mega-nav-bottom',
  //   'menu_id' => 'megaNavParallelogram',
  //   'menu_class' => 'megaNavParallelogram-menu',
  //   'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
  //   'container' => false,
  //   'walker' => new Meganav_Walker(),
  // );

  // $megaNavBottomProps = array(
  //   'theme_location' => 'mega-nav-footer',
  //   'menu_id' => 'megaNavFooter',
  //   'menu_class' => 'megaNavFooter-menu md:bg-red',
  //   'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
  //   'container' => false
  // );
?>


<nav id="megaNav" class="hidden top-0 flex-col items-start w-screen h-screen z-[9999] m-0 bg-igb-purple dark:bg-igb-black px-default p-4 text-igb-white">
	<?php if($darkLogo): ?>
		<img src="<?php echo $darkLogo;?>" alt="" class="mega-nav-dark-logo" />
	<?php endif; ?>
	<a href='#' id="closeNav" class='absolute top-8 right-8 text-2xl font-bold text-white'>&#x2715;</a>
	<div class="flex megaNav-menu-wrapper">
		<div class="flex justify-content flex-col w-full">

		<?php wp_nav_menu( $megaNavMainProps ); ?>
		<?php get_template_part('template-parts/layout/headerSections/megaNav/megaNavParallelogram'); ?>
		<?php get_template_part('template-parts/layout/headerSections/megaNav/megaNavFooter'); ?>
		</div>
	</div>
</nav>
