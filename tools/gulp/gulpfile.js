const gulp = require("gulp"),
    browsersync = require("browser-sync").create(),
    del = require("del"),
    concat = require("gulp-concat"),
    merge = require('merge-stream'),
    uglify = require("gulp-uglify"),
    rename = require("gulp-rename"),
    babel = require("gulp-babel"),
    sass = require('gulp-sass')(require('sass')),
    autoprefixer = require('gulp-autoprefixer'),
    gcmq = require("gulp-group-css-media-queries"),
    cleanCSS = require('gulp-clean-css'),
    imagemin = require("gulp-imagemin"),
    newer = require("gulp-newer"),
    spritesmith = require('gulp.spritesmith'),
    sourcemaps = require("gulp-sourcemaps"),
    ejs = require("gulp-ejs")

var lang = "/en"
var src = "work" + lang;
var dist = "dist" + lang;

/*
작업용 폴더 파일 path
*/ 
var PATH = {
    HTML: src + "/html/*",
    ASSETS: {
        STYLE: src + "/assets/scss/*",
        SCRIPT: src + "/assets/js/*.js",
        LIB: src + "/assets/lib/*",
        IMAGES: src + "/assets/images/*",
        SPRITE: src + "/assets/images/sprite",
        FONT: src + "/assets/font/*"
    }
};

/*
dist 폴더 파일 path
*/ 
var DESTPATH = {
    HTML: dist + "/",
    ASSETS: {
        STYLE: dist + "/assets/scss/",
        SCRIPT: dist + "/assets/js/",
        LIB: dist + "/assets/lib/",
        IMAGES: dist + "/assets/images/",
        SPRITE: dist + "/assets/images/sprite",
        FONT: dist + "/assets/font/"
    }
};

// js, scss concat(병합) 시 파일 이름 지정
var fileName = {
    style: "common.css",
    javascript: "common.js"
};

// scss options
var scssOptions = {
    // 코드 스타일 / values: nested, expanded, compact, compressed
    outputStyle: "expanded",
    // 들여쓰기 / values : space , tab
    indentType: "tab",
    // 들여쓰기 갯수 / default: 2
    indentWidth: 1,
    // 컴파일 된 css에 원본 소스이 위치와 줄 수 주석 표시
    sourceComments: false
}

// browser-sync index file name(띄워질 html)
var browserSyncFileName = "index.html";

/* 
 * ==============================
 * task start!
 * ==============================
 */
// dist 폴더 정리
function clean() {
    return del('dist')
}

// html task
function html() {
    return gulp.src(PATH.HTML)
        .pipe(gulp.dest(DESTPATH.HTML))
}
// ejs
function gulpEjs() {
    return gulp.src(PATH.HTML)
        .pipe(ejs())
        .pipe(gulp.dest(DESTPATH.HTML))
};

// css task
function style() {
    return merge(
        gulp.src(PATH.ASSETS.STYLE)
        .pipe(concat(fileName.style))
        .pipe(sass(scssOptions).on("error", sass.logError))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(gcmq())
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest(DESTPATH.ASSETS.STYLE))
        .pipe(browsersync.stream()),
    )
}
// lib
function lib() {
    return gulp.src(PATH.ASSETS.LIB)
        .pipe(gulp.dest(DESTPATH.ASSETS.LIB))
        .pipe(browsersync.stream())
}

// font
function font() {
    return gulp.src(PATH.ASSETS.FONT)
        .pipe(newer(DESTPATH.ASSETS.FONT))
        .pipe(gulp.dest(DESTPATH.ASSETS.FONT))
}

// js task
function javascript() {
    return merge(
        gulp.src(PATH.ASSETS.SCRIPT, {
            sourcemaps: true
        })
        .pipe(concat(fileName.javascript))
        .pipe(babel())
        .pipe(uglify())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest(DESTPATH.ASSETS.SCRIPT))
        .pipe(browsersync.stream()),
    )
}

// image task
function images() {
    return gulp.src(PATH.ASSETS.IMAGES)
        .pipe(newer(DESTPATH.ASSETS.IMAGES))
        .pipe(imagemin([
            imagemin.gifsicle({
                interlaced: true
            }),
            imagemin.mozjpeg({
                quality: 75,
                progressive: true
            }),
            imagemin.optipng({
                optimizationLevel: 5
            }),
            imagemin.svgo({
                plugins: [{
                        removeViewBox: true
                    },
                    {
                        cleanupIDs: false
                    }
                ]
            })
        ]))
        .pipe(gulp.dest(DESTPATH.ASSETS.IMAGES))
        .pipe(browsersync.stream());
}

// sprite
function sprite() {
    const spriteData = gulp.src(PATH.ASSETS.SPRITE + '/*.png')
        .pipe(spritesmith({
            retinaSrcFilter: PATH.ASSETS.SPRITE + '/*@2x.png',
            imgName: 'sprite.png',
            retinaImgName: 'sprite@2x.png',
            padding: 5,
            cssName: 'sprite.scss',
            cssName: 'sprite.css',
        }));
    return spriteData
        .pipe(gulp.src(PATH.ASSETS.SPRITE + '/*.png'))
        .pipe(gulp.dest(DESTPATH.ASSETS.SPRITE))
}

// browser-sync
function setBrowserSync() {
    browsersync.init({
        port:8005,
        server: {
            baseDir: dist,
            index: browserSyncFileName,
        }
    });
}

// watch files
function watch() {
    gulp.watch(PATH.ASSETS.STYLE, style);
    gulp.watch(PATH.ASSETS.SCRIPT, javascript);
    gulp.watch(PATH.ASSETS.IMAGES, images);
    gulp.watch(PATH.HTML + "*", gulpEjs).on("change", browsersync.reload);
}

// assets copy
function copy() {
    return gulp.src(src + '/assets/**/**/**')
        .pipe(gulp.dest(dist + '/backassets/'))
}

//걸프실행
const defaultitem = [
    watch,
    setBrowserSync,
    gulpEjs
]
//빌드
const builditem = [
    gulpEjs,
    style,
    javascript,
    lib,
    images,
    font,
    sprite
]

// 초기화시 build 후 gulp 실행
module.exports = {
    default: gulp.parallel(defaultitem),
    build: gulp.series(gulp.parallel(builditem)),
    // 추가 명령어 - 사용법 gulp 명령어
    sprite: gulp.series(sprite), //gulp sprite
    clean: gulp.series(clean), //gulp clean
    배포: gulp.series(gulp.parallel(builditem)), //빌드
    실행: gulp.parallel(defaultitem),
    원본복사: gulp.series(copy), //assets 폴더 통으로 복사
    한글로: gulp.series(gulp.parallel(builditem)) //빌드
};