// path 모듈 불러오기
const path = require('path');
// html 플러그인을 불러오고
const HtmlWebpackPlugin = require('html-webpack-plugin');
// css 외부 사용
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
// 빌드시에 불필요 파일 제거
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    entry: './src/index.js',
    output: {
        // 최종 번들링된 자바스크립트
        filename: 'main.js',
        // dist를 배포용 폴더로 사용
        path: path.resolve(__dirname, 'dist')
    },
    // 여기에 설정
    plugins: [
        new HtmlWebpackPlugin({
            template: "./index.html" // index.html을 기본 템플릿으로 반영할 수 있도록 설정
        }),
        new MiniCssExtractPlugin({
            filename: "common.css",
        }),
        new CleanWebpackPlugin(),
    ],
    module: {
        rules: [
            {
                test: /\.css$/,
                // use 배열은 뒤에서부터 적용된다.
                use: [MiniCssExtractPlugin.loader, "css-loader"]
            },
            // file-loader 세팅
            {
                test: /\.(png|jpe?g|gif|svg|webp)$/i,
                use: ['file-loader'],
            }
        ]
    },
    devServer: {
        // 개발 서버가 dist 폴더를 제공할 수 있도록 설정
        static: {
            directory: path.resolve(__dirname, 'dist')
        },
        port: 8080
    }
}