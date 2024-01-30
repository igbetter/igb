jQuery(document).ready(function ($) {

	$('#site_main_navigation').hcOffcanvasNav({
		customToggle: $('#menu_toggle_button'),
		//levelTitles: true,
		//levelTitleAsBack: true,
		insertBack: true,
		width: '100%',
		height: '100%',
		//expanded: true, //(turn on just for testing/styling, but don't forget to remove before pushing!)
		disableBody: true,
		insertClose: false,
	});
});