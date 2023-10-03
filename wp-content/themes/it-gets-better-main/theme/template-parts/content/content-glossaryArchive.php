<?php
/**
 * Template part for displaying single glossary
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package It_Gets_Better
 */


?>
<div id="template-archive-glossary" <?php post_class(); ?>>
    <?php the_content(); ?>
    <div class="flex flex-col md:flex-row justify-center w-full h-auto">
        <?php get_template_part( 'template-parts/content/content', 'glossaryListItem' ); ?>
    </div>
</div><!-- #post-${ID} -->