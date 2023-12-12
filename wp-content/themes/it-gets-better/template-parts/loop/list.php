<a href="<?php the_permalink(); ?>">
<article id="content_ID-<?php echo esc_attr( get_the_ID() );?>" class="single_content_post">
	<div class="flex-row">
		<aside class="thumbnail_image">
			<?php the_post_thumbnail( 'medium_large' ); ?>
		</aside>
		<div class="post_details">
			<h3 class="content_title"><?php the_title(); ?></h3>

		</div>
	</div>
</article>
</a>