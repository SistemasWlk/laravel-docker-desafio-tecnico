let mix = require('laravel-mix');

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

/**
 * Copiando estilos para a pasta public
 */
mix.styles([
    'resources/tema/css/base-admin-responsive.css'
], 'public/tema/css/base-admin-responsive.css');

mix.styles([
    'resources/tema/css/bootstrap.css'
], 'public/tema/css/bootstrap.css');

mix.styles([
    'resources/tema/css/bootstrap.min.css'
], 'public/tema/css/bootstrap.min.css');

mix.styles([
    'resources/tema/css/bootstrap-responsive.min.css'
], 'public/tema/css/bootstrap-responsive.min.css');

mix.styles([
    'resources/tema/css/font-awesome.css'
], 'public/tema/css/font-awesome.css');

mix.styles([
    'resources/tema/css/font-awesome-ie7.css'
], 'public/tema/css/font-awesome-ie7.css');

mix.styles([
    'resources/tema/css/font-awesome-ie7.min.css'
], 'public/tema/css/font-awesome-ie7.min.css');

mix.styles([
    'resources/tema/css/font-awesome.min.css'
], 'public/tema/css/font-awesome.min.css');

mix.styles([
    'resources/tema/css/style.css'
], 'public/tema/css/style.css');

mix.styles([
    'resources/tema/css/pages/dashboard.css'
], 'public/tema/css/pages/dashboard.css');

mix.styles([
    'resources/tema/css/pages/faq.css'
], 'public/tema/css/pages/faq.css');

mix.styles([
    'resources/tema/css/pages/plans.css'
], 'public/tema/css/pages/plans.css');

mix.styles([
    'resources/tema/css/pages/reports.css'
], 'public/tema/css/pages/reports.css');

mix.styles([
    'resources/tema/css/pages/signin.css'
], 'public/tema/css/pages/signin.css');

mix.js([
    'resources/tema/js/base.js'
], 'public/tema/js/base.js');

mix.js([
    'resources/tema/js/bootstrap.js'
], 'public/tema/js/bootstrap.js');

mix.js([
    'resources/tema/js/chart.min.js'
], 'public/tema/js/chart.min.js');

mix.js([
    'resources/tema/js/excanvas.min.js'
], 'public/tema/js/excanvas.min.js');

mix.js([
    'resources/tema/js/faq.js'
], 'public/tema/js/faq.js');

mix.js([
    'resources/tema/js/jquery-1.7.2.min.js'
], 'public/tema/js/jquery-1.7.2.min.js');

mix.js([
    'resources/tema/js/signin.js'
], 'public/tema/js/signin.js');

mix.js([
    'resources/tema/js/full-calendar/fullcalendar.min.js'
], 'public/tema/js/full-calendar/fullcalendar.min.js');




