// Include gulp
var gulp = require('gulp');

// Include plugins
var plugins = require("gulp-load-plugins")({
	pattern: ['gulp-*', 'gulp.*', 'main-bower-files'],
	replaceString: /\bgulp[\-.]/
});
var sass = require('gulp-ruby-sass');
var minifyCss = require('gulp-minify-css');
var browserSync = require('browser-sync').create();

// Define default destination folder
var dest = 'wordpress/wp-content/themes/a3m/';

gulp.task('modernizr', function() {
  gulp.src('**/modernizr/**/*.js')
    .pipe(plugins.modernizr())
    .pipe(plugins.uglify())
    .pipe(gulp.dest(dest + 'js'))
});

gulp.task('js', function() {

	var jsFiles = [
      'inc/jquery-2.1.0.min/index.js',
      'inc/respond/dest/respond.matchmedia.addListener.min.js',
      'inc/respond/dest/respond.min.js',
      'inc/Chart.js/Chart.min.js',
      'inc/chartist/dist/chartist.min.js',
      'inc/slick-carousel/slick/slick.min.js'
    ];

	gulp.src(plugins.mainBowerFiles(jsFiles).concat(jsFiles))
		.pipe(plugins.filter('*.js'))
		.pipe(plugins.order([
			'index.js',
      'respond.matchmedia.addListener.min.js',
      'respond.min.js',
      'Chart.min.js',
      'chartist.min.js',
      'slick.min.js'
		]))
		.pipe(plugins.concat('main.js'))
		//.pipe(plugins.uglify())
		.pipe(gulp.dest(dest + 'js'));

});

gulp.task('jshint', function() {
  return gulp.src(dest + 'main.js')
    .pipe(plugins.jshint())
    .pipe(plugins.jshint.reporter('jshint-stylish'));
});

gulp.task('fonts', function () {
  gulp.src(plugins.mainBowerFiles('**/*.{otf,eot,svg,ttf,woff,woff2}'))
    .pipe(plugins.filter('**/*.{otf,eot,svg,ttf,woff,woff2}'))
    .pipe(gulp.dest(dest + 'fonts'));
});

gulp.task('css', function() {
  /*var cssFiles = [
    'inc/pure/pure.css',
    'inc/pure/base.css',
    'inc/pure/grids.css',
    'inc/pure/grids-responsive.css',
    'inc/components-font-awesome/css/font-awesome.css',
    'inc/hover/css/hover.css',
    'inc/animate.css/animate.css',
    'inc/select2/dist/css/select2.css',
    'inc/slick-carousel/slick/slick-theme.css',
    'inc/slick-carousel/slick/slick.css'
  ];*/
	var cssFiles = [
    'inc/**/*.css'
  ];

	gulp.src(plugins.mainBowerFiles(cssFiles).concat(cssFiles))
		.pipe(plugins.ignore.exclude([
      '**/*.min.css', 
      '**/*-min.css',
      '**/demo-page.css', 
      'pure/*.css', 
      '!pure/pure.css',
      '!pure/grids.css',
      '!pure/grids-responsive.css'
    ]))
		.pipe(plugins.order([
			'pure/pure.css',
      'pure/grids.css',
      'pure/grids-responsive.css',
      'components-font-awesome/css/font-awesome.css',
			'hover/css/hover.css',
      'select2/dist/css/select2.css',
      'slick-carousel/slick/slick-theme.css',
      'slick-carousel/slick/slick.css',
      'animate.css/animate.css',
      'chartist/dist/chartist.min.css'
			], {base: './inc/'}))
		.pipe(plugins.concat('main.css'))
		.pipe(plugins.minifyCss())
		.pipe(gulp.dest(dest + 'css'));

});

gulp.task('sass', function() {

    return sass('inc/scss/style.scss', {style: 'compressed'})
        .pipe(plugins.rename({suffix: '.min'}))
        .pipe(gulp.dest(dest + 'css'))
        .pipe(browserSync.stream());
});

gulp.task('index', function () {
  
  return gulp.src('wordpress/wp-content/themes/a3m/index.php')
  		.pipe(plugins.inject(
  			gulp.src(['wordpress/wp-content/themes/a3m/js/*.js', 'wordpress/wp-content/themes/a3m/css/*.css'], {read: false}), {
  				ignorePath: '/wordpress/wp-content/themes/a3m/', 
  				relative: true
  			}))
    	.pipe(gulp.dest(dest));
});

gulp.task('reload', function () {
    browserSync.reload();
});

gulp.task('serve', ['sass'], function() {

    browserSync.init({
        proxy: "http://localhost/a3m/wordpress/wp-content/themes/a3m/"
    });

    gulp.watch("./inc/scss/*.scss", ['sass']);
    gulp.watch("**/*.php", ['reload']);
});

gulp.task('watch', function() {
  // Watch .js files
  gulp.watch('inc/*.js', ['scripts']);
  // Watch main.js file bug
  gulp.watch('wordpress/wp-content/themes/a3m/js/main.js', ['jshint']);
  // Watch .css files
  gulp.watch('inc/*.css', ['css']);
  // Watch .scss files
  gulp.watch('inc/sass/*.scss', ['scss']);
});

// Default Task
gulp.task('default', ['js', 'jshint', 'css', 'sass', 'watch', 'serve']);


