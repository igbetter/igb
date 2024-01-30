/**
 *  show/hide search bar in the header.
 */


jQuery(document).ready(function ($) {

	$('#search_bar_toggle').on('click', function (e) {
		e.preventDefault();
		$('body').toggleClass('search_is_open');
		if ($(this).hasClass('search_closed')) {
			$(this).removeClass('search_closed').addClass('search_open');
			$('.site_search_bar').removeClass('search_closed').addClass('search_open');
		} else {
			$(this).removeClass('search_open').addClass('search_closed');
			$('.site_search_bar').removeClass('search_open').addClass('search_closed');
		}
	});

	$('.jetpack-instant-search__overlay-close').on('click', function (e) {
		$('body').toggleClass('search_is_open');
		$('#search_bar_toggle').removeClass('search_open').addClass('search_closed');
		$('.site_search_bar').removeClass('search_open').addClass('search_closed');
	});
});