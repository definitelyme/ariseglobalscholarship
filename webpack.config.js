const path = require("path");
const webpack = require("webpack");
const MomentLocalesPlugin = require("moment-locales-webpack-plugin");

module.exports = {
    plugins: [
        // Define Bundler Build Feature Flags
        new webpack.DefinePlugin({
            // Drop Options API from bundle
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: false,
        }),

        // To strip all locales except “en”
        new MomentLocalesPlugin(),
    ],
    resolve: {
        alias: {
            "@": path.resolve("resources/js"),
        },
    },
};
