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
      'white': "#f8fafc",
      'blacktext': "#1d4ed8",
      'secondary': "#7dd3fc",
    },
    extend: {
      keyframes: {
        slideInFromTop: {
          '0%': { transform: 'translateY(-100%)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
      },
      animation: {
        slideInFromTop: 'slideInFromTop 1s ease-out',
      },
    },
  },
  plugins: [],
}

