jQuery(document).ready(function ($) {
	//parallax scroll
	$(window).on("load scroll", function () {
		var parallaxElement = $(".simple_parallax_scroll"),
			parallaxQuantity = parallaxElement.length;
		window.requestAnimationFrame(function () {
			for (var i = 0; i < parallaxQuantity; i++) {
				var currentElement = parallaxElement.eq(i),
					windowTop = $(window).scrollTop(),
					elementTop = currentElement.offset().top,
					elementHeight = currentElement.height(),
					viewPortHeight = window.innerHeight * 0.5 - elementHeight * 0.5,
					//scrolled = windowTop - elementTop + viewPortHeight;
					scrollin = (viewPortHeight / elementHeight) * (windowTop + 0.01)
					scrollinlimited = Math.min( scrollin, 100 );

				if (window.matchMedia("(orientation: portrait)").matches) {
					currentElement.css({
						'object-position':  scrollinlimited + "% center"
					});
				}
				else {
					currentElement.css({
						'object-position': "center " + scrollinlimited + "%"
					});
				}
			}
		});
	});
});
