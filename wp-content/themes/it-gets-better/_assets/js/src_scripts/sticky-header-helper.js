/**
 * adding "smaller" class for the top fixed nav
 */


jQuery(document).ready( function($) {

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();

		if (scroll >= 70) {
			$('header.site_main_header').addClass('smaller');
		} else {
			$('header.site_main_header').removeClass('smaller');
		}
	});

});