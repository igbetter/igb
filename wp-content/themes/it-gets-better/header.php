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
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<meta name="google-site-verification" content="8tucv_PIuzcS7uFJ71dkUrLaHUxAJcrE_Jsmr_gcpA0" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php get_template_part( 'template-parts/egg' ); ?>
	<?php wp_head(); ?>

</head>

<body <?php body_class('preload theme-light'); ?>>


<?php wp_body_open(); ?>

<div id="page" class="sticky-container ">
	<a href="#content" class="sr-only"><?php esc_html_e( 'Skip to content', 'it-gets-better' ); ?></a>
	<?php
	$show_announcement_bar = get_field( 'show_announcement_bar', 'options' );
	if( $show_announcement_bar === true ) {
		$announcement_text = get_field( 'announcement_bar_text', 'options' );
		printf(
			'
			<div id="top_announcment_bar">
				<span>%s</span>
			</div>
			',
			wp_kses_post( $announcement_text )
		);
	} ?>

	<header class="site_main_header">
		<?php
		$show_donate_bar = get_field( 'show_donate_bar', 'options' );
		if( $show_donate_bar === true ) {
			$donate_bar_content = get_field( 'donate_bar_content', 'options' );
			$donate_button = ($donate_bar_content['donate_link'] != '' ) ? '<a href="' . esc_url( $donate_bar_content['donate_link'] ) . '" class="primary_button">' . esc_html( $donate_bar_content['donate_button_text'] ) .'</a>' : '';
			$donate_bar_text = $donate_bar_content['donate_bar_text'];
			printf(
				'
				<div id="donate_banner" class="donate-banner hidden">
					<div class="donate-content">
						%s
						<span class="centered_button">%s</span>
					</div>
					<button id="close_banner">
						<svg class="icon-close-dims">
							<use xlink:href="#close"></use>
						</svg>
						<div id="dismiss_options" class="dismiss-options hidden">
							<label>

								<input type="radio" name="dismiss" value="remind-later" checked />
								<span class="checkmark"></span> Remind me later
							</label>
							<label>

								<input type="radio" name="dismiss" value="already-donated" />
								<span class="checkmark"></span> I already donated
							</label>
							<label>
								<input type="radio" name="dismiss" value="never-show-again" />
								<span class="checkmark"></span> Never show again
							</label>
						</div>
					</button>
				</div>
				',
				wp_kses_post( $donate_bar_text ),
				$donate_button

			);
		} // end if show donate bar is true
		?>

		<div id="site_utility_bar" class="flex-row">


			<nav id="utility_navigation">
				<?php
					$utilityNavProps =  array(
					'theme_location' => 'utility-nav',
					'container'      => '',
					'menu_class'     => 'utility_nav header',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				);
				wp_nav_menu( $utilityNavProps );
				?>
			</nav>
			<div class="utility_right_side">

				<label class="darkmode_switch">
					<input class="switch__input" type="checkbox" role="switch">
					<svg class="switch__icon switch__icon--light" viewBox="0 0 12 12" width="12px" height="12px" aria-hidden="true">
						<g fill="none" stroke="#fff" stroke-width="1" stroke-linecap="round">
							<circle cx="6" cy="6" r="2" />
							<g stroke-dasharray="1.5 1.5">
								<polyline points="6 10,6 11.5" transform="rotate(0,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(45,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(90,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(135,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(180,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(225,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(270,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(315,6,6)" />
							</g>
						</g>
					</svg>
					<svg class="switch__icon switch__icon--dark" viewBox="0 0 12 12" width="12px" height="12px" aria-hidden="true">
						<g fill="none" stroke="#fff" stroke-width="1" stroke-linejoin="round" transform="rotate(-45,6,6)">
							<path d="m9,10c-2.209,0-4-1.791-4-4s1.791-4,4-4c.304,0,.598.041.883.105-.995-.992-2.367-1.605-3.883-1.605C2.962.5.5,2.962.5,6s2.462,5.5,5.5,5.5c1.516,0,2.888-.613,3.883-1.605-.285.064-.578.105-.883.105Z"/>
						</g>
					</svg>
					<span class="switch__sr">Dark Mode</span>
				</label>

			</div> <!--/utility_right_side (search and mode switch) -->

		</div>
		<div class="flex-row">
			<div id="IGB_MAIN_LOGO">
				<a href="<?php echo home_url(); ?>">
				<svg version="1.1" id="IT_GETS_BETTER--logo" xmlns="http://www.w3.org/2000/svg" class="main_IGB_logo IGB_LOGO" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 352.3 165.2" style="enable-background:new 0 0 352.3 165.2;" xml:space="preserve">
					<g>
						<rect x="0.6" y="1.5" class="logo_purple" width="17.2" height="74.2"></rect>
						<polygon class="logo_purple" points="62.3,17.3 76.7,17.3 84.6,2.6 84.6,1.5 22.8,1.5 22.8,17.3 45.1,17.3 45.1,75.7 45.4,75.7 62.3,44.1"></polygon>
						<path class="logo_purple" d="M17.3,120.8v-15.5c2.4-0.4,4.7-0.7,7.8-0.7c1.7,0,3.2,0.2,4.5,0.6l7.1-13.6c-4.3-1.3-9.4-2-15.4-2c-6.1,0-15.4,0.8-20.7,1.6 v68l20.5-38.1C19.7,121.2,18.6,121,17.3,120.8"></path>
						<polygon class="logo_purple" points="198.9,164.5 216.1,164.5 216.1,106.2 238.4,106.2 238.4,90.4 209.4,90.4 198.9,110"></polygon>
						<polygon class="logo_purple" points="233.7,75.7 233.7,60 225.7,60 217.3,75.7"></polygon>
						<polygon class="logo_purple" points="257.1,1.5 248.6,17.3 260.5,17.3 260.5,75.7 274.6,75.7 277.7,75.7 277.7,70 277.7,17.3 299.9,17.3 299.9,1.5"></polygon>
						<path class="logo_purple" d="M331.8,31.8c-9.3-3.9-13-5.6-13-10.4c0-3,2.5-6,8.8-6c5.3,0,12.1,3.1,16.4,6.1l4.3-15.4c-4.3-2.9-12.6-5.8-20.7-5.8 c-5.6,0-10.3,1.1-14.1,3c-7.9,3.9-12,11-12,18.4c0,1.2,0.1,2.3,0.3,3.5c1.1,7.4,6,13.7,17.3,18.3s13.3,7.2,13.3,11 c0,3.6-2.3,6.5-8.4,6.5c-7,0-14.8-2.8-20.7-7.2l-4.8,15.6c6.5,4.2,16.6,7.6,25,7.6c17.8,0,26.4-11.2,26.4-23.1 C349.8,44.3,345.7,37.6,331.8,31.8"></path>
						<polygon class="logo_blue" points="175.2,90.4 175.2,106.2 198.9,106.2 198.9,110 209.4,90.4 "></polygon>
						<polygon class="logo_blue" points="152.1,90.4 134.2,123.9 134.2,164.5 151.4,164.5 151.4,106.2 175.2,106.2 175.2,90.4 "></polygon>
						<path class="logo_blue" d="M179.9,38.4l-20.3,38c7.7-1,14.1-3.4,20.3-7V38.4z"></path>
						<polygon class="logo_blue" points="186.7,75.7 217.3,75.7 225.7,60 203.9,60 203.9,45.5 231,45.5 231,30.6 203.9,30.6 203.9,17.3 233.7,17.3 233.7,1.5 199.8,1.5 186.7,25.8"></polygon>
						<polygon class="logo_blue" points="238.2,17.3 248.6,17.3 257.1,1.5 238.2,1.5"></polygon>
						<polygon class="logo_yellow" points="111.9,90.4 111.9,106.2 134.2,106.2 134.2,123.9 152.1,90.4"></polygon>
						<path class="logo_yellow" d="M151.8,76.9c2.7,0,5.3-0.2,7.8-0.5l20.3-38v-4.5h-31.1v14.7h14.9v10.9c-2.7,1.4-5.5,2-10.9,2c-12.1,0-21.6-8.8-21.6-23 c0-13,7.9-22.3,22.7-22.3c5.7,0,11.3,1.4,16.6,4.1l7.2-13.9C170.3,2.6,162.5,0,152.8,0c-3.6,0-7,0.4-10.3,1.2l-27.3,51.2 C120.5,67.7,134.8,76.9,151.8,76.9"></path>
						<polygon class="logo_yellow" points="186.7,25.8 199.8,1.5 186.7,1.5"></polygon>
						<polygon class="logo_yellow" points="60.7,164.5 107.6,164.5 107.6,148.9 77.9,148.9 77.9,134.4 105,134.4 105,119.4 79.3,119.4 60.7,154.1"></polygon>
						<polygon class="logo_yellow" points="107.6,106.2 107.6,90.4 94.8,90.4 86.4,106.2"></polygon>
						<polygon class="logo_pink" points="84.6,17.3 84.6,2.6 76.7,17.3"></polygon>
						<polygon class="logo_pink" points="62.3,44.1 45.4,75.7 62.3,75.7"></polygon>
						<path class="logo_pink" d="M112.9,38.7c0,4.9,0.9,9.5,2.3,13.7l27.3-51.2C125.3,5.1,112.9,19.5,112.9,38.7"></path>
						<path class="logo_pink" d="M23.8,132.8c9.1,0,13.6,3.2,13.6,8.9c0,5.6-4.1,8.9-12.8,8.9c-3.4,0-4.8-0.1-7.2-0.3v-17.2C19,132.9,21.1,132.8,23.8,132.8 M22.7,165.2c22.3,0,33.2-10.2,33.2-21.8c0-8.5-4.8-14.4-14.9-17.4c8.4-3.4,12.7-8.7,12.7-16.5c0-7.5-5.7-14.5-17-17.9l-7.1,13.6 c4.3,1.2,6.5,4.1,6.5,7.5c0,5.4-4.1,8.4-12.4,8.4c-1,0-1.9,0-2.6,0L0.6,159.2v4.6C7.9,164.6,16.3,165.2,22.7,165.2"></path>
						<polygon class="logo_pink" points="77.9,119.4 77.9,106.2 86.4,106.2 94.8,90.4 60.7,90.4 60.7,154.1 79.3,119.4"></polygon>
						<polygon class="logo_purple" points="289.6,106.2 289.6,90.4 266.7,90.4 242.7,90.4 242.7,135.3 242.7,164.5 289.6,164.5 289.6,148.9 259.9,148.9 259.9,134.4 287,134.4 287,119.4 259.9,119.4 259.9,106.2"></polygon>
						<path class="logo_purple" d="M316.4,126.5c-2,0-3.2-0.1-5.5-0.3v-20.4c2.4-0.4,4-0.5,6.7-0.5c7.4,0,12.2,3.6,12.2,9.8 C329.9,122.6,324.6,126.5,316.4,126.5 M347.8,114.5c0-13.6-9.1-24.6-32.2-24.6c-8.7,0-15.6,0.5-21.9,1.2v73.4h17.2v-24.3 c2.4,0.1,3.8,0.2,6.4,0.2c1,0,1.9,0,2.9-0.1l12.6,24.2h19.5l-17.4-28.6C343,131.2,347.8,123.3,347.8,114.5"></path>
						<g>
							<path class="logo_purple" stroke="none" d="M347.4,97.4c-1.5,0-2.6-1.3-2.6-2.8c0-1.5,1.2-2.6,2.6-2.6s2.6,1.2,2.6,2.6C350,96.2,348.9,97.4,347.4,97.4 M347.4,91.6 c-1.7,0-3.1,1.4-3.1,3.2s1.4,3.2,3.1,3.2s3.1-1.4,3.1-3.2C350.5,93,349.2,91.6,347.4,91.6"/>
							<path class="logo_purple" stroke="none" d="M347.3,94.7c-0.1,0-0.2,0-0.3,0v-1c0.1,0,0.2,0,0.4,0c0.4,0,0.6,0.2,0.6,0.5C348,94.5,347.8,94.7,347.3,94.7 M348.5,94.1 c0-0.6-0.4-0.9-1.2-0.9c-0.3,0-0.6,0-0.8,0.1v3h0.5v-1.1c0.1,0,0.2,0,0.3,0c0.1,0,0.1,0,0.2,0l0.6,1.1h0.6l-0.7-1.2 C348.3,94.8,348.5,94.5,348.5,94.1"/>
						</g>
					</g>
				</svg>
			</a>
			</div>
			<div class="header_center">
				<nav id="site_main_nav" class="main_nav_container">
					<div class="mobile_search_container mobile_only">
						<?php get_template_part( 'template-parts/components/mobile-search-bar' ); ?>
					</div>
					<?php
						$navProps =  array(
						'theme_location' => 'main-nav',
						'container'      => '',
						'menu_class'     => 'main-nav header',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'walker'		 => new Aria_Walker_Nav_Menu
					);
					wp_nav_menu( $navProps );
					?>
				</nav>

			</div>
			<div class="header_right_side">

				<button id="menu_toggle_button" class="menu mobile_menu_only">
					<svg
						x="0" y="0" viewBox="0 0 40 40">
						<path class="menu_line top_line"
							stroke-linecap="round"
							stroke-linejoin="round"
							d="m 15 10
								l 20 0"/>
						<path class="menu_line middle_line"
							stroke-linecap="round"
							stroke-linejoin="round"
							d="m 10 20
								l 25 0"/>
						<path class="menu_line bottom_line"
							stroke-linecap="round"
							stroke-linejoin="round"
							d="m 5 30
								l 30 0"/>
					</svg>
				</button>
				<div id="site_search">
					<?php get_template_part( 'template-parts/components/search-bar' ); ?>
				</div>
			</div>

		</div>

		<?php if( get_theme_mod ('safe_exit_url') !== "" && get_theme_mod('safe_exit_url_text') !== "" ): ?>
			<div id="safeExit" class="safe-exit-button">
				<a href="<?php echo get_theme_mod( 'safe_exit_url'); ?>" target="_self">
				<span class="flex">Safe Exit
					<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11 1C11 0.447715 10.5523 -7.91831e-09 10 3.42285e-08L1 -5.00652e-08C0.447715 -5.00652e-08 1.73698e-07 0.447715 1.73698e-07 1C1.73698e-07 1.55228 0.447715 2 1 2L9 2L9 10C9 10.5523 9.44772 11 10 11C10.5523 11 11 10.5523 11 10L11 1ZM1.29289 8.29289C0.902369 8.68342 0.902369 9.31658 1.29289 9.70711C1.68342 10.0976 2.31658 10.0976 2.70711 9.70711L1.29289 8.29289ZM9.29289 0.292893L1.29289 8.29289L2.70711 9.70711L10.7071 1.70711L9.29289 0.292893Z" fill="white"/>
					</svg>
				</span>
			</a>
		</div>
		<?php endif; ?>

	</header>

	<?php if( !is_home() ) : ?>
	<nav class="breadcrumb_navigation">
		<?php // get_template_part( 'template-parts/components/page', 'breadcrumb'); ?>
	</nav>
	<?php endif; ?>
	<div id="content">
