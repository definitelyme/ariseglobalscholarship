const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    darkMode: "media",

    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                main: "#f37335",
                accent: "#1260a0",
                light: "#E5E5E5",
                dark: "#333333",
                // black: colors.black,
                // white: colors.white,
                // indigo: colors.indigo,
                // blueGray: colors.blueGray,
                // red: colors.rose,
                // yellow: colors.amber,
                // blue: {
                //     light: "#85d7ff",
                //     DEFAULT: colors.blue,
                //     dark: "#009eeb",
                // },
                // gray: {
                //     darkest: "#1f2d3d",
                //     dark: "#3c4858",
                //     DEFAULT: colors.trueGray,
                //     light: "#e0e6ed",
                //     lightest: "#f9fafc",
                // },
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
