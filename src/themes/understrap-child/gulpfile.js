"use strict";

const { src, dest, parallel, series, watch } = require("gulp");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const rename = require("gulp-rename");
const webpack = require("webpack-stream");
const sass = require("gulp-sass");
const cleancss = require("gulp-clean-css");
const autoprefixer = require("gulp-autoprefixer");
const sourcemaps = require("gulp-sourcemaps");
const gcmq = require("gulp-group-css-media-queries");
const size = require("gulp-size");

function scripts() {
    return src("src/js/main.js")
        .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
        .pipe(
            webpack({
                mode: "production",
                output: {
                    filename: "child-theme.js",
                },
                module: {
                    rules: [
                        {
                            test: /\.m?js$/,
                            exclude: /(node_modules|bower_components)/,
                            use: {
                                loader: "babel-loader",
                                options: {
                                    presets: [
                                        [
                                            "@babel/preset-env",
                                            {
                                                corejs: 3,
                                                useBuiltIns: "usage",
                                            },
                                        ],
                                    ],
                                },
                            },
                        },
                    ],
                },
            })
        )
        .pipe(dest("./js/"))
        .pipe(
            size({
                gzip: true,
                pretty: true,
                showFiles: true,
                showTotal: true,
            })
        )
}

function styles() {
    return src("src/sass/child-theme.scss")
        .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: "expanded" }))
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 8 versions"],
                cascade: true,
                browsers: ["Android >= 6", "Chrome >= 20", "Firefox >= 24", "Explorer >= 11", "iOS >= 6", "Opera >= 12", "Safari >= 6"],
            })
        )
        .pipe(gcmq())
        .pipe(
            cleancss({
                level: {
                    2: {
                        specialComments: 0,
                        // format: "beautify",
                    },
                },
            })
        )
        .pipe(rename("child-theme.css"))
        .pipe(sourcemaps.write("."))
        .pipe(dest("./css/"))
        .pipe(
            size({
                gzip: true,
                pretty: true,
                showFiles: true,
                showTotal: true,
            })
        )
}

function startwatch() {
    watch("src/sass/**/*.scss", styles);
    watch("src/js/**/*.js", scripts);
}

exports.scripts = scripts;
exports.styles = styles;

exports.default = series(parallel(scripts, styles, startwatch));