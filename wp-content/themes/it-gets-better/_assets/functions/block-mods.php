<?php
/**
 *
 * functions for modifying core blocks (custom ACF blocks are in `acf.php`)
 *
 */

function igb_register_pullquote_styles() {
	register_block_style(
		'core/pullquote',
		array(
			'name'		=> 'small_width',
			'label'		=> 'Centered',
		),
	);
	register_block_style(
		'core/pullquote',
		array(
			'name'		=> 'staggered',
			'label'		=> 'Staggered',
		),
	);
	register_block_style(
		'core/pullquote',
		array(
			'name'		=> 'post-it',
			'label'		=> 'Post it',
		),
	);
}
add_action( 'init', 'igb_register_pullquote_styles' );