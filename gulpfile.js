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
        'vendor/datepicker.css',
        'vendor/bootstrap-switch.css',
        'vendor/font-awesome.css',
        'vendor/dataTables.bootstrap.css',
        'vendor/dataTables.responsive.css',
        'vendor/dataTables.tableTools.min.css',
        'vendor/animate.css',
        'vendor/inspinia.css',
        'main.css'
    ], 'public/css/libraries.css');

    mix.scripts([
        'vendor/jquery-2.1.4.min.js',
        'vendor/bootstrap.js',
        'vendor/datepicker.js',
        'vendor/bootstrap-switch.js',
        'vendor/metisMenu.min.js',
        'vendor/jquery.slimscroll.min.js',
        'vendor/jquery.dataTables.js',
        'vendor/dataTables.bootstrap.js',
        'vendor/dataTables.responsive.js',
        'vendor/dataTables.tableTools.min.js',
        'vendor/inspinia.js'
    ], 'public/js/libraries.js');
});
