<?php 
$args = array(
    'post_type' => 'glossary',
    'orderby' => 'title',
    'order' => 'ASC', 
    'status' => 'published',
    'posts_per_page' => -1,
);
$the_query = new WP_Query( $args );


?>

<div class='flex flex-row py-10'>
    <div class='flex flex-col p-10'>
        <?php  
        if ( $the_query->have_posts() ) : ?>

            <?php while ( $the_query->have_posts() ) : 
                $the_query->the_post(); ?>
                <div class="glossary-row my-4" style="border-bottom: 8px solid <?php echo get_field('border_color', $post->ID) ?>;" >
                <?php
                    echo "<div class='term-title'><h3 class='text-left text-igb-purple dark:text-igb-white font-bold text-3xl mb-4'>" . get_the_title($post->ID) . "<sub class='text-sm' style='color:#45acce;'>( " . get_field( 'concept_group' ) . ") </sub></h3></div>";
                    echo "<div class='term-definition'><p class='text-igb-purple dark:text-igb-white'>" . get_field('definition',$post->ID) . "</p></div>";
                    echo "<div class='term-link'><a href='" . get_the_permalink($post->ID) . "' class='default-button w-fit'>View Term</a></div>"; ?>
                </div>
       <?php
        endwhile; 
    endif;
    ?>
    </div>
</div>
