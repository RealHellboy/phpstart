const { src, dest, parallel, series, watch } = require('gulp');
const browserSync  = require('browser-sync').create();
const concat       = require('gulp-concat');
const uglify       = require('gulp-uglify-es').default;
const sass         = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleancss     = require('gulp-clean-css');
const imagemin     = require('gulp-imagemin');
const newer        = require('gulp-newer');
const del          = require('del');



function browsersync() {
	browserSync.init({
		server: { baseDir: 'app/' },
		notify: false,
		online: true
	})
}

function styles(){
	return src('app/sass/*.sass')
	.pipe(sass())
	.pipe(autoprefixer({
		overrideBrowserslist: ['last 10 versions'],
		grid: true
	}))
	.pipe(cleancss(( {format: 'beautify'} )))
	.pipe(dest('app/css/'))
	.pipe(browserSync.stream());
}


function images() {
	return src('app/img/src/**/*')
	.pipe(newer('app/img/dest/'))
	.pipe(imagemin())
	.pipe(dest('app/img/dest'))
}

function cleanimg() {
	return del('dist/img/**/*', {force: true})
}

function cleandist() {
	return del('dist/**/*', {force: true})
}

function buildcopy() {
	return src([
		'app/css/**/*.css',
		'app/js/**/*.js',
		'app/img/dest/**/*',
		'app/**/*.html',
		'app/**/*.php',
	], {base: 'app'})
	.pipe(dest('dist'))
}

function startwatch() {
	watch(['app/**/*.sass'], styles);
	watch(['app/**/*.js', '!app/**/*.min.js', '!app/**/*-min.js',], scripts);
	watch('app/**/*.html').on('change', browserSync.reload);
	watch('app/img/src/**/*', images)
}

// ==== scripts streaming ===== //
function scripts() {
	return src([
		'app/js/**/*.js',
	])
	.pipe(browserSync.stream());
}

// ==== compressing plugins ===== //
function plugins() {
	return src([
		'app/js/plugins/*.js',
		'!app/js/plugins/*.min.js'
	])
	.pipe(uglify())
	.pipe(dest('app/js/plugins/'))
	.pipe(browserSync.stream());
}


exports.browsersync = browsersync;
exports.scripts = scripts;
exports.plugins = plugins;
exports.styles = styles;
exports.images = images;
exports.cleanimg = cleanimg;

exports.default = parallel(styles, scripts, browsersync, startwatch);

exports.build = series(cleandist, styles, scripts, plugins, images, buildcopy);
