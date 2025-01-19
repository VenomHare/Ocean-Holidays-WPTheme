/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php", // Include all PHP files in the theme
    "./template-parts/**/*.php", // If you use template parts
  ],
  theme: {
    fontFamily: {
      'poppin':['Poppins','ui-sans-serif', 'system-ui','sans-serif'],
      'jost': ['Jost','ui-sans-serif', 'system-ui','sans-serif']
    },
    colors: {
      transparent: "transparent",
      current: "currentColor",
      'primary':"#233dff",
      'primaryA':'#233dffec',
      'gray':"#cbd5e1",
      'graytext':"#666666",
      'white': "#f8fafc",
      'bluetext': "#1d4ed8",
      'skyblue': "#7DD3FC",
      'secondary': "#7dd3fc",
      'menubg':"#cbd5e1"
    },
    extend: {
      keyframes: {
        slideInFromTop: {
          '0%': { transform: 'translateY(-100%)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        slideInFromTopMenu: {
          '0%': { transform: 'translateY(-100%)'},
          '100%': { transform: 'translateY(0)'},
        },
      },
      animation: {
        slideInFromTop: 'slideInFromTop 1s ease-out',
        slideInFromTopFast: 'slideInFromTopMenu 200ms ease',
      },
      flexGrow: {
        2: '2',
        3: '3',
      },
    },
  },
  plugins: [],
}

