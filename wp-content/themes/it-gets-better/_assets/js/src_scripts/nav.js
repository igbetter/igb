/**
 *
 * fixing javascripts not firing on page SHOW (like hitting the back button)
 *
 */
var body = document.querySelector('body');
var siteheader = document.querySelector('header').getElementsByClassName('site_main_header')[0];
var menutoggle = document.getElementById('menu_toggle_button');
var menubutton_topline = document.getElementsByClassName('top_line')[0];
var menubutton_bottomline = document.getElementsByClassName('bottom_line')[0];

window.addEventListener('pageshow', function (event) {

/* 	body.classList.remove('main_nav_is_open');
	utility_nav.classList.add('hidden');
	menutoggle.classList.remove('main_nav_open');
	menubutton_topline.setAttribute('d', 'm 15 10 l 20 0');
	menubutton_bottomline.setAttribute('d', 'm 5 30 l 30 0'); */

	if (window.scrollY >= 50) {
		siteheader.classList.add('smaller');
	}
});