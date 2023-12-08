jQuery(document).ready(function ($) {

	$('#site_main_navigation').hcOffcanvasNav({
		customToggle: $('#menu_toggle_button'),
		levelTitles: true,
		levelTitleAsBack: true,
		width: '100%',
		height: '100%',
		expanded: true, //(just for testing/styling)
		disableBody: false,
		insertClose: false,
	});
});