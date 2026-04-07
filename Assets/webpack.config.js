const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin'); // ← add this

const JS_DIR = path.resolve(__dirname, 'src/js');
const BUILD_DIR = path.resolve(__dirname, 'Assets/Build');

const entry = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js',
};

const rules = [
    {
        test: /\.js$/,
        include: JS_DIR,
        exclude: /node_modules/,
        use: { loader: 'babel-loader' },
    },
    {
        test: /\.scss$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
    },
    {
        test: /\.(png|jpe?g|gif|svg)$/i,
        type: 'asset/resource',
        generator: { filename: 'images/[name][ext]' },
    },
];

const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: argv.mode === 'production',
    }),
    new MiniCssExtractPlugin({
        filename: 'css/[name].css',
    }),
];

module.exports = (env, argv) => ({
    entry,
    output: {
        path: BUILD_DIR,
        filename: 'js/[name].js',   // ← also fixed: was missing 'js/' subfolder
    },
    devtool: 'source-map',          // ← moved to top level
    module: {
        rules,                      // ← moved to top level
    },
    plugins: plugins(argv),         // ← moved to top level
    externals: {
        jquery: 'jQuery',           // ← moved to top level
    },
    optimization: {
        minimizer: [
            new CssMinimizerPlugin(),   // ← replaces deprecated OptimizeCssAssetsPlugin
            new TerserPlugin({          // ← replaces deprecated UglifyJsPlugin
                parallel: true,
            }),
        ],
    },
});