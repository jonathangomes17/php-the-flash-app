const glob = require('glob')
const path = require('path')
const fs = require('fs')

const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CssnanoPlugin = require('cssnano-webpack-plugin')
const TerserPlugin = require('terser-webpack-plugin')
const ImageminPlugin = require('imagemin-webpack-plugin').default
const CopyWebpackPlugin = require('copy-webpack-plugin')

module.exports = {
  mode: 'production',

  devtool: 'source-map',

  entry: Object.assign(
    {
      base: ['./resources/js/base.ts', './resources/css/base.scss'],
    },

    // Pages

    glob.sync('./resources/js/pages/**/index.ts').reduce((acc, path) => {
      let entry = path.replace('/index.ts', '').replace('./resources/js/', '')
      let pagePath = entry.split('/')

      pagePath = pagePath[pagePath.length - 1]

      let returnACC = [path]

      let styleCssFile = `./resources/css/${entry}/style.scss`
      if (fs.existsSync(styleCssFile)) {
        returnACC.push(styleCssFile)
      }

      acc[entry + '/' + pagePath] = returnACC

      return acc
    }, {}),
  ),

  resolve: {
    extensions: ['.ts', '.js'],
  },

  externals: {
    'simple-datatables': 'simple-datatables'
  },

  output: {
    filename: '[name].js',
    path: __dirname + '/public/assets',
    sourceMapFilename: '[name].js.map'
  },

  module: {
    rules: [
      {
        test: /\.ts$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'ts-loader',
          },
        ],
      },
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
        },
      },
      {
        test: /\.(css|sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 2,
              sourceMap: true,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: () => [require('autoprefixer')],
              sourceMap: true,
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
            },
          },
        ],
      },
    ],
  },

  optimization: {
    minimizer: [
      new CssnanoPlugin({
        cssnanoOptions: {
          preset: [
            'default',
            {
              discardComments: { removeAll: true },
            },
          ],
        },
      }),
      new TerserPlugin(),
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
    new CopyWebpackPlugin([
      {
        context: __dirname + '/resources/images',
        from: './**/**/**',
        to: path.resolve(__dirname, 'public/assets/images'),
      },
    ]),
    new ImageminPlugin({
      pngquant: {
        quality: '95-100',
      },
      optipng: {
        optimizationLevel: 9,
      },
    }),
  ],
}
