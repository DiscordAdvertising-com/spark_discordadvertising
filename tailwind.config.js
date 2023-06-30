/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ], 
  theme: {
    extend: {
      colors: {
        // Dashboard Main Background
        'dmb': '#25272C',
        // Dashboard Secondaire Background
        'dsb': '#303138',
        // Dashboard Border
        'db': '#3D3E45',
        // Dashboard Border
        'accent': '#6773E5',
        // Dashboard input
        'input': '#3D3E45',

      }
    },
  },
  plugins: [],
}

