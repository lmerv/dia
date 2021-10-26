// Gulp API
const { src, dest, watch, series, parallel }    = require('gulp');

// Gulp packages
var gulp                = require('gulp');
var sass                = require('gulp-sass')(require('sass'));
const babel             = require("gulp-babel");
const sourcemaps        = require('gulp-sourcemaps');
const plumber           = require('gulp-plumber');
const autoprefixer      = require('gulp-autoprefixer');
const connect           = require('gulp-connect-php');
// en attente de js 
const uglify            = require('gulp-uglify');
// Browser Sync
const browserSync = require('browser-sync');
// var browserSync = require("browser-sync").create();
var url = 'http://localhost/www.avt-avocats.ch';

// Files
const files = {
    sass_src_path: './assets/sass/**/*.scss',
    cssMap_dest_path: './assets/maps',
    js_src_path: './assets/js/src/**/*.js',
    js_dest_path: './assets/js',
};

function sassDevTask() {
    return src(files.sass_src_path)
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass()) //  {outputStyle: 'compressed'}).on('error', sass.logError)     dev: compact prod : compressed : {outputStyle: 'compressed'} remplace css nano
        .pipe(autoprefixer('last 2 versions'))
        .pipe(sourcemaps.write(files.cssMap_dest_path))
        .pipe(dest('./'))
        .pipe(browserSync.stream())
};

function jsDevTask() {
    return src(files.js_src_path)
    .pipe(babel(
      {
        presets: ["@babel/preset-env"]
      }
      ))
    // .pipe(uglify()) On teste babel.
    .pipe(dest(files.js_dest_path))
    .pipe(browserSync.stream())
};

function watchDevTask() 
    {
        connect.server(
            {
                port: 8000,
                keepalive: true,
                base: "."
            },
            function ()
            {
                browserSync({
                    proxy: url
                });
            }
        );

        watch([files.sass_src_path],
            {
                intervall: 750, usePolling: true},
                series(
                    parallel(sassDevTask),
            )
        );

        watch([files.js_src_path],
            {
                intervall: 750, usePolling: true},
                series(
                    parallel(jsDevTask),
            )
        );

        gulp.watch('./**/*.php').on('change',browserSync.reload);
};

exports.default = series(
    parallel(sassDevTask),
    // parallel(jsDevTask),
    watchDevTask,
);