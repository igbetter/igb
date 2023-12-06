<?php
/**
 * carousel loop
 *
 */


 printf(
		'
		<li class="slide splide__slide">
			<a href="%s">
				%s
				%s
			</a>
		</li>
		',
		get_the_permalink(),
		get_the_post_thumbnail( get_the_ID(), array( 400, 175 ) ),
		get_the_title()
	);