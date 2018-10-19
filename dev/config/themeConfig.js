'use strict';

module.exports = {
	theme: {
		slug: 't2m',
		name: 't2m',
		author: 'Seth Moder'
	},
	dev: {
		browserSync: {
			live: true,
			proxyURL: 'localhost/t2m/',
			bypassPort: '8080'
		},
		browserslist: [ // See https://github.com/browserslist/browserslist
			'> 1%',
			'last 2 versions'
		],
		debug: {
			styles: false, // Render verbose CSS for debugging.
			scripts: true // Render verbose JS for debugging.
		}
	},
	export: {
		compress: true
	}
};
