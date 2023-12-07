<?php
$queried = get_queried_object();
$browseContentPage = get_posts(
	array(
		'name'        => 'browse-content',
		'post_type'   => 'page',
		'post_status' => 'published',
		'numberposts' => 1
	)
)[0];
?>

<ul>
	<?php if( $queried->post_type === 'post' ): ?>
		<li>
			<a href="<?php echo get_post_type_archive_link( $queried->post_type ); ?>">
				Blog
			</a>
		</li>
		<li>
			<a href="<?php echo get_post_type_archive_link( $queried->post_type ); ?>">
				Stories
			</a>
		</li>
	<?php endif; ?>
	<?php if( $queried->post_type === 'video' ): ?>
		<li>
			<a href="<?php echo get_the_permalink( $browseContentPage->ID ); ?>">
				<?php echo get_the_title( $browseContentPage->ID ); ?>
			</a>
		</li>
		<li>
			<a href="<?php echo get_post_type_archive_link( $queried->post_type ); ?>">
				<?php echo get_post_type_object( $queried->post_type )->label; ?>
			</a>
		</li>
	<?php endif; ?>
	<?php if( $queried->taxonomy ): ?>
		<li>
			<a href="<?php echo get_tag_link( $queried ); ?>">
				<?php echo get_taxonomy( $queried->taxonomy )->label; ?>
			</a>
		</li>
	<?php endif; ?>
	<li>
		<span><?php echo $queried->post_type ? $queried->post_title : $queried->name; ?></span>
	</li>
</ul>