<?php
            //grab tags to use for each explore more section...
            if(has_tag()):
            $post_tags = get_the_tags();
            $count = 0;
            foreach( $post_tags as $post_tag ) :
                $tag_url = "/tag/" . $post_tag->slug;
                $count++;
                $term = $post_tag->name;
                //get explore more section with specific tag..
                $args = array(
                    'post_type' => array('Post', 'Video'),
                    'orderby'   => 'date',
                    'status'    => 'published',
                    'posts_per_page' => 10,
                    'tag' => $term
                );

                $the_query = new WP_Query( $args );
        ?>
            <?php
                if ( $the_query->have_posts() ) : ?>
                    <div class="more-featured-videos alignfull flex flex-col my-6 px-default sm:visible">
                        <div class='hidden md:flex flex-row justify-between items-center mb-4 '>
                            <h3 class="text-igb-purple dark:text-white mb-0"><?php echo $post_tag->name; ?></h3>
                            <a href="<?php echo $tag_url; ?>" class='default-button float-right clear-right md:float-none md:clear-none'>More <?php echo $post_tag->name; ?> - Content</a>
                        </div>
                        <h2 class="flex md:hidden text-igb-purple dark:text-white mb-0"><?php echo $post_tag->name; ?></h2>
                        <div class="show-more-with-text-slider">
                <?php
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();  
                    $featured_image =  get_the_post_thumbnail_url($post->ID,'full');
                    $title = get_the_title($post->ID);
                    $permalink = get_the_permalink($post->ID);
                    $post_tags = get_the_tags();
                    $backgroundColor = '';
            ?>
                <div>
                    <div class='mb-5 relative'>
                    <img src=' <?php echo get_the_post_thumbnail_url() ?>' width='330' height='150' />
                    <?php 
                        $counts = 0;
                        if ( ! empty( $post_tags ) ) : ?>
                            <ul class="featured-video-terms-slider">
                                <!-- echo term being queried -->
                                <?php
                                echo "<li class='parallelogram rounded-sm bg-igb-purple'><a class='post-tag w-[auto] p-4 md:px-2 text-sm text-white font-poppins' href='/tag/". $term . "/'><span class='skew-fix inline-flex p-2'>" . $term . "</span></a></li>";
                                foreach( $post_tags as $post_tag ) :
                                    if($post_tag->name !== $term){
                                        $counts++;
                                        $counts == 1 ? $backgroundColor = 'bg-igb-pink' : $backgroundColor = 'bg-igb-blue';
                                        echo "<li class='parallelogram rounded-sm " . $backgroundColor . "'><a class='post-tag w-[auto] p-4 md:px-2 text-sm text-white font-poppins' href=" . get_tag_link( $post_tag ) . "><span class='skew-fix inline-flex p-2'>" . $post_tag->name . "</span></a></li>";
                                    }
                                    //set to limit 1 because mockup has 2 tags total, rest use 3
                                    if( $counts > 0 ) break;
                                    endforeach;
                                ?>
                            </ul>
                    <?php endif; ?>
                    </div>
                    <a class="text-igb-purple font-semibold dark:text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                
            <?php 
                if( $counts > 2 )  break;
                endwhile; 
                endif;
            ?>
            </div>
            <a href="<?php echo $tag_url; ?>" class='flex md:hidden default-button max-w-fit my-4'>More <?php echo $post_tag->name; ?> - Content</a>
        </div>
    <?php
endforeach;
endif;
?>