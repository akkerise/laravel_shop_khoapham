const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');
});
var gulp = require('gulp'),
    php = require('gulp-connect-php');

// create a task to serve the app
gulp.task('serve', function() {

    // start the php server
    // make sure we use the public directory since this is Laravel
    php.server({
        base: './public'
    });

});