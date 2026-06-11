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
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                display: ['Playfair Display', 'serif'],
                body: ['Poppins', 'sans-serif'],
            },
            colors: {
                'donut': {
                    'pink': {
                        50: '#FFF2EB',
                        100: '#FFE1D1',
                        200: '#FFC0A3',
                        300: '#FF976B',
                        400: '#FF6D33',
                        500: '#FF4E02',
                        600: '#E03D00',
                        700: '#B82F00',
                    },
                    'orange': {
                        50: '#FFF2EB',
                        100: '#FFE1D1',
                        200: '#FFC0A3',
                        300: '#FF976B',
                        400: '#FF6D33',
                        500: '#FF4E02',
                        600: '#E03D00',
                        700: '#B82F00',
                    },
                    'brown': {
                        50: '#FBF8F6',
                        100: '#F5ECE7',
                        200: '#E8D4C9',
                        300: '#D4B5A5',
                        400: '#B88E76',
                        500: '#8B644D',
                        600: '#6D4A35',
                        700: '#4A3220',
                    },
                },
                'cream': '#F1E8DF',
                'softcard': '#FAF4EE',
                'gold': '#D4A574',
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'fade-in': 'fadeIn 0.6s ease-out',
                'fade-in-up': 'fadeInUp 0.6s ease-out',
                'slide-in-left': 'slideInLeft 0.6s ease-out',
                'slide-in-right': 'slideInRight 0.6s ease-out',
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideInLeft: {
                    '0%': { opacity: '0', transform: 'translateX(-30px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                slideInRight: {
                    '0%': { opacity: '0', transform: 'translateX(30px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
