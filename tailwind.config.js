const colors = require('tailwindcss/colors');

const gray = {
    50: '#e0e0e0', 
    100: '#cfcfcf',
    200: '#bdbdbd',
    300: '#9e9e9e',
    400: '#7a7a7a',
    500: '#5c5c5c',
    600: '#3f3f3f',
    700: '#2b2b2b',
    800: '#1e1e1e', 
    900: '#121212', 
};

module.exports = {
    content: [
        './resources/scripts/**/*.{js,ts,tsx}',
    ],
    theme: {
        extend: {
            fontFamily: {
                header: ['"IBM Plex Sans"', '"Roboto"', 'system-ui', 'sans-serif'],
            },
            colors: {
                black: '#121212', 
                primary: {
                    DEFAULT: '#d32f2f', 
                    50: '#fdecea',
                    100: '#f9d3d0',
                    200: '#f3a8a4',
                    300: '#ed7c78',
                    400: '#e65550',
                    500: '#d32f2f',
                    600: '#b71c1c',
                    700: '#9a1313',
                    800: '#7f0f0f',
                    900: '#5a0a0a',
                },
                orange: colors.orange, 
                gray: gray,
                neutral: gray,
                cyan: colors.cyan,
                neutral: {
                    50: gray[50],
                    100: gray[100],
                    200: gray[200],
                    300: gray[300],
                    400: gray[400],
                    500: gray[500],
                    600: gray[600],
                    700: gray[700],
                    800: gray[800],
                    900: gray[900],
                }
            },
            fontSize: {
                '2xs': '0.625rem',
            },
            transitionDuration: {
                250: '250ms',
            },
            borderColor: theme => ({
                default: theme('colors.gray.400', 'currentColor'),
            }),
        },
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms')({
            strategy: 'class',
        }),
    ]
};
