var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var atImport = require('postcss-import');
var cssnano = require('cssnano');


gulp.task('styles', function() {
    return gulp.src('./styles/main.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ atImport(), autoprefixer, cssnano() ]))
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'))
});

gulp.task('browser-sync', function() {
    var files = [
        './*.php',
        './style.css',
        '.{png,jpg,gif}'
    ];

    browserSync.init(files, {
        proxy: 'localhost'
    })
});