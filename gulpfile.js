var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var atImport = require('postcss-import');
var cssnano = require('cssnano');
var babel = require('gulp-babel');
var uglify = require('gulp-uglify');


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

gulp.task('scripts', function() {
    return gulp.src('scripts/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['es2015']
        }))
        .pipe(concat('vinali.js'))
        .pipe(gulp.dest('./'))
        .pipe(uglify({mangle: true}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'));
});

gulp.task('watch', function() {
    gulp.watch('./scripts/**/*.js', ['scripts'])
    gulp.watch('./styles/**/*.css', ['styles'])
});