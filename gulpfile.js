var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass([
        'page503.scss'
    ], 'public/css/page503.css');

    mix.sass([
        'admin.scss'
    ], 'public/css/admin.css');

    mix.styles([
        'app.css',
    ],null, 'public/css');

    mix.styles([
        'vendor/bootstrap.css',
        'admin.css',
    ], 'public/css/adminAll.css', 'public/css');

    mix.scripts([
        'vendor/jquery-2.1.4.min.js',
        'main.js',
        'chart.js',
    ], null, 'public/js');

    mix.scripts([
        'vendor/jquery-2.1.4.min.js',
        'admin.js',
    ], 'public/js/adminAll.js', 'public/js');


    mix.copy(
        'resources/assets/fonts', 'public/css/fonts'
    );
});

