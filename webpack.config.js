const path = require("path");
// const dotenv = require("dotenv");

module.exports = {
    // plugins: [
    //     new webpack.DefinePlugin({
    //         "process.env": JSON.stringify(dotenv.config().parsed),
    //     }),
    // ],
    resolve: {
        alias: {
            "@": path.resolve("resources/js"),
        },
    },
};
