'use strict';

const gulp = require( 'gulp' );
const sass = require( 'gulp-sass' );
const cleanCSS = require( 'gulp-clean-css' );
const sourcemaps = require( 'gulp-sourcemaps' );
const gulpSequence = require( 'gulp-sequence' );
const rename = require( 'gulp-rename' );
const uglify = require( 'gulp-uglify' );
const autoprefixer = require( 'gulp-autoprefixer' );
const imagemin = require( 'gulp-imagemin' );
const concat = require( 'gulp-concat' );

// Configuration file to keep your code DRY
const cfg = require( './gulpconfig.json' );
const paths = cfg.paths;

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task( 'watch', function () {
	gulp.watch( './sass/**/*.scss', ['styles'] );
	gulp.watch( './src/js/**/*.js', ['scripts'] );
});

gulp.task( 'sass', function () {
	return gulp.src( './sass/**/*.scss' )
		.pipe( sourcemaps.init() )
		.pipe( sass().on( 'error', sass.logError ) )
		.pipe( autoprefixer( 'last 2 versions' ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( './css' ) );
});

gulp.task( 'minifycss', function () {
	return gulp.src( [ './css/*.css', '!./css/*.min.css' ] )
		//.pipe( sourcemaps.init() )
		.pipe( cleanCSS( { compatibility: '*', level: 0 } ) )
		//.pipe( sourcemaps.write( './' ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest('./css') );
});

gulp.task( 'scripts', function() {
    var scripts = [

        // Start - All BS3 stuff
        paths.dev + '/js/bootstrap3/bootstrap.js',

        // End - All BS3 stuff

        paths.dev + '/js/skip-link-focus-fix.js',

        // Adding currently empty javascript file to add on for your own themes´ customizations
        // Please add any customizations to this .js file only!
        paths.dev + '/js/navigation.js',
        //paths.dev + '/js/customizer.js',
        paths.dev + '/js/jquery.mobile.custom.js',
        paths.dev + '/js/main.js',
        paths.dev + '/js/konami.js',
        paths.dev + '/js/snow.js',
        paths.dev + '/js/404.js',        
        paths.dev + '/js/jquery.highlight-5.js',
        //paths.dev + '/js/highlight-search.js',
        paths.dev + '/js/smooth-scroll.js',
        paths.dev + '/js/sharing.js',
        paths.dev + '/js/glossary.js',        
    ];

	gulp.src( scripts )
		.pipe( sourcemaps.init() )
		.pipe( concat( 'main.js' ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.js ) );

	gulp.src( scripts )
		//.pipe( sourcemaps.init() )
		.pipe( concat( 'main.min.js' ) )
		.pipe( uglify() )
		//.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.js ) );

	// Admin
    var scripts = [
        paths.dev + '/js/car-counter.js',
    ];

	gulp.src( scripts )
		.pipe( sourcemaps.init() )
		.pipe( concat( 'car-counter.js' ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.js ) );

	gulp.src( scripts )
		//.pipe( sourcemaps.init() )
		.pipe( concat( 'car-counter.min.js' ) )
		.pipe( uglify() )
		//.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.js ) );

	// highlight-search
    var scripts = [
        paths.dev + '/js/highlight-search.js',
    ];

	gulp.src( scripts )
		.pipe( sourcemaps.init() )
		.pipe( concat( 'highlight-search.js' ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.js ) );

	gulp.src( scripts )
		//.pipe( sourcemaps.init() )
		.pipe( concat( 'highlight-search.min.js' ) )
		.pipe( uglify() )
		//.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.js ) );

	// customizer - default Underscores theme script
    var scripts = [
        paths.dev + '/js/customizer.js',
    ];

	gulp.src( scripts )
		.pipe( sourcemaps.init() )
		.pipe( concat( 'customizer.js' ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.js ) );
} );

gulp.task( 'styles', function( cb ) {
	gulpSequence( 'sass', 'minifycss' )( cb );
} );

// Run:
// gulp imagemin
// Running image optimizing task
gulp.task( 'imagemin', function() {
	gulp.src( './src/images/**' )
	.pipe( imagemin() )
	.pipe( gulp.dest( './images' ) );
});

// Run:
// gulp build
// Build CSS, JS and images files
gulp.task( 'build', function( cb ) {
	gulpSequence( 'sass', 'minifycss', 'scripts', 'imagemin' )( cb );
} );

gulp.task('default', function() {
  // place code for your default task here
});
