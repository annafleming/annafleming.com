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

    mix.styles([
        'vendor/bootstrap.css',
        'app.css',
    ],null, 'public/css');

    mix.scripts([
        'vendor/jquery-2.1.4.min.js',
        'main.js',
        'chart.js',
    ], null, 'public/js');

    mix.copy(
        'resources/assets/fonts', 'public/css/fonts'
    );
});

