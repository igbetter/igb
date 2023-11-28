<?php

add_filter( 'block_categories_all' , function( $categories ) {

	// Adding a new category.
	$categories[] = array(
		'slug'  => 'igb',
		'title' => 'It Gets Better custom blocks'
	);

	return $categories;
} );

add_action('acf/init', 'igb_initialize_acf_blocks');

function igb_initialize_acf_blocks() {
  // Check function exists.

  if( function_exists('acf_register_block_type') ) {
	// Register a Guid block block.
	acf_register_block_type(array(
		'name' 				=> 'hero-block',
		'title' 			=> __('Page Hero'),
		'description'		=> __('Hero section for the top of a page'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/hero-block/hero.php',
		'icon'				=> file_get_contents( get_template_directory() . '/acf-blocks/_block-assets/icon-svg-frame.svg' ),
		'category' 			=> 'igb',
		'example'  			=> array(
			'attributes' 	=> array(
				'mode' 		=> 'preview',
				'data' 		=> array(
					'is_preview'    => true
				)
			)
		)
	));

	acf_register_block_type(array(
		'name' 				=> 'featured-content-block',
		'title' 			=> __('Featured Content'),
		'description'		=> __('Feature a video, playlist, or blog post'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/featured-content-block/featured-content.php',
		'icon'				=> file_get_contents( get_template_directory() . '/acf-blocks/_block-assets/icon-featured-content.svg' ),
		'category' 			=> 'igb',
		'example'  			=> array(
			'attributes' 	=> array(
				'mode' 		=> 'preview',
				'data' 		=> array(
					'is_preview'    => true
				)
			)
		)
	));

	acf_register_block_type(array(
		'name' 				=> 'term-list-block',
		'title' 			=> __('Glossary Term List'),
		'description'		=> __('Popular glossary terms list'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/term-list-block/term-list.php',
		'icon'				=> file_get_contents( get_template_directory() . '/acf-blocks/_block-assets/icon-popular-terms.svg' ),
		'category' 			=> 'igb',
		'example'  			=> array(
			'attributes' 	=> array(
				'mode' 		=> 'preview',
				'data' 		=> array(
					'is_preview'    => true
				)
			)
		)
	));

	acf_register_block_type(array(
		'name' 				=> 'featured-term-block',
		'title' 			=> __('Single Term w/content'),
		'description'		=> __('Highlight a glossary term with related content'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/single-term-with-content/single-term.php',
		'icon'				=> file_get_contents( get_template_directory() . '/acf-blocks/_block-assets/icon-term.svg' ),
		'category' 			=> 'igb',
		'example'  			=> array(
			'attributes' 	=> array(
				'mode' 		=> 'preview',
				'data' 		=> array(
					'is_preview'    => true
				)
			)
		)
	));

	acf_register_block_type(array(
		'name' 				=> 'more-content-block',
		'title' 			=> __('More Content'),
		'description'		=> __('Display more content'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/more-content-block/more-content.php',
		'icon'				=> file_get_contents( get_template_directory() . '/acf-blocks/_block-assets/icon-more-content.svg' ),
		'category' 			=> 'igb',
		'example'  			=> array(
			'attributes' 	=> array(
				'mode' 		=> 'preview',
				'data' 		=> array(
					'is_preview'    => true
				)
			)
		)
	));

	acf_register_block_type(array(
		'name' 				=> 'related-content-block',
		'title' 			=> __('Related Content'),
		'description'		=> __('Display related content'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/related-content-block/related-content.php',
		'icon'				=> file_get_contents( get_template_directory() . '/acf-blocks/_block-assets/icon-related-content.svg' ),
		'category' 			=> 'igb',
		'example'  			=> array(
			'attributes' 	=> array(
				'mode' 		=> 'preview',
				'data' 		=> array(
					'is_preview'    => true
				)
			)
		)
	));

  }
}