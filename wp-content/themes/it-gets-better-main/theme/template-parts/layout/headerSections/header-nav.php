<?php
  $darkModeLogo = esc_url( get_theme_mod( 'it_gets_better_main_logo_dark_mode' ) );
?>

<nav id="siteNavigation" class="px-default py-4 w-full flex justify-between" aria-label="<?php esc_attr_e( 'Main Navigation', 'it-gets-better' ); ?>">
	<?php
    if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
    }
  ?>
  <a href="<?php echo home_url(); ?>" class=" hidden dark:inline-flex">
    <img id="dark-logo-custom" class="logo-custom-dark" src="<?php echo $darkModeLogo; ?>" width='200' height='94' alt="It Gets Better Dark Mode Logo">
  </a>
  <!-- <div class="hidden md:flex flex-row items-center">
    <?php //get_search_form(); ?>
    <a id="mobileMenuToggle" class="mega-menu-toggle" href="#">&nbsp;</a>
  </div> -->
  <div class="flex flex-row items-center" id="buttonWrappers">
    <?php get_search_form(); ?>
    <a id="searchToggle" class="search-toggle" href="#">&nbsp;</a>
    <a id="mobileMenuToggle" class="mega-menu-toggle" href="#">&nbsp;</a>
  </div>
</nav><!-- #site-navigation -->