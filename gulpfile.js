var gulp = require('gulp'),
    // qunit = require("gulp-qunit"),
    uglify = require('gulp-uglify'),
    clean = require('gulp-clean'),
    rename = require('gulp-rename'),
    SRC = 'lib/underscore.string.js',
    DEST = 'dist',
    MIN_FILE = 'underscore.string.min.js',
    TEST_SUITES = ['test/test.html', 'test/test_underscore/index.html'];

var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');

// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./app"
    });

    gulp.watch("app/scss/*.scss", ['sass']);
    gulp.watch("app/*.html").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("app/scss/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("app/css"))
        .pipe(browserSync.stream());
});

// Compile Sass
gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('dist/js'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
});

// Lint Task
gulp.task('lint', function() {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

gulp.task('test', function() {
    return gulp.src(TEST_SUITES)
        .pipe(qunit());
});

gulp.task('clean', function() {
    return gulp.src(DEST)
        .pipe(clean());
});

//Watch task
gulp.task('watch', function() {
    gulp.watch('js/*.js', ['lint', 'scripts']);
    gulp.watch('sass/**/*.scss',['styles', 'serve', 'sass', 'scripts']);
});

gulp.task('build', ['test', 'clean'], function() {
    return gulp.src(SRC)
        .pipe(uglify())
        .pipe(rename(MIN_FILE))
        .pipe(gulp.dest(DEST));
});
