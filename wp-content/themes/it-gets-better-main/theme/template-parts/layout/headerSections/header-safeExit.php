<?php if( get_theme_mod ('safe_exit_url') !== "" && get_theme_mod('safe_exit_url_text') !== "" ): ?>
  <div id="safeExit" class="safe-exit-button">
    <a href="<?php echo get_theme_mod( 'safe_exit_url'); ?>" target="_self">
      <span class="flex">Safe Exit
        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11 1C11 0.447715 10.5523 -7.91831e-09 10 3.42285e-08L1 -5.00652e-08C0.447715 -5.00652e-08 1.73698e-07 0.447715 1.73698e-07 1C1.73698e-07 1.55228 0.447715 2 1 2L9 2L9 10C9 10.5523 9.44772 11 10 11C10.5523 11 11 10.5523 11 10L11 1ZM1.29289 8.29289C0.902369 8.68342 0.902369 9.31658 1.29289 9.70711C1.68342 10.0976 2.31658 10.0976 2.70711 9.70711L1.29289 8.29289ZM9.29289 0.292893L1.29289 8.29289L2.70711 9.70711L10.7071 1.70711L9.29289 0.292893Z" fill="white"/>
        </svg>
      </span>
    </a>
  </div>
<?php endif; ?>

