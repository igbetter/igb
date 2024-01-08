/**
 *  show/hide toggle for the browse content filters on mobile
 */


jQuery(document).ready(function ($) {
	$('#mobile_filter_toggle_button').on('click', function (e) {
		e.preventDefault();
		$( '.browse_content_main' ).toggleClass( 'filter_is_open' );
		$('.browse_content_main .filter_column').toggleClass('open');
		 $(this).text((i, t) => t == 'Show More Filters' ? 'Hide More Filters' : 'Show More Filters');
	});

});