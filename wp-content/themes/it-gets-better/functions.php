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
	define( 'IT_GETS_BETTER_VERSION', '0.1.5' );
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

		// Register the block filter early
		add_filter('render_block', 'igb_filter_counter_block_content', 10, 2);

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

		add_image_size( 'navigation-image', 220, 180 );

		register_nav_menus(
			array(
				'utility-nav' => __( 'Utility Navigation', 'it-gets-better'),
				'main-nav'		=> __( 'Main Nav', 'it-gets-better' ),
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

		// Adds support for Woo Support
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'it_gets_better_setup' );


add_action( 'admin_init', 'igb_add_editor_styles' );
function igb_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( trailingslashit( get_template_directory_uri() ) . '_assets/css/editor-styles.css' );
}

add_action('wp_body_open', 'igb_add_dark_mode_checker', 5);

function igb_add_dark_mode_checker() { ?>
<script>
	(function() {
		// check the user's default dark mode / light mode settings,
		// but ONLY if the local storage "darkMode" is NOT already set
		if( localStorage.getItem("darkMode") === null ) {
			let mediaQueryObj = window.matchMedia('(prefers-color-scheme: dark)');
			let isDarkMode = mediaQueryObj.matches;

			if ( isDarkMode ) {
				localStorage.setItem("darkMode", "true");
			}
		}
	})();
	(function() {
		const darkMode = localStorage.darkMode === 'true';

		if (darkMode) {
			document.querySelector('body').classList.remove('theme-light');
			document.querySelector('body').classList.add('theme-dark');


			// activate the toggle
			document.addEventListener('DOMContentLoaded', () => {
				const $toggles = document.querySelectorAll('.dark-toggle input[type="checkbox"]');
				$toggles.forEach(($t) => {
					$t.checked = true;
				});
			});
		}
	})();

</script>
<?php }


/**
 * Sidebars/widgets.
 */
require get_template_directory() . '/_assets/functions/sidebars.php';
/**
 * Enqueue (scripts/styles)
 */
require get_template_directory() . '/_assets/functions/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/_assets/functions/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/_assets/functions/template-functions.php';

/**
 * Functions which relate to theme related enhancements.
 */
require get_template_directory() . '/_assets/functions/theme-helpers.php';

/**
 * Functions for natigation
 */
require get_template_directory() . '/_assets/functions/nav.php';

/**
 * Functions for customizer
 */
require get_template_directory() . '/_assets/functions/customizer.php';

//require get_template_directory() . '/_assets/functions/wordpress-custom-navwalker.php';


/**
 * Functions for acf blocks
 */
require get_template_directory() . '/_assets/functions/acf.php';

/**
 * Functions for Woo
 */
require get_template_directory() . '/_assets/functions/woo.php';

/**
 * Functions for modifying core blocks
 */
require get_template_directory() . '/_assets/functions/block-mods.php';

/**
 * Functions for SEO
 */
require get_template_directory() . '/_assets/functions/seo.php';

/**
 * Functions for CoBlocks extensions
 */
require get_template_directory() . '/coblocks/coblocks.php';

/**
 * Functions for Campaign Monitor
 */
require get_template_directory() . '/_assets/functions/campaign-monitor.php';
