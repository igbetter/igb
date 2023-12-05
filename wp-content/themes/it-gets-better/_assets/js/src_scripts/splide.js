 document.addEventListener( 'DOMContentLoaded', function() {
	 var splide = new Splide('.splide', {
		 perPage: 4,
		 perMove: 1,
		 gap: '2rem',
		 height: 'auto',
		 drag: 'free',
		 noDrag: 'input, textarea, .no-drag',
		 dragMinThreshold: {
			mouse: 0,
			touch: 10,
		 },
		 keyboard: true,
		 wheel: true,
		 releaseWheel: true,
		 trimSpace: false,
		 cover: true,

		 breakpoints: {
			900: {
				 perPage: 3,
				 height: '150px',
			 },
			640: {
				 perPage: 2,
				 height: '125px',
			},
			480: {
				perPage: 1,
				height: '100px',
			},
		},
	});
	 splide.mount();
  } );