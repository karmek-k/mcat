const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

const root = path.join(__dirname, 'frontend');

module.exports = {
  entry: path.join(root, 'js', 'index.js'),
  output: {
    filename: 'script.js',
    path: path.join(root, 'build')
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: path.join(root, 'templates', 'index.html')
    })
  ]
};
