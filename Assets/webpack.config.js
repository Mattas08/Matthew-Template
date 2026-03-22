const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

const JS_DIR = path.resolve(__dirname, 'src/js');
const BUILD_DIR = path.resolve(__dirname, 'dist');

const entry = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js',
};

module.exports = (env, argv) => ({
    entry,
    output: {
        path: BUILD_DIR,
        filename: '[name].js',
    },

    devtool: 'source-map',

    module: {
        rules: [
            {
                test: /\.js$/,
                include: JS_DIR,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                },
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ],
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                type: 'asset/resource', // ✅ replaces file-loader
                generator: {
                    filename: 'images/[name][ext]',
                },
            },
        ],
    },

    optimization: {
        minimize: argv.mode === 'production',
        minimizer: [
            new CssMinimizerPlugin(),
            new TerserPlugin(),
        ],
    },

    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename: 'css/[name].css',
        }),
    ],

    externals: {
        jquery: 'jQuery',
    },
});