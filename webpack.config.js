const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const root = path.join(__dirname, 'frontend');
const buildDir = path.join(root, 'build');

module.exports = {
  mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
  entry: path.join(root, 'js', 'index.js'),
  output: {
    filename: 'script.js',
    path: buildDir
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: path.join(root, 'templates', 'index.html')
    })
  ],

  // TODO: change before production build
  devtool: 'inline-source-map'
};
