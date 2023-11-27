# gulp.js

## 퍼블리셔를 위한 gulp 세팅

## 1. node 16.20.2

## Gulp-cli & Gulp 설치

```
npm install --global gulp-cli
npm init
npm install --save-dev gulp
```

## 2. package.json 파일 생성

```
{
    "name": "gulp",
    "version": "1.0.0",
    "description": "Gulp & Publishing",
    "main": "index.js",
    "scripts": {
        "test": "echo \"Error: no test specified\" && exit 1"
    },
    "author": "",
    "license": "ISC",
    "devDependencies": {
        "del": "^6.0.0",
        "gulp": "^4.0.2",
        "gulp-concat": "^2.6.1",
        "gulp-ejs": "^5.1.0",
        "gulp-imagemin": "^7.1.0",
        "gulp-newer": "^1.4.0",
        "gulp-rename": "^2.0.0",
        "gulp-sass": "^5.1.0",
        "gulp-sourcemaps": "^3.0.0",
        "gulp-uglify": "^3.0.2",
        "gulp-watch": "^5.0.1",
        "sass": "^1.57.1",
        "vinyl-buffer": "^1.0.1"
    },
    "dependencies": {
        "browser-sync": "^2.27.11"
    }
}

```

## 3. 모듈 설치

```
npm install
```

## 4.gulfile.js 세팅

```js
const defaultTasks = [
    /**
     * your add plugins
     */
];

exports.default = defaultTask;
```

## 5.Test

```
gulp
```
