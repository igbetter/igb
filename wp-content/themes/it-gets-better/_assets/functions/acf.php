<?php

/**
 * On post save, map values from 'extended_definition'
 * to WordPress's native content field
 */
function igb_glossary_content_proxy_field( $post_id ) {

	// bail if not a glossary term
	if ( 'glossary' !== get_post_type( $post_id  ) ) {
		return;
	}

	// bail if this is not a normal save
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ||
		( defined( 'DOING_AJAX' ) && DOING_AJAX ) ||
		( defined( 'DOING_CRON' ) && DOING_CRON ) ) {
		return;
	}


	$content = get_field( 'extended_definition', $post_id );

	if ( $content ) {
		$the_post = array(
			'ID' => $post_id,
			'post_content' => $content,
		);

		// update the content
		wp_update_post( $the_post );
	}
}
add_action( 'acf/save_post', 'igb_glossary_content_proxy_field', 15 );


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

/* 	acf_register_block_type(array(
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
	)); */

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
		'name' 				=> 'page-link-block',
		'title' 			=> __('Page Link'),
		'description'		=> __('Similar to media/text box, with more options'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/page-link-block/page-link.php',
		'icon'				=> file_get_contents( get_template_directory() . '/acf-blocks/_block-assets/icon-page-link.svg' ),
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
		'name' 				=> 'link-tree-block',
		'title' 			=> __('Link Tree'),
		'description'		=> __('Display a collection of links in groups, styled like the glossary term tag cloud'),
		'render_template'  	=> get_template_directory() . '/acf-blocks/link-tree-block/link-tree.php',
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

/* 	acf_register_block_type(array(
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
	)); */

  }
}