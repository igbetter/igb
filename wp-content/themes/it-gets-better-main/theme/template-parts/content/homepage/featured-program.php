<?php
  $programs = array(
    array(
      "heading" => "50 States. 50 Grants. 5000 Voices.",
      "description" => "Meet the 2023 grant recipients who are making a difference for LGBTQ+ students in schools throughout the U.S. and Canada.",
      "link" => "https://itgetsbetter.wpengine.com/blog/meet-the-grantees-2023/",
      "image" => get_template_directory_uri() . "/dummy/featured-program/image1.png"
    ),
    array(
      "heading" => "It Gets Better Project on Twitch",
      "description" => "See who’s live this week by following us on Twitch and check our charity streaming leaderboard on Tiltify!",
      "link" => "https://itgetsbetter.wpengine.com/contribute-content/",
      "image" => get_template_directory_uri() . "/dummy/featured-program/image2.jpg"
    ),
    array(
      "heading" => 'Meet "imi": A Mental Health Tool for LGBTQ+ Youth',
      "description" => "imi was created through a collaboration of LGBTQ+ organizations, and hundreds of LGBTQ+ young people from across the country – it’s a tool for LGBTQ+ teens, by LGBTQ+ teens and their allies to help you explore your identity and support your mental health",
      "link" => "https://itgetsbetter.wpengine.com/introducing-imi/",
      "image" => get_template_directory_uri() . "/dummy/featured-program/image3.png"
    ),
  );
?>


<?php if($programs): ?>
  <div class="wp-block-igb-theme-featured-program-slider">
    <div class="theme-featured-program-slider">
      <?php foreach($programs as $program): ?>
        <div>
          <div class="wp-block-igb-theme-slide featured-program-slide background-image-outer alignfull" style="background-image:url(<?php echo $program['image']; ?>);background-size:cover;background-position:center">
            <div class="inner-container-block">
              <div class="wp-block-group slide-group">
                <h4 class="wp-block-heading sub-headline">
                  Featured Program
                </h4>
                <h2 class="wp-block-heading">
                  <?php echo $program['heading']; ?>
                </h2>
                <p class="text-content">
                  <?php echo $program['description']; ?>
                </p>
                <div class="wp-block-button slide-btn">
                  <a class="wp-block-button__link wp-element-button" href="<?php echo $program['link']; ?>">
                    Learn More
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="button-wrapper">
      <button class="featured-program-slick-arrow slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>
      <button class="featured-program-slick-arrow slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
    </div>
  </div>
<?php endif; ?>