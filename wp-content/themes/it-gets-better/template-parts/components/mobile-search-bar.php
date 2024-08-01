<?php
/**
 * search bar for sticky header
 */
?>
<div class="mobile_site_search_bar">
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<div class="search_form_row">
			<label>
				<span class="screen-reader-text">Search this site</span>
				<input id="search" type="search" placeholder="Search this site" value="<?php echo get_search_query(); ?>" name="s">
			</label>

		</div>
	</form>

</div>
