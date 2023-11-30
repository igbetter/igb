const slider = new A11YSlider(document.querySelector('.horizontal_slider'), {
	slidesToShow: 3,
	arrows: true,
	dots: false,
	prevArrow: '<button class="left_arrow"><span class="a11y-slider-sr-only">Previous</span></button>',
	nextArrow: '<button class="left_arrow"><span class="a11y-slider-sr-only">Next</span></button>',

});