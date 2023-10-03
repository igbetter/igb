<?php 
//echo "here we are: ".$is_preview;
if ( ! empty( $is_preview  ) ){
    $imgUrl = get_template_directory_uri().'/theme/images/preview/Featured-Playlist_Top.jpeg';
?>
<img loading="lazy" src="<?php $imgUrl; ?>" style="width:100%;height:auto;">

<?php
}else{
    $color = get_field('igb_color');
    
    $titleSetting = !empty( $color['title_setting'] ) ? $color['title_setting'] : '';
    $title = isset($titleSetting['title_setting_title']) ?? '';
    $heading = isset($titleSetting['title_setting_heading']) ?? '<h2>';

    $bgColor = isset($color['bg_color']) ? $color['bg_color'] : 'bg-igb-blue';

    // $TWDTitle = isset( $color['title_setting']['title_setting_title'] ) ? $color['title_setting']['title_setting_title'] : '';
    // $TWDHeading = isset( $color['title_setting']['title_setting_heading'] ) ? $color['title_setting']['title_setting_heading'] : 'h1';
    //print_r($color);
    // if(empty($titleSetting['title_setting_title']))
    //     return false;
?>
<!-- Section Color Block -->
<section class="igbt-color-block relative <?php echo $bgColor;?> py-12 md:py-32">
    <div class="container max-w-full px-8 md:px-12">
        <div class="flex">
            <div class="md:basis-[62%]">
                <?php if(!empty($titleSetting['title_setting_title'])) { ?>
                <h2 class="text-2xl md:text-4xl text-white mb-0">
                    <?php echo $titleSetting['title_setting_title'];?>
                </h2>
                <? }?>
            </div>
        </div>
    </div>
</section>
<!-- /Section Color Block -->
<?php
}