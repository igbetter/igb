<?php
$popularTermsQuery = array(
	'post_type' => 'glossary',
	'orderby' => 'rand',
	'status' => 'published',
	'posts_per_page' => 14,
	'meta_query'  => array(
		array(
			'key' => 'popular',
			'value' => true
			)
		)
	);


	$results = get_posts($popularTermsQuery);

	$popularBrowseTermsHeading = "Popular Browse Terms";
	$tagTemplate = '<a class="associated-post-tag" style="background-color: %s" href="%s"><span>%s</span></a>';
	$glossaryLink = home_url('glossary');
?>

<?php if($results): ?>
	<section class="popular-browse-terms">
		<h2 class="section-header">
			<?php echo $popularBrowseTermsHeading; ?>
		</h2>
    <ul class="term_list">
		<?php
		foreach ( $results as $result ) :
			$color = get_field('border_color', $result->ID);
			$tagLink = get_the_permalink($result);
			$name = get_field('button_text', $result->ID);

			printf(
				'<li class="term background-%s">
					<a href="%s"><span>%s</span></a>
				</li>',
				esc_html( $color ),
				esc_url( $tagLink ),
				esc_html( $name )
			);
        endforeach;
		?>
		<li class="term more_terms">
			<a href="<?php echo esc_url( $glossaryLink ) ?>">
				<span>more...</span>
			</a>
		</li>
    </ul>
</section>
<?php endif; ?>