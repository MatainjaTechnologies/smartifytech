/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'whatsapp': '#25D366',
        'whatsapp-dark': '#128C7E',
      }
    },
  },
  plugins: [],
}
