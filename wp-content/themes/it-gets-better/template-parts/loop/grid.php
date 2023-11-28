<?php
/**
 *
 * looped content in a grid layout
 *
 */

 $post_type = get_post_type( $post->ID );

 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<object class="group_container">
			<span class="content_type <?php esc_html_e( $post_type ); ?>"></span>
			<?php the_post_thumbnail( 'medium' ) ?>
			<h3 class="item_title"><?php the_title(); ?></h3>
		</object>
	</a>
 </article>