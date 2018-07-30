let mix = require('laravel-mix');
let $ = require('jquery');

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix
    .js('resources/assets/js/admin/admin.js', 'public/js')
    .js('resources/assets/js/front/index.js', 'public/js')
   .sass('resources/assets/sass/front.scss', 'public/css')
   .sass('resources/assets/sass/admin.scss', 'public/css');