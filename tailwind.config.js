/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./assets/**/*.js",
        "./templates/**/*.html.twig",
    ],
    theme: {
        extend: {},
        colors: {
            'primary': '#90E0EF',
        },
        fontFamily: {
            'primary': ['"Open Sans"'],
        }
    },
    plugins: [],
}

