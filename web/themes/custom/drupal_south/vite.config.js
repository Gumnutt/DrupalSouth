import liveReload from "vite-plugin-live-reload"
import vue from "@vitejs/plugin-vue"
import { splitVendorChunkPlugin } from "vite"

export default {
  plugins: [
    vue({
      compilerOptions: {
        isCustomElement: (tag) => {
          return tag.startsWith("ds")
        },
      },
    }),
    liveReload(__dirname + "/**/*.(php|inc|theme|twig|js|css|pcss)"),
    // splitVendorChunkPlugin(),
  ],

  resolve: { alias: { vue: "vue/dist/vue.esm-bundler.js" } },

  build: {
    // generate manifest.json in outDir
    manifest: true,
    emptyOutDir: true,
    rollupOptions: {
      // overwrite default .html entry
      input: [
        //'/assets/styles/index.pcss',
        "/src/main.js",
      ],
      // Remove the [hash] since Drupal will take care of that.
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `chunks/[name].[hash].js`,
        assetFileNames: `[name].[ext]`,
      },
    },
  },

  server: {
    // required to load scripts from custom host
    cors: true,

    // we need a strict port to match on PHP side
    // change freely, but update on PHP to match the same port
    strictPort: true,
    port: 12321,
    hmr: {
      protocol: "ws",
      host: "localhost",
    },
  },
}
