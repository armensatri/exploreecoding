// tailwind.config.js
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  // ...
  theme: {
    extend: {
      fontFamily: {
        inter: ["Inter", "sans-serif"],
      },
    },
  },
  // ...
  plugins: [require("@tailwindcss/typography")],
};
