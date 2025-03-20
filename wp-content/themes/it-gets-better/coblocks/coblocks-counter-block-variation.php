<?php

if (! defined('ABSPATH') ) {
    exit;
}

/**
 * Register block variations
 */
function igb_register_block_variations()
{
    wp_enqueue_script(
        'igb-block-variations',
        get_template_directory_uri() . '/coblocks/js/block-variations.js',
        array('wp-blocks', 'wp-block-editor', 'wp-components', 'wp-element', 'wp-i18n')
    );

    // Pass the pledge count to JavaScript
    wp_localize_script(
        'igb-block-variations',
        'igbBlockData',
        array(
        'pledgeCount' => get_option('igb_total_pledgers', '0')
        )
    );
}
add_action('enqueue_block_editor_assets', 'igb_register_block_variations');

/**
 * Register custom block attributes
 */
function igb_register_block_attributes()
{
    wp_register_script(
        'igb-block-attributes',
        '',
        array('wp-blocks'),
        null,
        true
    );

    wp_add_inline_script(
        'igb-block-attributes',
        'wp.domReady(function() {
			const existingBlock = wp.blocks.getBlockType("coblocks/counter");
			if (existingBlock) {
				wp.blocks.unregisterBlockType("coblocks/counter");
				wp.blocks.registerBlockType("coblocks/counter", {
					...existingBlock,
					attributes: {
						...existingBlock.attributes,
						isPledgeCounter: {
							type: "boolean",
							default: false
						}
					}
				});
			}
		});'
    );

    wp_enqueue_script('igb-block-attributes');
}
add_action('enqueue_block_editor_assets', 'igb_register_block_attributes');

/**
 * Filter the counter block content to update pledge count
 */
function igb_filter_counter_block_content($block_content, $block)
{
    if ($block['blockName'] === 'coblocks/counter' && isset($block['attrs']['isPledgeCounter']) && $block['attrs']['isPledgeCounter'] === true) {
        $pledge_count = igb_get_pledgers();
        
        // Format the number if number formatting is enabled
        if (!empty($block['attrs']['numberFormatting'])) {
            $pledge_count = number_format((int)$pledge_count);
        }
        
        // Add strong tags if the original had them
        if (strpos($block['attrs']['counterText'], '<strong>') !== false) {
            $pledge_count = '<strong>' . $pledge_count . '</strong>';
        }
        
        // Use regex to update only the first div's content while preserving everything else
        $pattern = '/<div([^>]*data-counter-speed="[^"]*"[^>]*)>(.*?)<\/div>(.+)/s';
        $replacement = '<div$1>' . $pledge_count . '</div>$3';
        
        return preg_replace($pattern, $replacement, $block_content);
    }
    return $block_content;
}

add_filter('render_block', 'igb_filter_counter_block_content', 10, 2);

