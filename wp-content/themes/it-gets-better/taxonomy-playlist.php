<?php
/**
 * The template for displaying tag results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package It_Gets_Better
 */

get_header();

$playlist = get_queried_object();

$term_args = array(
    'post_type' => array('video'),
    'orderby' => 'date',
    'status' => 'published',
    'taxonomy'  => array(
        array(
            'key' => 'playlist',
            'compare' => '=',
            'value' => $playlist->slug
        )
    )
);

$header_image = get_field('header_image', $playlist);
$subheading = get_field('sub_heading', $playlist);
$description = get_field('playlist_description',$playlist);
$partnership_byline = get_field('partnership_byline',$playlist);
$custom_css = get_field('custom_css',$playlist);

?>

	<section id="primary">
		<main id="main" style=" <?php echo  $custom_css; ?>">
     <div class='banner-image' style="background-image: url(<?php if( !empty( $header_image ) ): echo esc_url($header_image['url']); endif; ?>);background-size:cover;background-repeat:no-repeat;background-position:center;height:fit-content;padding:80px 0;min-height:400px;" >
      <?php 
        echo "<div class='banner-inner'>";
        echo "<h4 class='banner-subheading'>" . $subheading . "</h2>";
        echo "<h1 class='banner-heading text-igb-white'>" . $playlist->name . "</h1>";
        echo "<p class='banner-description text-igb-white'>" . $description  . "</p>";
        echo "<p class='banner-description text-igb-white'>" .   $partnership_byline . "</p>";
        echo "<div class='flex justify-start flex-col md:flex-row'>";
        if( have_rows('partner_logos',$playlist) ):
          // loop through partner logos
          while( have_rows('partner_logos',$playlist) ) : the_row();
              
            $image =  get_sub_field('upload_logo',$playlist);

            if( !empty( $image ) ): ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="300" height="450" />
            <?php endif;
          // End loop.
          endwhile;
        endif;
        echo "</div>";
      ?>
      </div>
    </div>
  <?php	if ( have_posts() ) : ?>
	  <section class="archive-cards px-default">
			<?php 
				while ( have_posts() ) :
					the_post();
					get_template_part('template-parts/content/cards/browse', 'card');
				endwhile;
				wp_reset_postdata();
				it_gets_better_the_posts_navigation();
			?>
				
		<?php 
			else:
				get_template_part( 'template-parts/content/content', 'none' );
			endif;
		?>
      </section>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
