module.exports = {
  plugins: [
    require("postcss-nested"),
    require("postcss-custom-media"),
    require("postcss-font-magician")({
      hosted: ["./public/fonts", "/themes/custom/drupal_south/public/fonts"],
      custom: {
        "ClashDisplay-Variable": {
          variants: {
            normal: {
              400: {
                url: {
                  woff2: "/themes/custom/drupal_south/public/fonts/ClashDisplay-Variable.woff2",
                  woff: "/themes/custom/drupal_south/public/fonts/ClashDisplay-Variable.woff",
                },
              },
              700: {
                url: {
                  woff2: "/themes/custom/drupal_south/public/fonts/ClashDisplay-Variable.woff2",
                },
              },
            },
            italic: {
              400: {
                url: {
                  woff2: "/themes/custom/drupal_south/public/fonts/ClashDisplay-Variable.woff2",
                },
              },
            },
          },
        },
      },
      // variants: {
      //   "Space Grotesk": {
      //     300: [],
      //     400: [],
      //     500: [],
      //     600: [],
      //     700: [],
      //   },
      // },
    }),
    require("autoprefixer"),
  ],
}
