<template>
  <div class="media--wrapper" :style="`--column-count: ${columnCount}`">
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
  computed: {
    columnCount() {
      return this.extras.imageRepeat ? this.extras.imageRepeat : 1
    },
  },
}
</script>
