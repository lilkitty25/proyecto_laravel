import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from "daisyui";

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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        daisyui
    ],

    daisyui: {
        themes: [
            {
                valentine: {
                    "primary": "#FF5C8D", // Rosa San Valentín
                    "secondary": "#F5A8D6", // Rosa claro
                    "accent": "#FF0000", // Rojo brillante
                    "neutral": "#FFFFFF", // Blanco para el texto o fondo
                    "base-100": "#FFEBEB", // Fondo suave
                    "base-200": "#FF2A68", // Rosa más oscuro
                }
            }
        ],
    },
};
