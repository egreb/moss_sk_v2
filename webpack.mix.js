const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.js(["resources/js/app.js"], "public/js")
    .js("resources/js/main.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .options({
        postCss: [tailwindcss("tailwind.config.js")]
    })
    .vue({version: 3})
