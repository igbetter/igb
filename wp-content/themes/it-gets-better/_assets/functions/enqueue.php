<?php
/**
 * Enqueue scripts and styles.
 */
function it_gets_better_scripts() {
	wp_enqueue_style('igb-styles', get_template_directory_uri() . '/_assets/css/styles.css', array(), IT_GETS_BETTER_VERSION );

	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true );
	wp_enqueue_script('igb-scripts', get_template_directory_uri() . '/_assets/js/scripts.js', array( 'jquery' ), IT_GETS_BETTER_VERSION, true );
	wp_enqueue_script('font-awesome-kit', '//kit.fontawesome.com/dc8c838d72.js', array(), null, true );
	wp_enqueue_script('offcanvas-menu', '//cdn.jsdelivr.net/npm/hc-offcanvas-nav/dist/hc-offcanvas-nav.min.js', array( 'jquery' ), null, true);
	wp_enqueue_script('a11y-slider', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'it_gets_better_scripts' );