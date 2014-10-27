// gulpfile.js

// --- INIT
var gulp = require('gulp'),  
    less = require('gulp-less'), // compiles less to CSS
    sass = require('gulp-sass'), // compiles sass to CSS
    concat = require('gulp-concat'),
    autoprefixer = require('gulp-autoprefixer'), //adds prefixes ex: -webkit
    minify = require('gulp-minify-css'), // minifies CSS
    uglify = require('gulp-uglify'); //minifies js

// Paths variables
var paths = {  
    'dev': {
        'scss': './public/dev/scss/',
        'js': './public/dev/js/'
    },
    'assets': {
        'css': './public/assets/css/',
        'js': './public/assets/js/'
    }

};

// --- TASKS
gulp.task('style.css', function(){
    return gulp.src(paths.dev.scss+'style.scss') //input
        .pipe(sass())
        .pipe(gulp.dest(paths.assets.css)) //output
        .pipe(autoprefixer())
        .pipe(minify({keepSpecialComments:0}))
        .pipe(gulp.dest(paths.assets.css)); // output: style.min.css
});

gulp.task('main.js', function(){  
    return gulp.src([
        //paths.assets.vendor+'jquery/dist/jquery.js',
        paths.dev.js+'main.js'
    ])
    .pipe(concat('main.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.assets.js));
});

// --- WATCH

gulp.task('watch', function() {  
    gulp.watch(paths.dev.scss, ['style.css']);
    gulp.watch(paths.dev.js, ['main.js']);
});

// --- DEFAULT
gulp.task('default', ['watch', 'style.css', 'main.js']);
