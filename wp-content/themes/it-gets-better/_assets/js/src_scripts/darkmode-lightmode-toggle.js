const igbDarkMode = {
  init() {
    this.changeListener();
    this.tabindexListener();
  },

  /**
   * Change listener for dark mode toggle
   */
  changeListener() {
    const $darkToggles = document.querySelectorAll('.dark-toggle input[type="checkbox"]');
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
    const $darkSwitches = document.querySelectorAll('.dark-toggle__switch');

    $darkSwitches.forEach(($s) => {
      $s.addEventListener('keyup', (e) => {
        if (e.key === 'Enter' || e.keyCode === 13) {
          const $checkbox = e.currentTarget.closest('.dark-toggle').querySelector('input[type="checkbox"]');
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
		document.querySelector('body').classList.toggle('theme-light');
		document.querySelector('body').classList.toggle('theme-dark', isChecked);
		localStorage.setItem('darkMode', isChecked);

		// set jetpack search modal as well
		document.querySelector('.jetpack-instant-search').classList.toggle('jetpack-instant-search__overlay--light');
		document.querySelector('.jetpack-instant-search').classList.toggle('jetpack-instant-search__overlay--dark');
	},
};

document.addEventListener('DOMContentLoaded', () => {
	igbDarkMode.init();
});

setTimeout(function(){
    document.body.classList.toggle('preload');
},500);