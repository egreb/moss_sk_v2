const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.sass("resources/sass/app.scss", "public/css")
    .options({
        postCss: [tailwindcss("tailwind.config.js")]
    })
    .version();
mix.js(["resources/js/admin/app.js"], "public/js/admin")
    .postCss('resources/css/admin/app.css', "public/css/admin")
    .options({
        postCss: [tailwindcss("tailwind.config.js")]
    })
    .vue({version: 3})
    .version();
