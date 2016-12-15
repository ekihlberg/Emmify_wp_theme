var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var autoprefixer = require('gulp-autoprefixer');

gulp.task('hello', function() {
  console.log('Hello Emma');
});



gulp.task('sass', function(){
  return gulp.src('scss/*.scss')
    .pipe(plumber())
    .pipe(sass()) // Using gulp-sass
    .pipe( autoprefixer( 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4' ) )
    .pipe(gulp.dest('./'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

gulp.task('watch', ['browser-sync', 'sass'], function (){
  gulp.watch('scss/**/*.scss', ['sass']);
  gulp.watch('*.php', browserSync.reload);
  gulp.watch('script/**/*.js', browserSync.reload);
});



gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:8888/wordpress/"
    });
});


gulp.task('default', ['watch','browser-sync', 'sass'])
