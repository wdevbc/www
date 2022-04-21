// load plugins
const gulp = require("gulp");                           // gulp 호출
const browsersync = require("browser-sync").create();   // browser-sync 호출, create 메서드로 생성을 먼저 해줘야 함(브라우저 자동 *refresh 어플리케이션)
const del = require("del");                             // 폴더, 파일 초기화
const concat = require("gulp-concat");                  // 파일 병합
const merge = require('merge-stream');                  // 여러 stream 병합
const uglify = require("gulp-uglify");                  // js 압축
const rename = require("gulp-rename");                  // 이름 변경
const babel = require("gulp-babel");                    // js 컴파일
const sass = require('gulp-sass')(require('sass'));                  // scss 컴파일
const autoprefixer = require('gulp-autoprefixer');      // css prefix
const gcmq = require("gulp-group-css-media-queries");   // 중복되는 mediaquery 구문 merge
const cleanCSS = require('gulp-clean-css');             // css minify -> gcmq 사용 시 sass outputStyle이 적용이 안되므로 css compressed를 위해 추가
const imagemin = require("gulp-imagemin");              // 이미지 압축
const newer = require("gulp-newer");                    // dist 폴더의 결과물보다 최신의 timestamp를 가진 경우만 실행
const fileinclude = require('gulp-file-include');
const spritesmith = require('gulp.spritesmith');        // sprite 이미지
const sourcemaps = require("gulp-sourcemaps");          // 배포용으로 빌드한 파일과 원본 파일을 연결시켜주는 기능(파일 에러 디버깅 시 소스맵을 이용해 배포용 파일 특정 부분이 원본 소스의 어떤 부분인지 확인 하는 것)
                                                        // -> gulp4 이상 부터는 gulp-sourcemaps를 사용하지 않고도 gulp.src 메서드를 사용할때 옵션으로 소스맵 처리 가능
                                                        
// 경로 변수(src: 작업용 폴더, dist: 배포용 폴더)
var src = "work";
var dist = "dist";

// 작업용 폴더 파일 path
var path = {
    html: src + "/html/*",
    scss: src + "/assets/scss/*",
    js: src + "/assets/js/*.js",
    lib: src + "/assets/lib/*",
    images: src + "/assets/images/*",
    sprite: src + "/assets/images/sprite",
    font: src + "/assets/font/*"
};

// dist 폴더 파일 path
var destpath = {
    html: dist + "/",
    scss: dist + "/assets/scss/",
    js: dist + "/assets/js/",
    lib: dist + "/assets/lib/",
    images: dist + "/assets/images/",
    font: dist + "/assets/font/"
};

// js, scss concat(병합) 시 파일 이름 지정
var fileName = {
    style: "common.css",
    javascript: "common.js"
};

// scss options
var scssOptions = {
    // 코드 스타일 / values: nested, expanded, compact, compressed
    outputStyle : "expanded",
    // 들여쓰기 / values : space , tab
    indentType : "tab",
    // 들여쓰기 갯수 / default: 2
    indentWidth : 1,
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
function clean () { 
    return del([dist + "/*"]);
}

// html task
function html () {
    return gulp.src(path.html)
    .pipe(gulp.dest(destpath.html))
}

// css task
function style () {
    return merge(
        gulp.src(path.scss)
        .pipe(concat(fileName.style))     // 파일 합칠 필요 없을 때 주석 처리
        .pipe(sass(scssOptions).on("error", sass.logError))
        .pipe(autoprefixer({cascade: false}))
        .pipe(gcmq())         // mediaquery 미사용 시 주석 처리
        .pipe(cleanCSS())     // gcmq 플러그인 사용시 sass outputStyle 지정이 안되므로 file minify를 원할 시 실행, mediaquery 미사용 시 주석 처리
        .pipe(rename({suffix: ".min" }))
        .pipe(gulp.dest(destpath.scss))
        .pipe(browsersync.stream()),
    )
}
// lib
function lib () {
    return gulp.src(path.lib)
        .pipe(gulp.dest(destpath.lib))
        .pipe(browsersync.stream())
}

// font
function font () {
    return gulp.src(path.font)
    .pipe(newer(destpath.font))
    .pipe(gulp.dest(destpath.font))
}

// js task
function javascript () {
    return merge(
        gulp.src(path.js, {sourcemaps: true})
        .pipe(concat(fileName.javascript))
        .pipe(babel())
        .pipe(uglify())
        .pipe(rename({ 
            suffix: ".min" 
        }))             
        .pipe(gulp.dest(destpath.js))
        .pipe(browsersync.stream()),
        
    )
}

// image task
function images () {
    return gulp.src(path.images)
        .pipe(newer(destpath.images))
        .pipe(imagemin([
            // customize image optimize
            imagemin.gifsicle({interlaced: true}),
            imagemin.mozjpeg({quality: 80, progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(gulp.dest(destpath.images))
        .pipe(browsersync.stream());
}
function sprite () {
    const spriteData = gulp.src(path.sprite + '/*.png')
    .pipe(spritesmith({
        retinaSrcFilter: path.sprite + '/*@2x.png',
        imgName: 'sprite.png',
        retinaImgName: 'sprite@2x.png',
        padding: 5,
        cssName: 'sprite.scss',
        cssName: 'sprite.css',
    }));
    return spriteData
    .pipe(gulp.dest(destpath.images))
    .pipe(gulp.src(path.sprite + '/*.png'))
    .pipe(gulp.dest(destpath.images + '/sprite/'))
}

function fileincludes () {
    return gulp.src([
        "./work/html/*.html", // ★★★★ 불러올 파일의 위치 
        "!" + "./html/include" // ★★★★ 읽지 않고 패스할 파일의 위치 
    ]) 
    .pipe(fileinclude ({ 
        prefix: '@@', 
        basepath: '@file' 
    })) 
    .pipe(gulp.dest(destpath.html)) // ★★★★ 변환한 파일의 저장 위치 지정 
}

// browser-sync
function setBrowserSync () {
    browsersync.init({
        server: {
            baseDir: "./dist", 
            index: browserSyncFileName,
        }
    });
}

// watch files
function watch () {
    gulp.watch(path.scss, style);
    gulp.watch(path.js, javascript);
    gulp.watch(path.images, images);
    // gulp.watch(path.html, html).on("change", browsersync.reload);
    gulp.watch(path.html + "*", fileincludes).on("change", browsersync.reload);
}

// assets copy
function copy () {
    return gulp.src(src + '/assets/**/**/**')
    .pipe(gulp.dest(dist + '/backassets/'))
}

/* 
 * ==============================
 * gulp 실행
 * Command Line Texting -> watch: gulp, build: gulp build
 * series 함수는 Task를 순차적으로 실행
 * parallel 함수는 Task를 병렬로 실행
 * ==============================
*/
//걸프실행
const defaultitem = [
    watch,
    setBrowserSync,
    fileincludes
]
//빌드
const builditem = [
    style,
    javascript,
    lib,
    images,
    fileincludes,
    font,
    sprite
]
module.exports = {
    default: gulp.parallel(defaultitem),
    build: gulp.series(clean, gulp.parallel(builditem)),
    // 추가 명령어
    sprite: gulp.series(sprite),//gulp sprite
    clean: gulp.series(clean),//gulp clean
    배포: gulp.series(clean, gulp.parallel(builditem)),//빌드 한국어
    실행: gulp.parallel(defaultitem),
    원본복사: gulp.series(copy)//assets 폴더 통으로 복사
};