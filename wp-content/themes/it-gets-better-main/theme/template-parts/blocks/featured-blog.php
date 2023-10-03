<?php 
//echo "here we are: ".$is_preview;
//if ( ! empty( $is_preview  ) )
if (get_field('is_preview')){
    $imgUrl = get_template_directory_uri().'/theme/images/preview/Featured-Playlist_Top.jpeg';
?>
<img loading="lazy" src="<?php //$imgUrl; ?>" style="width:100%;height:auto;">

<?php
}else{ 
    $content = get_field('featured_blog');
    //print_r($content);

    $eyebrow = isset($content['eyebrow']) ? $content['eyebrow'] : '';

    $titleDesc = isset( $content['title_with_editor'] ) ? $content['title_with_editor'] : '';
    $TWDTitle = isset( $titleDesc['title_setting']['title_setting_title'] ) ? $titleDesc['title_setting']['title_setting_title'] : '';
    $TWDHeading = isset( $titleDesc['title_setting']['title_setting_heading'] ) ? $titleDesc['title_setting']['title_setting_heading'] : 'h1';
    $TWDDesc = isset( $titleDesc['content'] ) ? $titleDesc['content'] : '';

    $cta = !empty($content['cta']) ? $content['cta'] : '';
    $image = !empty($content['image']) ? $content['image'] : '';
?>
<!-- Section Featured Blog -->
<section class="section-igbt-featured-blog min-w-full py-10">
    <div class="container max-w-full md:px-10">
        <div class="igbt-featured-blog relative">
            <?php if(!empty($image['url'])){ ?>
            <figure class="igbt-featured-blog__thumbnail aspect-[3/2]">
                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'] ? $image['alt'] : $image['name'];?>" class="w-full h-full object-fit">
            </figure>
            <?php } ?>
            <div class="igbt-featured-content bg-igb-purple-gray md:absolute bottom-0 right-0 py-16 pl-3 pr-16 md:pb-20 md:pr-10 md:pl-[256px] md:w-[67%] md:mr-[-40px]">
                <?php if($eyebrow!="") { ?>    
                <span class="block text-sm font-bold igb-black md:mb-4">
                    FEATURED BLOG
                </span>
                <?php } ?>
                <<?php echo $TWDHeading;?> class="text-igb-purple text-5xl md:text-[100px] mb-4 md:mb-6">
                    <?php echo $TWDTitle;?>
                </<?php echo $TWDHeading;?>>
                <?php if(!empty($TWDDesc)) { ?>
                    <p class="dark:text-igb-black">
                        <?php echo strip_tags($TWDDesc);?>
                    </p>
                <?php } ?>
                <?php if($cta['url']!="") { ?>
                    <div class="mt-6">
                        <a href="<?php echo $cta['url'];?>" target="<?php echo $cta['target'];?>" class="bg-igb-blue text-white inline-block font-bold rounded-[3px] py-4 px-7">
                            <?php echo $cta['title'];?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- /Section Featured Blog -->

<?php } 