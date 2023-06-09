module.exports = {
  content: [
    // https://tailwindcss.com/docs/content-configuration
    './*.php',
    './inc/**/*.php',
    './woocommerce/*.php',
    './woocommerce/**/*.php',
    './resources/**/*.php',
    './safelist.txt'
    //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
  ],
  safelist: [
    'text-center'
    //{
    //  pattern: /text-(white|black)-(200|500|800)/
    //}
  ],
  theme: {
    extend: {}
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms')
  ]
}