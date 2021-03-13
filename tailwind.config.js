const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    darkMode: "media",

    // important: "#important",

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
                main: {
                    50: "#ededf7",
                    100: "#b7b8e1",
                    200: "#9394d2",
                    300: "#6f71c3",
                    400: "#4b4db4",
                    500: "#3e4095 !important",
                    600: "#3c3e90",
                    700: "#35367e",
                    800: "#2d2e6c",
                    900: "#26265a",
                },
                accent: {
                    50: "#f6a2a4",
                    100: "#f48a8e",
                    200: "#f27377",
                    300: "#f05c61",
                    400: "#ee444a",
                    500: "#ec3237",
                    600: "#eb2d33",
                    700: "#e9161d",
                    800: "#d2141a",
                    900: "#bb1117",
                },
                light: "#E5E5E5",
                dark: "#333333",
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
