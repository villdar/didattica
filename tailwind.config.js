const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {

    important: '#didattica',
    purge: [
        './resources/**/*.blade.php',
        './vendor/spatie/laravel-support-bubble/config/**/*.php',
        './vendor/spatie/laravel-support-bubble/resources/views/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            spacing: {
                26 : '6.5rem',
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
    ],
}
