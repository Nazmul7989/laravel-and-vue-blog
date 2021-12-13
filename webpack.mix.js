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

mix.js('resources/js/app.js', 'public/js',)
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();

mix.js('resources/js/app2.js', 'public/js/app2.js');

// mix.styles([
//
//     'public/assets/frontend/css//bootstrap.css',
//     'public/assets/frontend/css/bootstrap-responsive.css',
//     'public/assets/frontend/css/fancybox/jquery.fancybox.css',
//     'public/assets/frontend/css/jcarousel.css',
//     'public/assets/frontend/css/flexslider.css',
//     'public/assets/frontend/css/style.css',
//     'public/assets/frontend/skins/default.css',
//
// ], 'public/css/all.css');


// mix.scripts([
//
//     'public/assets/frontend/js/jquery.js',
//     'public/assets/frontend/js/jquery.easing.1.3.js',
//     'public/assets/frontend/js/bootstrap.js',
//     'public/assets/frontend/js/jcarousel/jquery.jcarousel.min.js',
//     'public/assets/frontend/js/jquery.fancybox.pack.js',
//     'public/assets/frontend/js/jquery.fancybox-media.js',
//     'public/assets/frontend/js/google-code-prettify/prettify.js',
//     'public/assets/frontend/js/portfolio/jquery.quicksand.js',
//     'public/assets/frontend/js/portfolio/setting.js',
//     'public/assets/frontend/js/jquery.flexslider.js',
//     'public/assets/frontend/js/jquery.nivo.slider.js',
//     'public/assets/frontend/js/modernizr.custom.js',
//     'public/assets/frontend/js/jquery.ba-cond.min.js',
//     'public/assets/frontend/js/jquery.slitslider.js',
//     'public/assets/frontend/js/animate.js',
//     'public/assets/frontend/js/custom.js',
//
// ], 'public/js/all.js');
