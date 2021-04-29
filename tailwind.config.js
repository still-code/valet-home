const colors = require('tailwindcss/colors')

module.exports = {
    purge:    [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.css',
        './app/Http/Controllers/HomeController.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme:    {
        extend: {
            fontFamily: {
                'plex':          ['IBM Plex Mono', 'ui-sans-serif', 'system-ui'],
                'flow-rounded':  ['flow-rounded'],
                'flow-circular': ['flow-circular'],
                'flow-block':    ['flow-block'],
            },
            colors:     {
                transparent:  'transparent',
                current:      'currentColor',
                gray:         colors.warmGray,
                lime:         colors.lime,
                cyan:         colors.cyan,
                amber:        colors.amber,
                red:          colors.red,
                teal:         colors.teal,
                'light-blue': colors.lightBlue,
                rose:         colors.rose,
                orange:       colors.orange,
                fuchsia:      colors.fuchsia,
                violet:       colors.violet,

                'paige': {
                    DEFAULT: '#BDA685',
                    '50':    '#F5F2ED',
                    '100':   '#EFEAE2',
                    '200':   '#E3D9CB',
                    '300':   '#D6C8B3',
                    '400':   '#CAB79C',
                    '500':   '#BDA685',
                    '600':   '#AB8E64',
                    '700':   '#8F744D',
                    '800':   '#6E593B',
                    '900':   '#4D3E29'
                },
            },
        },
    },
    variants: {
        extend: {
            backgroundImage: ['hover'],
        },
    },
    plugins:  [],
}
