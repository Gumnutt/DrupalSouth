<template>
  <aside class="navigation">
    <SparkleButton @click="prev" v-if="currentIndex !== 0" text="Previous" />
    <SparkleButton @click="next" :disabled="!currentPageValid" v-if="currentIndex !== totalPages - 1" text="Next slide baby" />
  </aside>
</template>
<script>
import SparkleButton from "../misc/SparkleButton.vue"
export default {
  components: {
    SparkleButton,
  },
  inject: ["results"],
  props: {
    currentIndex: {
      type: Number,
      default: 0,
    },
    currentPageValid: {
      type: Boolean,
      default: false,
    },
    totalPages: {
      type: Number,
      default: 0,
    },
    hasLanding: {
      type: Boolean,
      default: false,
    },
    submitting: {
      type: Boolean,
      default: false,
    },
  },
  computed: {},
  beforeMount() {
    window.addEventListener("keydown", this.handleKeydown, null)
  },
  beforeDestroy() {
    window.removeEventListener("keydown", this.handleKeydown)
  },
  methods: {
    next() {
      this.$emit("next")
    },
    prev() {
      this.$emit("prev")
    },
    handleKeydown(e) {
      switch (e.keyCode) {
        case 37:
          this.prev()
          break
        case 39:
          this.next()
          break
      }
    },
  },
}
</script>
