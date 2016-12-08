/*
 * Soco
 * http://www.socothorntonparkrg.org
 *
 * Copyright (c) 2014 Joel Lopez, Ascentus LLC
 * Not licensed for public use
 */

'use strict';

module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		/* SET TASKS */

		/* PROCESS SASS FILES (Convert to CSS) */
		compass: {
			dev: {
				options: {
					environment: 'development',
					config: 'config.rb'
				}
			}
		},

		/* COMPRESS JS FILES */
		uglify: {
			dev: {
				files: [{
					expand: true,
					compress: true,
					cwd: 'js/src',
					src: '**/*.js',
					dest: 'js/min'
				}]
			}
		},

		/* MERGE OR 'CONCATENATE' JS FILES */
		concat: {
			options: {
				separator: ''
			},
			dev: {
				src: ['js/min/**/*.js', '!js/min/maps.js', '!js/min/html5.js', '!js/min/respond.min.js', '!js/min/jquery.backgroundSize.js'],
				dest: 'js/main.js'
			}
		},

		// /* COMPRESS IMAGES */
		// imagemin: {
		// 	dynamic: {
		// 		files: [{
		// 			expand: true,
		// 			cwd: 'img/uncompressed',
		// 			src: ['**/*.{png,jpg,gif}'],
		// 			dest: 'img/compressed/'
		// 		}]
		// 	}
		// },


		/* COPY FILES THAT HAVE BEEN GENERATED IN THE GRUNT FOLDER */
		copy: {

			/* Copy CSS files */
			css: {
				files: [

					// Copy CSS files to WORDPRESS site
					{
						cwd: 'css/',
						src: ['**'],
						dest: '../site/static/_assets/css/',
						expand: true,
						filter: 'isFile'
					},

					// Copy CSS files to WORDPRESS site
					{
						cwd: 'css/',
						src: ['**'],
						dest: '../site/wordpress/wp-content/themes/soco-site/_assets/css/',
						expand: true,
						filter: 'isFile'
					}
				]
			},

			/* Copy JS Files to their corresponding destinations */
			js: {
				files: [

					// Copy Main JS to STATIC site
					{
						src: ['js/main.js'],
						dest: '../site/static/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy Main JS to WORDPRESS site
					{
						src: ['js/main.js'],
						dest: '../site/wordpress/wp-content/themes/soco-site/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy Maps JS to STATIC site
					{
						src: ['js/min/maps.js'],
						dest: '../site/static/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy Maps JS to WORDPRESS site
					{
						src: ['js/min/maps.js'],
						dest: '../site/wordpress/wp-content/themes/soco-site/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy HTML 5 Shiv JS to STATIC site
					{
						src: ['js/min/html5.js'],
						dest: '../site/static/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy HTML 5 Shiv JS to WORDPRESS site
					{
						src: ['js/min/html5.js'],
						dest: '../site/wordpress/wp-content/themes/soco-site/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy Respond JS to STATIC site
					{
						src: ['js/min/respond.min.js'],
						dest: '../site/static/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy Respond JS to WORDPRESS site
					{
						src: ['js/min/respond.min.js'],
						dest: '../site/wordpress/wp-content/themes/soco-site/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy background JS to STATIC site
					{
						src: ['js/min/jquery.backgroundSize.js'],
						dest: '../site/static/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					},

					// Copy background JS to WORDPRESS site
					{
						src: ['js/min/jquery.backgroundSize.js'],
						dest: '../site/wordpress/wp-content/themes/soco-site/_assets/js/',
						expand: true,
						flatten: true,
						filter: 'isFile'
					}
				]
			},

			/* Copy compressed images to their corresponding destinations */
			images: {
				files: [

					// Copy images to STATIC site
					{
						cwd: 'img/compressed/',
						src: ['**'],
						dest: '../site/static/_assets/img/',
						expand: true
					},

					// Copy images to WORDPRESS site
					{
						cwd: 'img/compressed',
						src: ['**'],
						dest: '../site/wordpress/wp-content/themes/soco-site/_assets/img/',
						expand: true
					}
				]
			}
		},

		/* WATCH THESE FILES/DIRECTORIES FOR CHANGES, THEN RUN THE GRUNT TASK */
		watch: {

			// Watch SASS files and run compass task
			sass: {
				files: ['sass/**/*.sass'],
				tasks: ['compass']
			},

			// Watch Generated CSS files
			css: {
				files: ['css/*.css'],
				tasks: ['copy:css']
			},

			// Watch JS (source) files, and compress them
			jsmin: {
				files: ['js/src/**/*.js'],
				tasks: ['uglify']
			},

			// Watch JS (compressed) files, and merge them
			jsconcat: {
				files: ['js/min/**/*.js'],
				tasks: ['concat']
			},

			// Watch Main.JS and Maps.JS files and copy them
			jscopy: {
				files: ['js/main.js', 'js/maps.js'],
				tasks: ['copy:js']
			}

			// // Watch if images have changed
			// imagemin: {
			// 	files: ['img/uncompressed/**/*.*'],
			// 	tasks: ['imagemin', 'copy:images']
			// }
		}
	});

	grunt.registerTask('default', ['compass', 'uglify', 'concat', 'copy', 'watch']);
	// grunt.registerTask('images', ['imagemin']);

};
