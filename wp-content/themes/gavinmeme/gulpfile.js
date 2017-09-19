var gulp = require('gulp');
var sass = require('gulp-sass');
gulp.task('scss', function () {
    gulp.src('assets/sass/*.scss').pipe(sass().on('error', sass.logError)).pipe(gulp.dest('assets/css/'))
});
gulp.task('watch', function () {
    gulp.watch(['assets/sass/*.scss'], ['scss']);
});
gulp.task('default', ['scss', 'watch']);