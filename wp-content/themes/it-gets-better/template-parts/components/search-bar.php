<?php
/**
 * search bar for sticky header
 */
?>
<div class="site_search_bar search_closed">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<div class="search_form_row">
			<label>
				<span class="screen-reader-text">Search this site</span>
				<input id="search" type="search" placeholder="Search this site" value="<?php echo get_search_query(); ?>" name="s">
			</label>
			<input class="search_button" type="submit" value="Search">
		</div>
	</form>
	<a id="search_bar_toggle" class="search_closed" href="#">
		<div class="search_icon">
			<span class="screen-reader-text">Open Search Bar</span>
		</div>
	</a>
</div>
