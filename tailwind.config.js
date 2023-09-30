/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js",
    "./vendor/lara-zeus/core/resources/views/**/*.blade.php",
    "./vendor/lara-zeus/sky/resources/views/themes/**/*.blade.php",
    "./vendor/lara-zeus/sky/resources/views/filament/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

