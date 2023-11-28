<?php
/**
 * import for SVG gradient map filters (duo-tone)
 */

 ?>

 <svg class="injected_svg">

	<filter id="duotone-purple_yellow" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
		<feColorMatrix type="matrix"
			values=".21 1 .71 0 0
				.02 .1 0.22 0 0
				.61 .23 .45 0 0
				0 0 0 1 0"
			in="SourceGraphic" result="colormatrix"/>
		<feComponentTransfer in="colormatrix" result="componentTransfer">
			<feFuncR type="table" tableValues="0.85 0.74 0.88"/>
			<feFuncG type="table" tableValues="0.54 0.58 0.8"/>
			<feFuncB type="table" tableValues="0.93 0.75 0.16"/>
			<feFuncA type="table" tableValues="0 1"/>
		</feComponentTransfer>
		<feBlend mode="color" in="componentTransfer" in2="SourceGraphic" result="blend"/>
	</filter>


	<filter id="duotone-blue_purple" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
		<feColorMatrix type="matrix"
			values="0 .13 .7 0 0
				.33 .2 .33 0 0
				0 .13 .8 0 0
				0 0 0 1 0"
			in="SourceGraphic" result="colormatrix"/>
		<feComponentTransfer in="colormatrix" result="componentTransfer">
			<feFuncR type="table" tableValues="0.75 0.24"/>
			<feFuncG type="table" tableValues="0.25 0.77"/>
			<feFuncB type="table" tableValues="0.64 0.95"/>
			<feFuncA type="table" tableValues="0 1"/>
		</feComponentTransfer>
		<feBlend mode="color" in="componentTransfer" in2="SourceGraphic" result="blend"/>
	</filter>

	<filter id="duotone-pink_yellow" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
		<feColorMatrix type="matrix"
			values="0 .13 0.2 0 0
				.33 .33 .33 0 0
				.33 .33 .33 0 0
				0 0 0 1 0"
			in="SourceGraphic" result="colormatrix"/>
		<feComponentTransfer in="colormatrix" result="componentTransfer">
			<feFuncR type="table" tableValues="0.52 0.95 0.98"/>
			<feFuncG type="table" tableValues="0 0.34 0.96"/>
			<feFuncB type="table" tableValues="0.51 0.43 0.25"/>
			<feFuncA type="table" tableValues="0 1"/>
		</feComponentTransfer>
		<feBlend mode="color" in="componentTransfer" in2="SourceGraphic" result="blend"/>
	</filter>

	<filter id="duotone-purple_lightpurple" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
		<feColorMatrix type="matrix"
			values=".33 .33 .33 0 0
				.33 .33 .33 0 0
				.33 .33 .33 0 0
				0 0 0 1 0"
			in="SourceGraphic" result="colormatrix"/>
		<feComponentTransfer in="colormatrix" result="componentTransfer">
			<feFuncR type="table" tableValues="0.37 0.91"/>
			<feFuncG type="table" tableValues="0.23 0.67"/>
			<feFuncB type="table" tableValues="0.49 0.86"/>
			<feFuncA type="table" tableValues="0 1"/>
		</feComponentTransfer>
		<feBlend mode="color" in="componentTransfer" in2="SourceGraphic" result="blend"/>
	</filter>

	<filter id="duotone-blue_pink" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
		<feColorMatrix type="matrix"
			values="0 1 0 0 0
				0 1 0 0 0
				0 1 0 0 0
				0 0 0 1 0"
			in="SourceGraphic" result="colormatrix"/>
		<feComponentTransfer in="colormatrix" result="componentTransfer">
			<feFuncR type="table" tableValues="0.3 1"/>
			<feFuncG type="table" tableValues="0.82 0.52"/>
			<feFuncB type="table" tableValues="1 0.59"/>
			<feFuncA type="table" tableValues="0 1"/>
		</feComponentTransfer>
		<feBlend mode="color" in="componentTransfer" in2="SourceGraphic" result="blend"/>
	</filter>

	<filter id="duotone-purple_pink" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
		<feColorMatrix type="matrix"
			values=".33 .33 .33 0 0
				.33 .33 .33 0 0
				.33 .33 .33 0 0
				0 0 0 1 0"
			in="SourceGraphic" result="colormatrix"/>
		<feComponentTransfer in="colormatrix" result="componentTransfer">
			<feFuncR type="table" tableValues="0.37 1"/>
			<feFuncG type="table" tableValues="0.23 0.52"/>
			<feFuncB type="table" tableValues="0.49 0.59"/>
			<feFuncA type="table" tableValues="0 1"/>
		</feComponentTransfer>
		<feBlend mode="color" in="componentTransfer" in2="SourceGraphic" result="blend"/>
	</filter>


 </svg>