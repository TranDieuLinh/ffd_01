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
elixir(function(mix) {
    mix.copy('bower_components/bootstrap', 'public/bower_components/bootstrap');
    mix.copy('bower_components/font-awesome', 'public/bower_components/font-awesome');
    mix.copy('bower_components/jquery', 'public/bower_components/jquery');
});
