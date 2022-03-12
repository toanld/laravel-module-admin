const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        '../../vendor/laravel/jetstream/**/*.blade.php',
        '../../vendor/hungnm28/laravel-module-admin/resources/views/components/*.blade.php',
        '../../storage/framework/views/*.php',
        './Resources/views/livewire/**/*.blade.php',
        './Resources/views/**/*.blade.php',
        './Resources/views/*.blade.php',
        './Resources/views/layouts/*.blade.php',
    ],

    theme: {
        extend: {
            borderWidth: {
                '3': '3px'
            },
            colors: {
                gray: colors.slate,
                orange: colors.orange,
                green: colors.emerald,
                teal: colors.teal,
                cyan: colors.cyan,
                sky: colors.sky,
                indigo: colors.indigo,
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--gradient-color-stops))',
            },
            flex:{
                '2': '2 2 0%',
                '3': '3 3 0%'
            },
            minWidth: {
                '0': '0',
                '1/4': '25%',
                '1/3': '33%',
                '1/2': '50%',
                '3/4': '75%',
                'full': '100%',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            width: ['hover', 'focus'],

        }
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'),require('@tailwindcss/line-clamp'),require('@tailwindcss/aspect-ratio')],
};
