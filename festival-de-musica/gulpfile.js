const {src, dest, watch} = require("gulp"); //extrae la funcionalidad de gulp
const sass = require("gulp-sass")(require("sass"));
const plumber = require('gulp-plumber');

function css(done) {
    src('src/scss/**/*.scss') //identificar el SASS file
        .pipe(plumber())
        .pipe(sass()) //compilarlo
        .pipe(dest('build/css')); //almacenarla en el disco duro

    done(); //callback que avisa a gulp cuando llegamos al final
}
    
function dev(done) {
    watch('src/scss/**/*.scss', css);
    done();
}

exports.css = css;
exports.dev = dev;