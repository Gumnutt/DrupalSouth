<template>
  <h1 v-html="fancylabel" :id="createId" :aria-label="label"></h1>
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
  mounted() {
    this.buildShadow()
  },
  methods: {
    buildShadow() {
      if (!this.extras.shadow) return
      console.log("build shadow")
      const title = document.getElementById("hi-im-brynn")
      const highlight = title.querySelector(".highlight")
      let shadow = ""
      const shadowlength = 500
      const groupNumber = 125
      const multiColor = false
      for (let group = 0; group < shadowlength; group += groupNumber) {
        for (let i = group; i < group + groupNumber && i < shadowlength; i++) {
          let color = `var(--shadow-color)`
          if (multiColor) {
            color = `var(--shadow-color-${group / groupNumber + 1})`
          }
          shadow += (shadow ? "," : "") + `-${i}px ${i}px 0 ${color}`
        }
      }
      highlight.style.setProperty("--shadow", shadow)
    },
  },
  computed: {
    createId() {
      return slugify(this.label)
    },
    fancylabel() {
      if (this.extras.highlight) {
        if (!this.extras.explode) return this.label.replace(this.extras.highlight, `<span class="highlight">${this.extras.highlight}</span>`)
        const explodedString = this.extras.highlight.split("")
        const builtString = []
        explodedString.forEach((letter) => {
          builtString.push(`<span class="letter">${letter}</span>`)
        })
        if (this.extras.repeats) {
          const repeats = `<span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>`
          return this.label.replace(this.extras.highlight, repeats)
        } else {
          return this.label.replace(this.extras.highlight, `<span class="highlight">${builtString.join("")}</span>`)
        }
      } else {
        return this.label
      }
    },
  },
}
</script>
