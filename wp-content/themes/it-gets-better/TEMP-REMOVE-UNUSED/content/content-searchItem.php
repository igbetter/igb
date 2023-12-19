<div class="search-item-container">
<div class='search-item' style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');background-size:cover;background-repeat:no-repeat;background-position:center;">
<?php 
$post_tags = get_the_tags();
$count=0;
if ( ! empty( $post_tags ) ) :
    echo '<ul id="postTags" class="post-tags-list">';
    foreach( $post_tags as $post_tag ) :
        $count++;
        echo '<li class="tag parallelogram rounded-sm"><a class="post-tag-small w-[auto]" href="' . get_tag_link( $post_tag ) . '"><span class="skew-fix inline-flex">' . $post_tag->name . '</span></a></li>';
        if( $count > 2 ) break;
    endforeach;
echo '</ul>';
endif;
?>
</div>
<h3 class='search-title'><a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
</div>