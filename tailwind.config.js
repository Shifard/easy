import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
              dm: ['"DM Sans"', 'sans-serif'],
            },
            width: {
              '128': '32rem',
              '160': '40rem',
              '192': '48rem',
              '224': '56rem',
              '256': '64rem',
            },
            height: {
              '128': '32rem',
              '160': '40rem',
              '192': '48rem',
              '224': '56rem',
              '256': '64rem',
            },
            inset: {
              '30': '20rem',
            }
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/typography'),
    ],
};
