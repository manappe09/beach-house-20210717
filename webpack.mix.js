let mix = require('laravel-mix');

// 環境変数について：
// 1. envファイル内変数に'MIX_'とprefixをつけることで、プラグイン不要で自動的に変数の値が注入される。
// 2. prefix付けない場合の追加プラグインは下記が良さそう(想定がないけど)。
// const Dotenv = require("dotenv-webpack");

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

mix
  .js("resources/assets/js/app.js", "public/js")
  .sass("resources/assets/sass/app.scss", "public/css")
  .browserSync({
    proxy: "http://localhost:8003/",
    port: 8004,
  });
  
mix.webpackConfig({
  plugins: [
   //  new Dotenv({
   //    systemvars: true,
   //  }),
  ],
});

if(!mix.inProduction()) {
   mix.sourceMaps();
}