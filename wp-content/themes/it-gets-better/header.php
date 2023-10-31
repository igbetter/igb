<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package It_Gets_Better
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('preload theme-light'); ?>>

<?php wp_body_open(); ?>

<div id="page">
	<a href="#content" class="sr-only"><?php esc_html_e( 'Skip to content', 'it-gets-better' ); ?></a>

	<header class="site_main_header">
		<label class="dark-toggle">
			<span> Light </span>
			<input type="checkbox">
			<div class="dark-toggle__switch" tabindex="0"></div>
			<span> Dark </span>
		</label>
	</header>

	<?php get_template_part( 'template-parts/layout/header', 'content' ); ?>

	<div id="content">
