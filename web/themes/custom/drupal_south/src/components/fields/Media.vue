<template>
  <div v-if="extras.cursor_follow" class="cursor-follow" id="crazy-face">
    <img :src="content" />
  </div>
  <div v-else class="media--wrapper" :style="`--column-count: ${columnCount}`" :class="columnCount > 1 ? 'wrapper-fill' : ' '">
    <img :src="content" v-for="i in columnCount * columnCount" :key="i" />
  </div>
</template>
<script>
import { slugify } from "../helpers/slugify"
import inputMixins from "./mixins/input"
export default {
  mixins: [inputMixins],
  props: {
    text: {
      type: String,
      default: "",
    },
    help: {
      type: [Object, Array, Boolean],
      default: false,
    },
  },
  data() {
    return {
      screenWidth: 0,
    }
  },
  mounted() {
    this.updateScreenWidth()
    this.onScreenResize()
    this.setCrazyFace()
  },
  computed: {
    columnCount() {
      if (this.screenWidth < 768) {
        return this.extras.imageRepeat ? 2 : 1
      }
      return this.extras.imageRepeat ? this.extras.imageRepeat : 1
    },
  },
  methods: {
    onScreenResize() {
      window.addEventListener("resize", () => {
        this.updateScreenWidth()
      })
    },
    updateScreenWidth() {
      this.screenWidth = window.innerWidth
    },
    setCrazyFace() {
      document.addEventListener("mousemove", (event) => {
        const crazyFace = document.getElementById("crazy-face")
        console.log(event.clientX, event.clientY)
        const styles = `
          position: absolute;
          top: ${event.clientY}px;
          left: ${event.clientX}px;
        `
        crazyFace.setAttribute("style", styles)
      })
    },
  },
}
</script>
