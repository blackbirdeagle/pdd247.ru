var gulp = require('gulp');
var csso = require('gulp-csso');
const compiler = require('google-closure-compiler-js').gulp();

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