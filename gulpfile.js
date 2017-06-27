const gulp = require('gulp');
const standard = require('gulp-standard')
const autoprefixer = require('gulp-autoprefixer')
const babel = require('gulp-babel')
const concat = require('gulp-concat')
const cssmin = require('gulp-cssmin')
const sass = require('gulp-sass')
const rename = require("gulp-rename")
const uglify = require('gulp-uglify')
const sourcemaps = require('gulp-sourcemaps')
const tap = require('gulp-tap')
const gutil = require('gulp-util')
const browserify = require('browserify')
const buffer = require('gulp-buffer')

gulp.task('scripts', function(){
  gulp.src('./assets/scripts/*', {read: false})
		.pipe(standard())
    .pipe(standard.reporter('default', {
      breakOnError: true,
      quiet: true
    }))
		.pipe(tap(function (file) {

      gutil.log('bundling ' + file.path);

      // replace file contents with browserify's bundle stream
      file.contents = browserify(file.path, {debug: true}).bundle();

    }))
    .pipe(buffer())
    .pipe(babel({
      presets: ['es2015']
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/scripts/'));
});

gulp.task('styles', function(){
  return gulp.src('./assets/styles/main.scss')
    .pipe( sass().on('error', sass.logError) )
    .pipe(autoprefixer({
      browsers: [
        'last 2 versions',
        'android 4',
        'opera 12'
      ]
    }))
    .pipe(cssmin())
    .pipe( rename("main.min.css") )
    .pipe( gulp.dest('./dist/styles/') );
});

gulp.task('build', ['styles', 'scripts'],function(){
  console.log('build done');
});

gulp.task('watch', function() {
  console.log('watching');
  gulp.watch(['./assets/styles/*'], ['styles']);
  gulp.watch(['./assets/scripts/*'], ['scripts']);
});