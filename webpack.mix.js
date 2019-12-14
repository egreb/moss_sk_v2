const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
require("laravel-mix-purgecss");

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

mix.js(["resources/js/app.js"], "public/js").version();
mix.js("resources/js/main.js", "public/js").version();
mix.sass("resources/sass/app.scss", "public/css")
    .options({
        postCss: [tailwindcss("tailwind.config.js")]
    });

if (mix.inProduction()) {
    mix.purgeCss().version();
}
