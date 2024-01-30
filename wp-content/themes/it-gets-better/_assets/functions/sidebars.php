<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function it_gets_better_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'it-gets-better' ),
			'id'            => 'footer-main',
			'description'   => __( 'Add widgets here to appear in your footer.', 'it-gets-better' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    register_sidebar(
		array(
			'name'          => __( 'Footer Bottom', 'it-gets-better' ),
			'id'            => 'footer-bottom',
			'description'   => __( 'Add widgets here to appear in your footer bottom.', 'it-gets-better' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	 register_sidebar(
		array(
			'name'          => __( 'Mega Menu Callout', 'it-gets-better' ),
			'id'            => 'mega-menu-callout',
			'description'   => __( 'Control the highlight or "callout" area of the mega menu.', 'it-gets-better' ),
			'before_widget' => '<aside id="%1$s" class="mega_menu_widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'it_gets_better_widgets_init' );
