// Set Preflight flag and Tailwind Typography class name based on the build
// target.
let includePreflight, typographyClassName;
if ('editor' === process.env._TW_TARGET) {
	includePreflight = false;
	typographyClassName = 'block-editor-block-list__layout';
} else {
	includePreflight = true;
	typographyClassName = 'prose';
}

module.exports = {
	darkMode: 'class',
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
		'../../../plugins/*.php',
		'./theme/theme.json',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			screens: {
				sm: '600px',
				xl: '1440px',
				'3xl': { min: '1920px', max: '2559px' },
				'4xl': '2560px',
			},
			content: {
				'magnify-light':
					"url('../theme/icons/search_bar/magnifying-glass-light.png')",
				'magnify-dark':
					"url('../theme/icons/search_bar/magnifying-glass-dark.png')",
			},
			colors: {
				'igb-pink': '#f2566b',
				'igb-blue': '#45acce',
				'igb-purple': '#512b67',
				'igb-purple-gray': '#F4F3F7',
				'igb-orange': '#faad40',
				'igb-black': '#292929',
				'igb-white': '#efefef',
				'igb-gray': '#ededed',
				'igb-darkmode-lightgray': '#414141',
				'igb-darkmode-gray': '#333233',
				'igb-darkmode-textblack': '#292929',
				'igb-yellow': '#FAAD3F',
			},
			hover: ['dark'],
			backgroundImage: (theme) => ({
				// 'menu-dark': "url('../theme/icons/nav-button-dark.png')",
				// 'menu-light': "url('../theme/icons/nav-button-light.png')",
				'search-toggle-dark':
					"url('../theme/icons/search-toggle-dark.svg')",
				'search-toggle-light':
					"url('../theme/icons/search-toggle-light.svg')",
				'igb-horizontal-blue':
					"url('../theme/icons/dividers/pink-blue-divider.svg')",
				'igb-horizontal-organge':
					"url('../theme/icons/dividers/orange-pink-divider.svg')",
				'igb-horizontal-blue-only':
					"url('../theme/icons/dividers/blue-divider.svg')",
			}),
		},
	},
	variants: {
		extend: {
			display: ['dark'],
		},
	},
	safelist: [
		'font-bold',
		'w-1/2',
		'h-1/2',
		'block',
		'visible',
		'invisible',
		'hidden',
		'max-w-fit',
		'flex-col-reverse',
		'opacity-90',
		'bg-white',
		'bg-black',

		{ pattern: /(m|mx|my|mb|mt|p|px|py|pb|pt)-(0|2|4|6|8|10)/ },
		{ pattern: /(w|h)-(full|screen|fit)/ },
		{
			pattern:
				/(bg|text|border)-(igb-pink|igb-blue|igb-purple|igb-orange|igb-black|igb-darkmode-lightgray|igb-darkmode-gray)/,
		},
		{ pattern: /(bg)-(cover|contain)/ },
	],

	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson')(require('../theme/theme.json')),

		// Add Tailwind Typography.
		// require('@tailwindcss/typography')({
		// 	className: typographyClassName,
		// }),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/forms' ),
		// require( '@tailwindcss/aspect-ratio' ),
		// require( '@tailwindcss/line-clamp' ),
		// require( '@tailwindcss/container-queries' ),
	],
};
