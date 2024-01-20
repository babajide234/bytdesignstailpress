const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
          colors: {
            primary: "#427478",
            faded: "#F9FFFF",
          },
          backgroundImage: {
            "hero-img": 'url("../img/headerBg.png")',
            "mission-img": 'url("../img/layer.png")',
            "section-img": 'url("../img/section-img.png")',
            "footer-img": 'url("../img/footer.png")',
            "shop-img": 'url("../img/pic1.png")',
            "signup-img": 'url("../img/signup.jpg")'
          },
          fontFamily: {
            "dm-sans": ["DM Sans", "sans-serif"],
            "dhurjati": ["Dhurjati", "serif"],
            "space-mono": ["Space Mono", "monospace"],
            "space-grotesk": ["Space Grotesk", "sans-serif"],
          },
          transitionProperty: {
            width: "width",
          },
          keyframes: {
            borderAnimation: {
              from: { width: "0" },
              to: { width: "100%" },
            },
          },
          animation: {
            borderAnimation: "borderAnimation 0.5s forwards ease-in-out",
          },
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': tailpress.theme('settings.layout.contentSize', theme),
            'xl': tailpress.theme('settings.layout.wideSize', theme),
            '2xl': '1440px'
        }
      },
    // theme: {

    //     // extend: {
    //     //     colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
    //     //     fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme))
    //     // },
        
    // },
    plugins: [
        tailpress.tailwind
    ]
};
