(function($) {
	"use strict";

	// jquery toggle whole attribute
	$.fn.toggleAttr = function (attr, val) {
		var test = $(this).attr(attr);
		if (test) {
			// if attrib exists with ANY value, still remove it
			$(this).removeAttr(attr);
		} else {
			$(this).attr(attr, val);
		}
		return this;
	};

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

	$( '#menu_toggle_button' ).on( 'click', function(e) {
		$(this).toggleClass('menu_open');
		$('body').toggleClass('menu_is_open');
		$('#site_utility_nav').toggleClass('hidden');
		$( 'path.top_line' ).toggleAttrVal( 'd', 'm 5 5 l 30 30', 'm 15 10 l 20 0');
		$( 'path.bottom_line' ).toggleAttrVal( 'd', 'm 5 35 l 30 -30', 'm 5 30 l 30 0');
	});



})(jQuery);

var body = document.querySelector('body');
var utility_nav = document.getElementById("site_utility_nav");
window.addEventListener('keydown', function (event) {
	if ( event.key === 'Escape' && body.classList.contains( 'menu_is_open' )) {
		body.classList.remove('menu_is_open');
		utility_nav.classList.add('hidden');
	}
})