var gulp = require('gulp');
var csso = require('gulp-csso');

gulp.task('csso', function () {
    return gulp.src('public/css/style.css')
        .pipe(csso())
        .pipe(gulp.dest('public/static/css'));
});