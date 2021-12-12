const path = require('path');

const root = path.join(__dirname, 'frontend');

module.exports = {
  entry: path.join(root, 'js', 'index.js'),
  output: {
    filename: 'script.js',
    path: path.join(root, 'build')
  }
};
