/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./pages/**/*.{html,php}",
    './tailwind_src/**/*.css'
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          '50': '#f0f5fe',
          '100': '#dde8fc',
          '200': '#c3d8fa',
          '300': '#9bc1f5',
          '400': '#6ba0ef',
          '500': '#5385ea',
          '600': '#3360dd',
          '700': '#2a4ccb',
          '800': '#283fa5',
          '900': '#263a82',
          '950': '#1b2450',
        },
      },
    },
  },
  plugins: [],
}

