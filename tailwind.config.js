const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: ['./vendor/laravel/jetstream/**/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue'],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans]
      },
      colors: {
        'jeopardy-blue': {
          DEFAULT: '#060ce9',
          lighter: '#5359FF'
        },
        'jeopardy-yellow': '#ffcc00'
      }
    }
  },

  variants: {
    extend: {
      opacity: ['disabled']
    }
  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
}
