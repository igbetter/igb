<?php
/**
 * Enqueue scripts and styles.
 */
function it_gets_better_scripts() {
	wp_enqueue_style('it-gets-better-style', get_stylesheet_uri(), array(), IT_GETS_BETTER_VERSION );
	wp_enqueue_style('it-gets-better-custom-styles', get_template_directory_uri() . '/_assets/css/igb-styles.css', array(), IT_GETS_BETTER_VERSION );
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true );
	wp_enqueue_script('it-gets-better-script', get_template_directory_uri() . '/js/script.min.js', array(), IT_GETS_BETTER_VERSION, true );
	wp_enqueue_script('it-gets-better-custom-scripts', get_template_directory_uri() . '/_assets/js/scripts.js', array( 'jquery' ), IT_GETS_BETTER_VERSION, true );
	wp_enqueue_script('font-awesome-kit', '//kit.fontawesome.com/dc8c838d72.js', array(), null, true );
  wp_enqueue_style('it-gets-better-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap' );
	wp_enqueue_script('jquery-popover', "//cdn.jsdelivr.net/npm/webui-popover@1.2.18/dist/jquery.webui-popover.min.js", array(), null, true);
	wp_enqueue_style('jquery-popover-css', "//cdn.jsdelivr.net/npm/webui-popover@1.2.18/dist/jquery.webui-popover.min.css");

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'it_gets_better_scripts' );