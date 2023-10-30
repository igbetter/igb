<?php 
	$topNav = array(
		'theme_location' => 'utility-nav',
		'menu_id'        => 'topNavMenu',
		'menu_class'	 => 'top-nav-menu px-default',
		'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
	);
?>

<div id="topNav">
  <?php wp_nav_menu($topNav);	?>
</div>
<div id='mobileSearch' class="mobile-search hidden justify-center items-center md:hidden bg-transparent w-full p-4 z-10">
  <div class="inline-flex flex-row items-center justify-center gap-2">
    <?php get_search_form(); ?>
    <a id="searchClose" class="px-4 hover:cursor-pointer w-auto h-auto font-bold text-3xl text-igb-black dark:text-igb-white" href="#">&times;</a>
  </div>   
</div>