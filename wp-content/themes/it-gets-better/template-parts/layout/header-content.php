<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

?>

<header id="masthead" class="dark:bg-igb-black">
<?php
    get_template_part('template-parts/layout/headerSections/header','top');
    get_template_part('template-parts/layout/headerSections/header','nav');
    get_template_part('template-parts/layout/headerSections/header','megaNav');
    get_template_part('template-parts/layout/headerSections/header','safeExit');
    // if( !is_front_page() && !is_page()){
    //     the_breadcrumb();
    // }
?>

</header><!-- #masthead -->
