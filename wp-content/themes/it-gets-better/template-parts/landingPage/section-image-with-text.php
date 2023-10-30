<?php 
  $contents = array(
    array(
      "tagline" => "OUR OFFICIAL YOUTH AMBASSADOR PROGRAM",
      "heading" => "Youth Voices",
      "content" => "Youth Voices is an annual cohort of exceptional young people ages 13-18 who team up with our organization to offer their unique stories and words of advice to other LGBTQ+ youth around the globe! They are students, artists, and activists who are working to change their communities for the better and who have a passion for empowering their community of LGBTQ+ peers with their insights and observations.",
      "link" => home_url() . '/youth-voices',
      "image" => get_template_directory_uri() . '/dummy/image-with-text/image1.png',
    ),
    array(
      "tagline" => "MENTAL HEALTH FOR LGBTQ+ YOUTH",
      "heading" => "Meet imi: A Mental Health Tool for LGBTQ+ Youth",
      "content" => "imi was created through a collaboration of LGBTQ+ organizations, and hundreds of LGBTQ+ young people from across the country – it’s a tool for LGBTQ+ teens, by LGBTQ+ teens and their allies to help you explore your identity and support your mental health. Choose from one of the topics below to get started!",
      "link" => home_url() . ' /introducing-imi/',
      "image" => get_template_directory_uri() . '/dummy/image-with-text/image2.png',
    ),
    array(
      "tagline" => "RESOURCE LIST",
      "heading" => "How to Make Your Classroom More LGBTQ+ Friendly",
      "content" => "It’s essential that all classrooms – both in-person and digital ones – be safe and inclusive places for LGBTQ+ students. This is especially important for students who might lack identity-affirming support at home or in their broader community. Watch what some of our Youth Voices had to say on the topic.",
      "link" => "https://itgetsbetter.wpengine.com/blog/blogs/eduguide/how-to-make-your-digital-classroom-more-lgbtq-friendly",
      "image" => get_template_directory_uri() . '/dummy/image-with-text/image3.png',
    ),
  );
?>
<?php if($contents): ?>
  <?php foreach($contents as $content): ?>
    <section class="section-image-with-text left-image" >
      <div class="image-part">
        <img src="<?php echo $content['image']; ?>" alt="<?php echo $content['tagline']; ?>" />
      </div>
      <div class="text-part">
        <div class="text-content">
          <h4><?php echo $content['tagline']; ?></h4>
          <h2><?php echo $content['heading']; ?></h2>
          <p><?php echo $content['content']; ?></p>
          <a href="<?php echo $content['link']; ?>" class='wp-block-button__link wp-element-button'>
            Learn More
          </a>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
<?php endif; ?>