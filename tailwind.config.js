/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
    require('daisyui'),
  ],
  //daisyui: {
    //styled: true,
    //theme: true,
   // rtl: false,
  //},
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
    //display: ['responsive', 'group-hover', 'group-focus'],
  },
  plugins: [],
}

