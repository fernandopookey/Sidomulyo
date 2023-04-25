const gulp = require('gulp');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const del = require('del');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const plumber = require('gulp-plumber');
const notify = require("gulp-notify");
const fileinclude = require('gulp-file-include');
const svgmin = require('gulp-svgmin');
const cheerio = require('gulp-cheerio');
const svgSprite = require('gulp-svg-sprite');
const replace = require('gulp-replace');

function styles() {
   return gulp.src([
      './src/scss/style.scss',
      //Skins
      './src/scss/style-skin-furniture.scss',
      './src/scss/style-skin-climbing.scss',
      './src/scss/style-skin-drugstore.scss',
      './src/scss/style-skin-fishing.scss',
      './src/scss/style-skin-handmade.scss',
      './src/scss/style-skin-organic-vegetables.scss',
      './src/scss/style-skin-cheeses.scss',
      './src/scss/style-skin-candles.scss',
      './src/scss/style-skin-natural-cosmetic.scss',
      './src/scss/style-skin-oneproduct.scss'

   ])
   .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
   .pipe(sass().on('error', sass.logError))
   .pipe(autoprefixer({
	  browsers: ['last 1 versions'],
	  cascade: false
   }))
   .pipe(cleanCSS({
      level: 1
   }))
   .pipe(gulp.dest('./build/css'))
   .pipe(gulp.dest('./src/css'))
   .pipe(browserSync.stream());
}
function stylesrtl() {
   return gulp.src('./src/scss/rtl.scss')
   .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
   .pipe(sass().on('error', sass.logError))
   .pipe(autoprefixer({
	  browsers: ['last 1 versions'],
	  cascade: false
   }))
   .pipe(cleanCSS({
      level: 1
   }))
   .pipe(gulp.dest('./build/css'))
   .pipe(gulp.dest('./src/css'))
   .pipe(browserSync.stream());
}
const jsFiles = [
   './node_modules/slick-carousel/slick/slick.min.js',
   './node_modules/imagesloaded/imagesloaded.pkgd.min.js',
   './src/external/bootstrap/js/bootstrap.min.js',
   './src/external/countdown/jquery.plugin.min.js',
   './src/external/countdown/jquery.countdown.min.js',
   './src/external/panelmenu/panelmenu.js',
   './src/external/instagram-feed/jquery.instagramFeed.min.js',
   './src/external/lazyLoad/lazyload.min.js',
   './src/external/perfect-scrollbar/perfect-scrollbar.min.js',
   './src/external/isotope/isotope.pkgd.min.js',
   './src/external/elevatezoom/jquery.elevatezoom.js',
   './src/external/air-sticky/air-sticky-block.min.js',
   './src/external/magnific-popup/jquery.magnific-popup.min.js',
   './src/external/form/jquery.form.js',
   './src/external/form/jquery.validate.min.js',
   './src/external/form/jquery.form-init.js',
   './src/js/**/*.js'
];

function scripts() {
   return gulp.src(jsFiles,  { allowEmpty: true })
   .pipe(concat('bundle.js'))
   .pipe(uglify({
      toplevel: true
   }))
   .pipe(gulp.dest('./build/js'))
   .pipe(browserSync.stream());
}
function clean() {
   return del(['build/*'])
}
function html() {
   return gulp.src('./src/*.html')
   .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
   .pipe(fileinclude({
	  prefix: '@@',
	  basepath: '@file'
	}))
   .pipe(gulp.dest('./build/'))
   .pipe(browserSync.stream());
}
function favicon() {
   return gulp.src('./src/favicon/*')
   .pipe(gulp.dest('./build/favicon/'))
   .pipe(browserSync.stream());
}
function external() {
   return gulp.src('./src/external/**/*')
   .pipe(gulp.dest('./build/external/'))
   .pipe(browserSync.stream());
}
function font_icons() {
   return gulp.src('./src/font-icons/**/*')
   .pipe(gulp.dest('./build/font-icons/'))
   .pipe(browserSync.stream());
}
function ajax() {
   return gulp.src('./src/ajax-content/*')
   .pipe(gulp.dest('./build/ajax-content/'))
   .pipe(browserSync.stream());
}
function video() {
   return gulp.src('./src/video/*')
   .pipe(gulp.dest('./build/video/'))
   .pipe(browserSync.stream());
}
function scss() {
   return gulp.src('./src/scss/*')
   .pipe(gulp.dest('./build/scss/'))
   .pipe(browserSync.stream());
}
function ajaxContent() {
   return gulp.src('./src/ajax-content/*')
   .pipe(gulp.dest('./build/ajax-content/'))
   .pipe(browserSync.stream());
}
function fontsFolder() {
   return gulp.src('./src/fonts/**/*')
   .pipe(gulp.dest('./build/fonts/'))
   .pipe(browserSync.stream());
}
function img() {
   return gulp.src('./src/images/**/*')
   .pipe(gulp.dest('./build/images/'))
   .pipe(browserSync.stream());
}
function svg(){
   return gulp.src('./src/includes/svg-sprite/item/*.svg')
   .pipe(svgmin({
	  js2svg: {
		  pretty: true
	  }
  }))
  .pipe(cheerio({
   run: function ($) {
	  // $('[fill]').removeAttr('fill');
	  // $('[stroke]').removeAttr('stroke');
	  // $('[style]').removeAttr('style');
   }
 }))
 .pipe(replace('&gt;', '>'))
 .pipe(svgSprite({
	mode:{
	   symbol:{
		  sprite:'../sprite.html'
	   },
	   view:{
		 sprite:'../svg-view.svg'
	  }
	}
 }))
 .pipe(gulp.dest('./src/includes/svg-sprite/'));
}
function watch() {
   browserSync.init({
	  server: {
		  baseDir: "./build/"
	  }
  });
  gulp.watch('./src/scss/**/*.scss', styles)
  gulp.watch('./src/scss/rtl.scss', stylesrtl)
  gulp.watch('./src/js/**/*.js', scripts)
  gulp.watch('./src/**/*.html', gulp.series(html)).on('change', browserSync.reload);
}

gulp.task('svg', svg);
gulp.task('styles', styles);
gulp.task('stylesrtl', stylesrtl);
gulp.task('html', html);
gulp.task('scripts', scripts);
gulp.task('del', clean);
gulp.task('img', img);
gulp.task('fontsFolder', fontsFolder);
gulp.task('external', external);
gulp.task('font_icons', font_icons);
gulp.task('favicon', favicon);
gulp.task('ajax', ajax);
gulp.task('watch', watch);
gulp.task('build', gulp.series(clean, gulp.parallel(styles,stylesrtl,favicon,external,font_icons,ajax,video,scss,ajaxContent,fontsFolder,img,scripts,html)));
gulp.task('dev', gulp.series('build','watch'));