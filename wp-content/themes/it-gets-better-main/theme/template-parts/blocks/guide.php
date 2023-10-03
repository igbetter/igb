<?php 
//echo "here we are: ".$is_preview;
//if ( ! empty( $is_preview  ) )
if (get_field('is_preview')){
    $imgUrl = get_template_directory_uri().'/theme/images/preview/Featured-Playlist_Top.jpeg';
?>
<img loading="lazy" src="<?php //$imgUrl; ?>" style="width:100%;height:auto;">

<?php
}else{
    $guide = get_field('edu_guides');

    $eyebrow = isset($guide['eyebrow']) ? $guide['eyebrow'] : '';

    $titleDesc = isset( $guide['title_with_editor'] ) ? $guide['title_with_editor'] : '';
    $TWDTitle = isset( $titleDesc['title_setting']['title_setting_title'] ) ? $titleDesc['title_setting']['title_setting_title'] : '';
    $TWDHeading = isset( $titleDesc['title_setting']['title_setting_heading'] ) ? $titleDesc['title_setting']['title_setting_heading'] : 'h1';
    $TWDDesc = isset( $titleDesc['content'] ) ? $titleDesc['content'] : '';

    $cta = !empty($guide['read_more']) ? $guide['read_more'] : '';
    $image = !empty($guide['image']) ? $guide['image'] : '';

    $is_wide_block = isset( $guide['is_wide_block'] ) ? $guide['is_wide_block'] : '';
    $media_align = isset( $guide['media_align'] ) ? $guide['media_align'] : '';

    if($is_wide_block == 'full'){
        $is_wide_block = 'min-w-full min-h-[400px] pb-10 md:pb-0';
        $full_class = 'md:pl-10';
        $mb_si = 'md:mb-3';
        $blk_content = 'mb-0 max-w-[82%]';
    }
    else{
        $is_wide_block = 'min-w-full py-8 md:py-16';
        $full_class = 'md:pl-0 md:pr-9';
        $mb_si = 'md:mb-3';
        $blk_content = '';
    }
    //print_r($image);

?>

<!-- Section Two Column (Reverse) -->
<section class="section-igbt-two-column <?php echo $is_wide_block;?>">
    <div class="container max-w-full">
        <div class="md:flex <?php echo $media_align;?> md:items-center md:gap-20">
            <div class="basis-1/2">
                <?php if(!empty($image['url'])){ ?>
                    <figure class="thumb">
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'] ? $image['alt'] : $image['name'];?>">
                    </figure>
                <?php } ?>
            </div>
            <div class="basis-1/2">
                <div class="content px-3 <?php echo $full_class;?> mt-5 md:mt-0">
                    <?php if($eyebrow!="") { ?>
                    <span class="block text-sm text-igb-black font-bold tracking-wide mb-1 md:mb-2">
                        <?php echo $eyebrow;?>
                    </span>
                    <?php }?>
                    <<?php echo $TWDHeading;?> class="text-igb-purple text-5xl md:text-[64px] mb-2 <?php echo $mb_si;?>">
                        <?php echo $TWDTitle;?><!--It Gets Better <span class="text-igb-blue">Global</span> -->
                    </<?php echo $TWDHeading;?>>
                    <?php if(!empty($TWDDesc)) { ?>
                    <p class="text-igb-black <?php echo $blk_content;?>">
                        <?php echo strip_tags($TWDDesc);?>
                    </p>
                    <?php } if($cta['url']!="") { ?>
                    <div class="mt-8 md:mt-10">
                        <a href="<?php echo $cta['url'];?>" target="<?php echo $cta['target'];?>" class="bg-igb-blue text-white inline-block font-bold rounded-[3px] py-4 px-7">
                            <?php echo $cta['title'];?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Section Two Column (Reverse) -->
<?php } 