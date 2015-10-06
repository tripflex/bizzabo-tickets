module.exports = function( grunt ) {

	require('load-grunt-tasks')(grunt);

	var pkg = grunt.file.readJSON( 'package.json' );

	var bannerTemplate = '/**\n' +
		' * <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
		' * <%= pkg.author.url %>\n' +
		' *\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;\n' +
		' * Licensed GPLv2+\n' +
		' */\n';

	var compactBannerTemplate = '/** ' +
		'<%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %> | <%= pkg.author.url %> | Copyright (c) <%= grunt.template.today("yyyy") %>; | Licensed GPLv2+' +
		' **/\n';

	// Project configuration
	grunt.initConfig( {

		pkg: pkg,
		build: { js: 'assets/js/build', css: 'assets/css/build', dir: 'dist/<%= pkg.version %>/<%= pkg.name %>' },
		min: { css: 'assets/css', js: 'assets/js' },

		watch:  {
			styles: {
				files: ['assets/**/*.css','assets/**/*.scss'],
				tasks: ['styles'],
				options: {
					spawn: false,
					livereload: true,
					debounceDelay: 500
				}
			},
			scripts: {
				files: ['assets/**/*.js'],
				tasks: ['scripts'],
				options: {
					spawn: false,
					livereload: true,
					debounceDelay: 500
				}
			},
			php: {
				files: ['**/*.php', '!vendor/**.*.php'],
				tasks: ['php'],
				options: {
					spawn: false,
					debounceDelay: 500
				}
			}
		},

		makepot: {
			dist: {
				options: {
					domainPath: '/languages/',
					potFilename: pkg.name + '.pot',
					type: 'wp-plugin'
				}
			}
		},

		addtextdomain: {
			dist: {
				options: {
					textdomain: pkg.name
				},
				target: {
					files: {
						src: ['**/*.php']
					}
				}
			}
		},
		copy: {
			deploy: {
				src: [
					'**',
					'!.bowerrc',
					'!.travis.yml',
					'!.yo-rc.json',
					'!bower.json',
					'!phpunit.xml',
					'!Gruntfile.js',
					'!dist/**',
					'!package.json',
					'!node_modules/**',
					'!includes/**/node_modules/**',
					'!includes/**/Gruntfile.js',
					'!includes/**/package.json',
					'!bin/**',
					'!tests/**',
				],
				dest: '<%= build.dir %>/',
				expand: true
			},
			pot: {
				src: '<%= build.dir %>/languages/<%= pkg.name %>.pot',
				dest: 'languages/<%= pkg.name %>.pot',
				expand: false
			}
		},

		clean: {
			deploy: {
				src: [ '<%= build.dir %>/' ]
			},
			dist: {
				src: [ 'dist/*' ]
			}
		},

		compress: {
			plugin: {
				options: {
					archive: 'dist/<%= pkg.name %>_<%= pkg.version %>.zip'
				},
				expand: true,
				cwd: '<%= build.dir %>/',
				dest: '<%= pkg.name %>',
				src: [ '**/**' ]
			}
		},
		wp_readme_to_markdown: {
			plugin: {
				files: {
					'readme.md': 'readme.txt'
				},
			},
		},
	} );

	// Default task.
	grunt.registerTask( 'scripts', [] );
	grunt.registerTask( 'deploy', [ 'clean', 'wp_readme_to_markdown' ,'copy', 'compress' ] );
	grunt.registerTask( 'styles', [] );
	grunt.registerTask( 'php', [ 'addtextdomain', 'makepot' ] );
	grunt.registerTask( 'default', ['styles', 'scripts', 'php'] );

	grunt.util.linefeed = '\n';
};
