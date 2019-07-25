//const { mix } = require('laravel-mix');

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

//mix.js('resources/assets/js/app.js', 'public/js')
  // .sass('resources/assets/sass/app.scss', 'public/css');


   var path = require('path');

module.exports = {
entry: './main.ts',
resolve: {
extensions: ['.webpack.js', '.web.js', '.ts', '.js']
},
module: {
rules: [
{ test: /.ts$/, loader: 'ts-loader' }
]
},
output: {
filename: 'bundle.js',
path: path.resolve(__dirname, 'dist')
}
};