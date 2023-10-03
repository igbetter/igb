<?php 
  $footerBottomNavProps = array(
    'theme_location' => 'legal-nav',
    'container' => false,
  );
?>

<div id="footerBottom" class="bg-white dark:bg-igb-darkmode-textblack p-4">
  <div class="flex justify-center flex-col md:flex-row text-center text-sm text-igb-black dark:text-white gap-2">
    <?php wp_nav_menu($footerBottomNavProps); ?>
  </div>
</div>