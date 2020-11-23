const path = require('path');

module.exports = {
    entry: './javascript/login.js',
    output: {
        filename: 'login.js',
        path: path.resolve(__dirname, 'public/js'),
    },
};