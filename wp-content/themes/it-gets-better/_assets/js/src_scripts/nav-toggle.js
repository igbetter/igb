(function($) {
	"use strict";

	// menu changer
	$(document).ready(function() {
	// Retrieve the stored class name from localStorage
	var storedClass = localStorage.getItem('selectedMenu');
	if (storedClass) {
		// Apply the stored class to the page and menu
		$('#page').addClass('sticky-container ' + storedClass);
		$('#section_select_menu').addClass('selected_' + storedClass);
	} else {
		$('#page').addClass('sticky-container find_support');
		$('#section_select_menu').addClass('selected_find_support');
	}

	$('#section_select_menu a').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('id'); // Get the ID of the clicked anchor link
		var className = id.split('-')[1]; // Extract the class name from the ID
		$('#page').removeClass().addClass('sticky-container ' + className); // Remove existing classes and add the new class
		$('#section_select_menu').removeClass().addClass('selected_' + className);

		// Store the selected class name in localStorage
		localStorage.setItem('selectedMenu', className);
	});
	});

	//dropdown toggle

	$(document).ready(function() {
		$('.dropdown_toggle').on('click', function(e) {
			e.preventDefault();

			var $this = $(this);
			var $parentLi = $this.closest('li');
			var $subMenu = $parentLi.find('.sub-menu');

			// Close all open menus except the current one
			$('.dropdown_toggle').not($this).each(function() {
				var $otherToggle = $(this);
				var $otherParentLi = $otherToggle.closest('li');
				var $otherSubMenu = $otherParentLi.find('.sub-menu');

				$otherToggle.removeClass('open').addClass('closed').attr('aria-expanded', 'false');
				$otherParentLi.removeClass('menu_is_open');
				$otherSubMenu.slideUp();
			});

			if ($this.hasClass('closed')) {
				// Open the dropdown
				$this.removeClass('closed').addClass('open');
				$this.attr('aria-expanded', 'true');
				$parentLi.addClass('menu_is_open');
				$subMenu.slideDown();
			} else {
				// Close the dropdown
				$this.removeClass('open').addClass('closed');
				$this.attr('aria-expanded', 'false');
				$parentLi.removeClass('menu_is_open');
				$subMenu.slideUp();
			}
		});
	});

})(jQuery);

