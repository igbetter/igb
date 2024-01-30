jQuery(document).ready(function ($) {
	$('#safeExit').hover(function (event) {
		event.preventDefault();
		$('#safeExitContent').removeClass('hidden');
	});

	$('#safeExit a').on('click', function (e) {
		var href = $(this).attr('href');
		e.preventDefault();
		document.body.innerHTML = '';
		window.open(href, '_newtab');
		window.location.replace(href);
	})

	$('#safeExitContent').on("mouseleave", function (event) {
		event.preventDefault();
		$('#safeExitContent').addClass('hidden');
	});
});