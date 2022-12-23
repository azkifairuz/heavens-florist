/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}","./admin/**/*.php","./user/**/*.{php,js}","./owner/**/*.{php,js}"],
  theme: {
  
    extend: {
      colors:{
        primary:{
          50:'#d4d1ed',
          100:'#b7b3e1',
          200: '#928dd1',
          300: '#6367c2',
          400:  '#4a41b3',
          500:  '#261ba4',
          600: '#201789',
          700:  '#19126d',
          800:  '#130e52',
          900:  '#0d0937'
        } 
        
      }
    },
  },
  plugins: [],
}
