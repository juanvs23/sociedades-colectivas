let mix = require("laravel-mix");

mix
  .js("src/js/index.js", "js/index.js")

  .sass("src/scss/index.scss", "css/index.css")

  ///.react()
  .setPublicPath("assets")
  .sourceMaps()
  .version();
