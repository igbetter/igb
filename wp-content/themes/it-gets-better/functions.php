<?php
/**
 * It Gets Better functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package It_Gets_Better
 */

if ( ! defined( 'IT_GETS_BETTER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'IT_GETS_BETTER_VERSION', '0.1.0' );
}

if ( ! function_exists( 'it_gets_better_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function it_gets_better_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on It Gets Better, use a find and replace
		 * to change 'it-gets-better' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'it-gets-better', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'utility-nav' => __( 'Utility Navigation', 'it-gets-better'),
				'mega-nav-main' => __( 'Main Navigation', 'it-gets-better' ),
				'mega-nav-program-buttons' => __( 'Main Navigation: Parallelogram Buttons', 'it-gets-better' ),
				'mega-nav-footer' => __( 'Main Navigation: Bottom', 'it-gets-better' ),
				'footer-nav' => __( 'Footer Menu', 'it-gets-better' ),
				'social-nav' => __( 'Social Links', 'it-gets-better' ),
				'legal-nav' => __( 'Legal Nav (bottom)', 'it-gets-better')
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );

		show_admin_bar(false);
	}
endif;
add_action( 'after_setup_theme', 'it_gets_better_setup' );


add_action( 'admin_init', 'igb_add_editor_styles' );
function igb_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( trailingslashit( get_template_directory_uri() ) . '_assets/css/editor-styles.css' );
}


/**
 * Sidebars/widgets.
 */
require get_template_directory() . '/inc/sidebars.php';
/**
 * Enqueue (scripts/styles)
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which relate to theme related enhancements.
 */
require get_template_directory() . '/inc/theme-helpers.php';

/**
 * Functions for natigation
 */
require get_template_directory() . '/inc/nav.php';

/**
 * Functions for customizer
 */
require get_template_directory() . '/inc/customizer.php';

//require get_template_directory() . '/inc/wordpress-custom-navwalker.php';


/**
 * Functions for acf blocks
 */
require get_template_directory() . '/inc/acf.php';
