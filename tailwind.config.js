// const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
const {color} = require("tailwindcss/lib/util/dataTypes");
module.exports = {

    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class', // or 'media' or 'class'
    theme: {

        fontFamily: {
            sans: ['Montserrat', 'sans-serif'],
            // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
        },
        extend: {
            backgroundImage: theme => ({
                'hero-pattern': "url('https://gotoperu-com.s3-us-west-1.amazonaws.com/logos/logo-gotoperu-black.png')",
                'footer-texture': "url('/img/footer-texture.png')",
            }),
            colors: {
                blue: colors.blue,
                green: colors.green,
                red: colors.red,
                amber: colors.amber,
                gray: colors.gray,
                white: colors.white,
                yellow: colors.yellow,
                fuchsia: colors.fuchsia,
                cyan: colors.cyan,
                primary: '#7F8429',
                secondary: '#f9a825',
            },
        },
        // container: {
        //     center: true, // centra el container (equivale a mx-auto)
        //     padding: {
        //         DEFAULT: '1rem',
        //         sm: '1rem',
        //         md: '1.25rem',
        //         lg: '2rem',
        //         xl: '2rem',
        //         '2xl': '2rem',
        //     },
        // },
    },
    variants: {
        extend: {
            fontWeight: ['hover', 'focus'],
            scale: ['group-hover'],
            translate: ['group-hover'],
            backgroundColor: ['active'],
            borderWidth: ['hover', 'focus'],
        },
    },

    corePlugins: {
        container: true
    },


    plugins: [
        // require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography')],
}
