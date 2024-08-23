(function($) {
	"use strict";

	//dropdown toggle
	// keyboard and click control of main nav, for those with javascript enabled.

	document.addEventListener('DOMContentLoaded', () => {
	const menuItems = document.querySelectorAll('#menu-main-navigation > .menu-item > a');
	const subMenus = document.querySelectorAll('.sub-menu');

	let currentIndex = -1;
	let currentSubMenu = null;

	function closeAllSubMenus() {
		subMenus.forEach(menu => {
			menu.style.display = 'none';
			menu.style.opacity = '0';

			// Set aria-expanded to false for the corresponding parent <a>
			const parentLink = menu.previousElementSibling;
			if (parentLink && parentLink.tagName === 'A') {
				parentLink.setAttribute('aria-expanded', 'false');
			}
		});
		currentSubMenu = null;
	}

	function openSubMenu(menu) {
		menu.style.display = 'block';
		menu.style.opacity = '1';

		// Set aria-expanded to true for the corresponding parent <a>
		const parentLink = menu.previousElementSibling;
		if (parentLink && parentLink.tagName === 'A') {
			parentLink.setAttribute('aria-expanded', 'true');
		}
	}

	function handleKeyDown(event) {
		if (event.key === 'ArrowRight') {
			if (currentIndex < menuItems.length - 1) {
				currentIndex++;
				const nextMenuItem = menuItems[currentIndex];
				if (currentSubMenu) closeAllSubMenus();
				nextMenuItem.focus();
				currentSubMenu = nextMenuItem.nextElementSibling;
				if (currentSubMenu && currentSubMenu.classList.contains('sub-menu')) openSubMenu(currentSubMenu);
			}
			event.preventDefault();
		} else if (event.key === 'ArrowLeft') {
			if (currentIndex > 0) {
				currentIndex--;
				const prevMenuItem = menuItems[currentIndex];
				if (currentSubMenu) closeAllSubMenus();
				prevMenuItem.focus();
				currentSubMenu = prevMenuItem.nextElementSibling;
				if (currentSubMenu && currentSubMenu.classList.contains('sub-menu')) openSubMenu(currentSubMenu);
			}
			event.preventDefault();
		} else if (event.key === 'ArrowDown') {
			if (currentSubMenu) {
				const focusedItem = document.activeElement;
				const subMenuItems = Array.from(currentSubMenu.querySelectorAll('.menu-item a'));
				const focusedIndex = subMenuItems.indexOf(focusedItem);
				if (focusedIndex < subMenuItems.length - 1) {
					subMenuItems[focusedIndex + 1].focus();
				}
			}
			event.preventDefault();
		} else if (event.key === 'ArrowUp') {
			if (currentSubMenu) {
				const focusedItem = document.activeElement;
				const subMenuItems = Array.from(currentSubMenu.querySelectorAll('.menu-item a'));
				const focusedIndex = subMenuItems.indexOf(focusedItem);
				if (focusedIndex > 0) {
					subMenuItems[focusedIndex - 1].focus();
				}
			}
			event.preventDefault();
		} else if (event.key === 'Escape') {
			closeAllSubMenus();
			currentIndex = -1;
			if (document.activeElement && document.activeElement.closest('.menu-item')) {
				document.querySelector('.menu-item a').focus();
			}
		}
	}
	function handleClick(event) {
		const target = event.target.closest('.menu-item > a');
		if (target) {
			const menuItem = target.parentElement;
			const subMenu = menuItem.querySelector('.sub-menu');

			if (subMenu) {
				// Toggle the sub-menu visibility
				if (subMenu.style.display === 'block') {
					closeAllSubMenus();
				} else {
					closeAllSubMenus();
					openSubMenu(subMenu);
				}
				event.preventDefault();
			}
		}
	}

		menuItems.forEach(item => item.addEventListener('click', handleClick));
		document.addEventListener('keydown', handleKeyDown);
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
		const $navSlideout = $('.header_center');
		const $navItems = $headerCenter.find('a'); // Adjust the selector to match your nav items

		const setTabIndex = (tabIndex) => {
			$navItems.attr('tabindex', tabIndex);
		};

		// Initially set tabindex to -1 for all nav items
	//	setTabIndex('-1');

		$menuToggleButton.on('click', function() {
			if ($body.hasClass('main_nav_is_open')) {
				// Close the menu
				$body.removeClass('main_nav_is_open');
				$menuToggleButton.removeClass('main_nav_open');
				$navSlideout.hide('slide', { direction: 'right' }, 500);
				setTimeout(() => {
					$headerCenter.attr( 'style', ''); //remove inline styles after finished animating
				}, 501);
				$('path.top_line').toggleAttrVal('d', 'm 5 5 l 30 30', 'm 15 10 l 20 0');
				$('path.bottom_line').toggleAttrVal('d', 'm 5 35 l 30 -30', 'm 5 30 l 30 0');
				setTabIndex('-1'); // Disable tabbing to nav items
				setTimeout(() => {
					$menuToggleButton.focus(); // Set focus back to the menu toggle button after 50ms
				}, 500);
			} else {
				// Open the menu
				$body.addClass('main_nav_is_open');
				$menuToggleButton.addClass('main_nav_open');
				$navSlideout.show('slide', { direction: 'right' }, 500 );
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

