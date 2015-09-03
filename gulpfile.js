var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.styles([
        'vendor/bootstrap.css',
        'vendor/font-awesome.css',
        'vendor/dataTables.bootstrap.css',
        'vendor/dataTables.responsive.css',
        'vendor/dataTables.tableTools.min.css',
        'vendor/animate.css',
        'vendor/inspinia.css',
        'main.css'
    ], 'public/css/libraries.css');
});
