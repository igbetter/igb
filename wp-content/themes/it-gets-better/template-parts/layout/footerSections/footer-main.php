<div id="mainFooter">
  <a href="/" class="flex dark:hidden">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/footer_logos/footer_logo_default.png" width="285" height="29" alt="It Gets Better Footer Logo"/>
  </a>
  <a href="/" class="hidden dark:flex">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/footer_logos/footer_logo_white.png" width="285" height="29" alt="It Gets Better Footer Logo"/>
  </a>
  <p>
    IT GETS BETTER and IT GETS BETTER PROJECT are registered US trademarks. It Gets Better Project is a registered 501(c)3 organization, and all contributions are tax-deductible to the extent allowed by law. <br/>Copyright Ⓒ 2010 - 2023 It Gets Better Project. All rights reserved.
  </p>
  <?php if ( has_nav_menu( 'menu-2' ) ) : ?>
    <nav aria-label="<?php esc_attr_e( 'Footer Menu', 'it-gets-better' ); ?>">
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'footer-nav',
            'menu_class'     => 'footer-menu ',
            'depth'          => 1,
          )
        );
      ?>
    </nav>
  <?php endif; ?>
  <?php get_template_part('template-parts/layout/footerSections/footer','social');  ?>
</div>