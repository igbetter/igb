<?php
/**
 *
 * looped content in a grid layout
 *
 */

 $post_type = get_post_type( get_the_ID() );

 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<object class="group_container">
			<span class="content_type <?php esc_html_e( $post_type ); ?>">
				<svg class="icon-content_type">
					<use xlink:href="#CONTENT_TYPE_<?php esc_html_e( $post_type ); ?>"></use>
				</svg>
			</span>
			<?php the_post_thumbnail( 'medium' ) ?>
			<?php echo igb_display_related_glossary_term_tags( get_the_ID(), $post_type, true ); ?>
			<h3 class="item_title"><?php the_title(); ?></h3>
		</object>
	</a>
 </article>