// gulpfile.js
var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var uglifyjs = require('gulp-uglify');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function () {
    return gulp.src('app/assets/css/*.css')
        .pipe(minifycss())
        .pipe(gulp.dest('public/assets/css/'));
});

gulp.task('scripts', function () {
    return gulp.src('app/assets/js/*.js')
        .pipe(uglifyjs())
        .pipe(concat('plugins.js'))
        .pipe(gulp.dest('public/assets/js/'));
});

//CSS Compilation
gulp.task('pluginsCss', function (){
    return gulp.src('app/assets/plugins/bootstrap/dist/css/bootstrap.min.css')
        .pipe(minifycss())
        .pipe(gulp.dest('public/assets/css'));
});

//JS Compilation
gulp.task('pluginsScripts', function (){
    return gulp.src(['app/assets/plugins/bootstrap/dist/js/bootstrap.js'])
        .pipe(uglifyjs())
        .pipe(concat('bootstrap.js'))
        .pipe(gulp.dest('public/assets/js'));
});

gulp.task('pluginsJquery', function (){
    return gulp.src(['app/assets/plugins/jquery/dist/jquery.js'])
        .pipe(uglifyjs())
        .pipe(concat('jquery.js'))
        .pipe(gulp.dest('public/assets/js'));
});

gulp.task('fonts', function(){
    return gulp.src('app/assets/fonts/**/')
        .pipe(gulp.dest('public/assets/fonts/'))
});

gulp.task('images', function(){
    return gulp.src('app/assets/images/**/*')
        .pipe(gulp.dest('public/assets/images/'))
});

gulp.task('dev', function () {
    config.env = 'dev';
    gulp.watch(
      [
          //All the folders that need to be
          //watched for changes
          'app/assets/js/**/*.js',
          'app/assets/css/**/*.css',
          'app/assets/fonts/**/*',
          'app/assets/images/**/*'
      ],
      ['pluginsCss','pluginsScripts', 'pluginsJquery', 'css','scripts','fonts','images']
    );
});

gulp.task('prod',
          ['pluginsCss','pluginsScripts','pluginsJquery', 'css','scripts','fonts','images']
         );

gulp.task('default',['prod']);
