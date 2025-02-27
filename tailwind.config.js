import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                rojoOscuroUAEH: '#511013',
                rojoMedioUAEH: '#841816',
                rojoUAEH: '#B91116',
                naranjaUAEH: '#E8641C',
                amarilloUAEH: '#F39200',
                cremaUAEH: '#EAE3D8',
                grisOscuroUAEH: '#575756',
                grisUAEH: '#9D9D9C',
                blancoDropdown:  '#F0F6Fa',
            },
        },
    },

    plugins: [forms, typography],
};
