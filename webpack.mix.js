const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Extensions
mix.js([
        'resources/js/app.js'
    ]
    , 'public/js')
    .vue();



mix.styles([
    'resources/css/app.css',
    'resources/css/summernote-bs4.min.css',
], 'public/css/allExt.css');
