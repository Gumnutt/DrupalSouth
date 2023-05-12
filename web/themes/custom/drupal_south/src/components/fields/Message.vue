<template>
  <div class="message-wrapper">
    <div class="marquee--wrapper">
      <div class="marquee">
        <div class="marquee--group" v-for="i in 75" :key="i">
          <h4 v-html="content"></h4>
          <h4>*</h4>
        </div>
      </div>
    </div>
    <div class="marquee--wrapper">
      <div class="marquee">
        <div class="marquee--group" v-for="i in 75" :key="i">
          <h4 v-html="content"></h4>
          <h4>*</h4>
        </div>
      </div>
    </div>
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
}
</script>
