const {src, dest, watch,parallel} = require("gulp"); //extrae la funcionalidad de gulp
//css
const sass = require("gulp-sass")(require("sass"));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
//images
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');
//js
const terser = require('gulp-terser-js');

function css(done) {
    src('src/scss/**/*.scss') //identificar el SASS file
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass()) //compilarlo
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('build/css')); //almacenarla en el disco duro
        
    done(); //callback que avisa a gulp cuando llegamos al final
}

function images(done){
    const options = {
        optimizationLevel: 3
    };

    src('src/img/**/*.{png,jpg,jpeg}')
        .pipe(cache(imagemin(options)))
        .pipe(dest('build/img'))
    done();
}

function convertToAvif(done){
    const options = {
        quality: 50
    };

    src('src/img/**/*.{png,jpg,jpeg}')
        .pipe(avif(options))
        .pipe(dest('build/img'))
    done();
}         

function convertToWebp(done){
    const options = {
        quality: 50
    };

    src('src/img/**/*.{png,jpg,jpeg}')
        .pipe(webp(options))
        .pipe(dest('build/img'))
    done();
}
    
function javascript(done) {
    src('src/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(dest('build/js'));
    done();
}

function dev(done) {
    watch('src/scss/**/*.scss', css);
    watch('src/js/**/*.js', javascript);
    done();
}

exports.css = css;
exports.js = javascript;
exports.images = images; 
exports.avif = convertToAvif;
exports.webp = convertToWebp;
exports.dev = parallel(images, convertToWebp, convertToAvif, javascript, dev);