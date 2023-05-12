<template>
  <aside class="navigation">
    <button @click="prev" v-if="currentIndex !== 0">Previous</button>
    <button type="button" name="next-button" @click="next" :disabled="!currentPageValid" v-if="currentIndex !== totalPages - 1">Next</button>
    <button :disabled="!currentPageValid" name="submit-button" type="submit" v-text="submitting ? 'Submitting' : 'Submit'"></button>
  </aside>
</template>
<script>
export default {
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
  methods: {
    next() {
      this.$emit("next")
    },
    prev() {
      this.$emit("prev")
    },
  },
}
</script>
