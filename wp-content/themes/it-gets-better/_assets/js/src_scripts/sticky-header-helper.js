/**
 * adding "smaller" class for the top fixed nav
 */


jQuery(document).ready( function($) {

	function checkScroll() {
		if ($(window).scrollTop() > 50) {
			$('header.site_main_header').addClass('smaller');
		} else {
			$('header.site_main_header').removeClass('smaller');
		}
	}

	// Check scroll position on page load
	checkScroll();

	// Check scroll position on scroll event
	$(window).scroll(function() {
		checkScroll();
	});

	// Check scroll position if page loaded already scrolled
	$(window).on('load', function() {
		checkScroll();
	});

});