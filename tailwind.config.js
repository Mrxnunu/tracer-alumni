/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            backgroundColor: ['active'],
            fontFamily: {
                'montserrat': ['Montserrat']
            }
        },
    },
    plugins: [require("daisyui"), require('flowbite/plugin')],
};
