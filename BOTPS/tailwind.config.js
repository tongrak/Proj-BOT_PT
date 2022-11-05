/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/Home.blade.php",
    "./resources/views/login.blade.php",
    "./resources/views/register.blade.php",
    "./resources/views/cart.blade.php",
  ],
  theme: {
    extend: {
      'sans': ['Arial', 'sans-serif','Helvetica'],
      'dosis' : 'Dosis' ,
    },
  },
  plugins: [],
}
