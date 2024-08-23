const igbDarkMode = {
  init() {
    this.setInitialMode();
    this.changeListener();
    this.tabindexListener();
  },

  /**
   * Set initial mode based on localStorage
   */
  setInitialMode() {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    document.querySelector('body').classList.toggle('theme-light', !isDarkMode);
    document.querySelector('body').classList.toggle('theme-dark', isDarkMode);

    const $darkToggles = document.querySelectorAll('.darkmode_switch input[type="checkbox"]');
    $darkToggles.forEach($t => {
      $t.checked = isDarkMode;
    });
  },

  /**
   * Change listener for dark mode toggle
   */
  changeListener() {
    const $darkToggles = document.querySelectorAll('.darkmode_switch input[type="checkbox"]');
    if ($darkToggles.length <= 0) { return; }

    $darkToggles.forEach(($t) => {
      $t.addEventListener('change', (e) => {
        this.toggle(e.currentTarget.checked);
      });
    });
  },

  /**
   * Keyboard listener for dark mode toggle
   */
  tabindexListener() {
    const $darkSwitches = document.querySelectorAll('.switch__input');

    $darkSwitches.forEach(($s) => {
      $s.addEventListener('keyup', (e) => {
        if (e.key === 'Enter' || e.keyCode === 13) {
          const $checkbox = e.currentTarget.closest('.darkmode_switch').querySelector('input[type="checkbox"]');
          $checkbox.checked = !$checkbox.checked;
          this.toggle($checkbox.checked);
        }
      });
    });
  },

  /**
   * Toggle the body class and cache the variable
   */
  toggle(isChecked) {
    document.querySelector('body').classList.toggle('theme-light', !isChecked);
    document.querySelector('body').classList.toggle('theme-dark', isChecked);
    localStorage.setItem('darkMode', isChecked);
  },
};

document.addEventListener('DOMContentLoaded', () => {
  igbDarkMode.init();
});

setTimeout(function(){
    document.body.classList.toggle('preload');
},500);