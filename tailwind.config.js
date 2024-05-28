/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',
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
