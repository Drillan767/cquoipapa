let mix = require('laravel-mix');

mix
    .js('resources/assets/js/admin/index.js', 'public/js')
    .js('resources/assets/js/front/index.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');