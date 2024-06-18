(function($) {
	"use strict";

	// menu changer
	$(document).ready(function () {
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

		$('#section_select_menu a').click(function (e) {
			e.preventDefault();
			var id = $(this).attr('id'); // Get the ID of the clicked anchor link
			var className = id.split('-')[1]; // Extract the class name from the ID
			$('#page').removeClass().addClass('sticky-container ' + className); // Remove existing classes and add the new class
			$('#section_select_menu').removeClass().addClass('selected_' + className);

			// Store the selected class name in localStorage
			localStorage.setItem('selectedMenu', className);
		});

		$('.section_main_nav h3').click(function (e) {
			e.preventDefault();
			var className = this.className // Get the class name
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
			var $subMenu = $parentLi.children('.sub-menu');

			// Function to close other dropdowns at the same level
			function closeOtherDropdowns($context) {
				$context.find('.dropdown_toggle').not($this).each(function() {
					var $otherToggle = $(this);
					var $otherParentLi = $otherToggle.closest('li');
					var $otherSubMenu = $otherParentLi.children('.sub-menu');

					$otherToggle.removeClass('open').addClass('closed').attr('aria-expanded', 'false');
					$otherParentLi.removeClass('menu_is_open');
					$otherSubMenu.slideUp();
				});
			}

			// Close other dropdowns at the same level as the current toggle
			closeOtherDropdowns($parentLi.parent());

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

	// mobile nav toggle

/*
	$( '#menu_toggle_button' ).on( 'click', function(e) {
		$(this).toggleClass('main_nav_open');
		$('body').toggleClass('main_nav_is_open');
		$( 'path.top_line' ).toggleAttrVal( 'd', 'm 5 5 l 30 30', 'm 15 10 l 20 0');
		$( 'path.bottom_line' ).toggleAttrVal( 'd', 'm 5 35 l 30 -30', 'm 5 30 l 30 0');
	}); */

	$(document).ready(function () {

		// jquery toggle just the attribute value
		$.fn.toggleAttrVal = function (attr, val1, val2) {
			var test = $(this).attr(attr);
			if (test === val1) {
				$(this).attr(attr, val2);
				return this;
			}
			if (test === val2) {
				$(this).attr(attr, val1);
				return this;
			}
			// default to val1 if neither
			$(this).attr(attr, val1);
			return this;
		};

		const $menuToggleButton = $('#menu_toggle_button');
		const $headerCenter = $('.header_center');
		const $body = $('body');
		const $navItems = $headerCenter.find('a'); // Adjust the selector to match your nav items

		const setTabIndex = (tabIndex) => {
			$navItems.attr('tabindex', tabIndex);
		};

		// Initially set tabindex to -1 for all nav items
		setTabIndex('-1');

		$menuToggleButton.on('click', function() {
			if ($body.hasClass('main_nav_is_open')) {
				// Close the menu
				$body.removeClass('main_nav_is_open');
				$menuToggleButton.removeClass('main_nav_open');
				$('path.top_line').toggleAttrVal('d', 'm 5 5 l 30 30', 'm 15 10 l 20 0');
				$('path.bottom_line').toggleAttrVal('d', 'm 5 35 l 30 -30', 'm 5 30 l 30 0');
				setTabIndex('-1'); // Disable tabbing to nav items
				setTimeout(() => {
					$menuToggleButton.focus(); // Set focus back to the menu toggle button after 500ms
				}, 500);
			} else {
				// Open the menu
				$body.addClass('main_nav_is_open');
				$menuToggleButton.addClass('main_nav_open');
				$('path.top_line').toggleAttrVal('d', 'm 5 5 l 30 30', 'm 15 10 l 20 0');
				$('path.bottom_line').toggleAttrVal('d', 'm 5 35 l 30 -30', 'm 5 30 l 30 0');
				setTabIndex('0'); // Enable tabbing to nav items
				setTimeout(() => {
					$navItems.first().focus(); // Set focus to the first nav item after 500ms
				}, 500);
			}
		});
	});



})(jQuery);

