<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */


get_header();


$archive_type = '';
if ( get_the_archive_title() ) {
	$archive_type = '<span><span class="pipe">|</span>' . get_the_archive_title() . '</span>';
}


?>


	<section id="primary">
		<main id="main">
			<header class="genaric_title_area post_header">
				<h1 class="page_title">Archive <?php echo wp_kses_post( $archive_type ); ?></h1>
			</header>
			<section class="general_archive list_container">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/loop/list' );
				endwhile;
				?>
			</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
