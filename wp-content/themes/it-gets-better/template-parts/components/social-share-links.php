<?php
  $url = get_permalink(get_the_ID());
  $fbShare = "https://www.facebook.com/sharer.php?u=" . $url;
  $linkedShare = "https://www.linkedin.com/sharing/share-offsite/?url=" . $url;
  $twitterShare = "https://twitter.com/intent/tweet?url="  . $url;
  
?>

<div class="share-section">
  <p>Share</p>
  <div class="links">
    <a href="<?php echo $fbShare; ?>" class="facebook-share share-button ">
      <?php echo file_get_contents(get_template_directory_uri() . "/icons/social/facebook.svg"); ?>
    </a>
    <a href="<?php echo $linkedShare; ?>" class="linked-share share-button ">
      <?php echo file_get_contents(get_template_directory_uri() . "/icons/social/linked.svg"); ?>
    </a>
    <a href="<?php echo $twitterShare; ?>" class="twitter-share share-button ">
      <?php echo file_get_contents(get_template_directory_uri() . "/icons/social/twitter.svg"); ?>
    </a>
  </div>
</div>