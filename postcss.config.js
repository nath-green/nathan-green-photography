const purgecss = require('@fullhuman/postcss-purgecss')({
  content: [
    './*.php'
  ],
  defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
});

const cssnano = require('cssnano')({
  preset: 'default',
});

const postcsshash = require('postcss-hash')({
  manifest: './dist/manifest.json'
});

module.exports = {
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    ...process.env.NODE_ENV === 'production' ?
    [cssnano, purgecss, postcsshash] :
    []
  ]
}