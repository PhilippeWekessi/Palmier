/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                // Palette Elaeis Prestige
                primary: {
                    DEFAULT: '#1E5B33', // vert foncé
                    light: '#2F8F4E',   // vert naturel
                    dark: '#123B21',
                },
                gold: {
                    DEFAULT: '#D4A72C', // jaune/or
                    light: '#E7C766',
                },
                neutral: {
                    50: '#FAFAF8',
                    100: '#F3F4F1', // gris très clair
                },
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
            },
            borderRadius: {
                card: '0.75rem',
            },
        },
    },
    plugins: [],
};
