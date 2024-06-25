/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}" ,
    "./dist/**/*.{html,js,php}",
    "./public/index.php",
    "./src/core/controller/*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

