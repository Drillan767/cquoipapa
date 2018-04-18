let mix = require('laravel-mix');

let $ = require('jquery');

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix
    .js('resources/assets/js/admin/index.js', 'public/js')
    .js('resources/assets/js/front/index.js', 'public/js')
   .sass('resources/assets/sass/front.scss', 'public/css');