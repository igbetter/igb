<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */

?>

<style>

    .igbt-featured-content {
        -webkit-clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
        clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
    }

</style>

<footer id="colophon">
    <?php 
        if (is_active_sidebar('footer-main') ) : ?>
        <div role="complementary" aria-label="<?php esc_attr_e('Footer', 'itgetsbetter'); ?>">
            <?php dynamic_sidebar('footer-main'); ?>
        </div>
    <?php endif;
    if (is_active_sidebar('footer-bottom') ) : ?>
        <div role="complementary" aria-label="<?php esc_attr_e('Footer Bottom', 'itgetsbetter'); ?>">
            <?php dynamic_sidebar('footer-bottom'); ?>
        </div>
    <?php endif; 
    ?>
</footer><!-- #colophon -->
