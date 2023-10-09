/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/*.php", "./app/views/**/*.php"],
  theme: {
    extend: {
      backgroundImage: {
        'mafia': "url('./public/storageImage/bg_mafia.png')"
      }
    },
  },
  daisyui: {
    themes: ["emerald"],
  },
  plugins: [require("daisyui")],
};
