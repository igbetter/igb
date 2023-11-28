<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package It_Gets_Better
 */

?>

	</div><!-- #content -->

	<?php get_template_part( 'template-parts/layout/footer', 'content' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<div class="hidden svg-decoration-inject hide-this" aria-hidden="true">
	<?php include '_assets/svg/decoration-lines.php'; ?>
	<?php include '_assets/svg/image-filters.php'; ?>
</div>

</body>
</html>
