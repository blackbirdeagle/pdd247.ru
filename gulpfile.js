var gulp = require('gulp');
var csso = require('gulp-csso');
var concatCss = require('gulp-concat-css');
const compiler = require('google-closure-compiler-js').gulp();
const image = require('gulp-image');

gulp.task('concat', function () {
  return gulp.src('public/static/css/style.css')
    .pipe(concatCss("style.min.css"))
    .pipe(gulp.dest('public/static/css/'));
});

gulp.task('csso', function () {
    return gulp.src('public/app/style.css')
        .pipe(csso())
        .pipe(gulp.dest('public/static/css'));
});

gulp.task('goog', function() {
  return gulp.src('public/static/js/script.js', {base: './'})
      .pipe(compiler({
          compilation_level: 'SIMPLE',
          warning_level: 'DEFAULT',
          output_wrapper: '(function(){\n%output%\n}).call(this)',
          js_output_file: 'script.min.js',  // outputs single file
          create_source_map: true
        }))
      .pipe(gulp.dest('public/static/js/'));
});

gulp.task('image', function () {
  gulp.src('public/images/**/*')
    .pipe(image())
    .pipe(gulp.dest('public/images/img/'));
});