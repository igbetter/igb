<?php 

function it_gets_better_custom_logo_setup() {
	$defaults = array(
		'height'               => 94,
		'width'                => 200,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'it_gets_better_custom_logo_setup' );

function the_breadcrumb() {

    $sep = ' > ';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs text-igb-purple dark:text-igb-orange absolute top-[200px]">';
       if(is_tag()){
            echo "Related Content " . $sep . single_tag_title( '', false );
        }
	// If the current page is a single post, show its title with the separator

    // Search

    if(is_search()) {
        echo "Search Results for" . $sep . get_search_query();
    }
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/

	
add_post_type_support( 'page', 'excerpt' );

function my_cptui_add_post_types_to_archives( $query ) {
	// We do not want unintended consequences.
	if ( is_admin() || ! $query->is_main_query() ) {
		return;    
	}

	if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

		// Replace these slugs with the post types you want to include.
		$igb_post_types = array( 'video' );

		$query->set(
	  		'post_type',
			array_merge(
				array( 'post' ),
				$igb_post_types
			)
		);
	}
}
add_filter( 'pre_get_posts', 'my_cptui_add_post_types_to_archives' );