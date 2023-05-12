<template>
  <div>
    <h5>Your progress</h5>
    <div>
      <div :style="{ width: `${progress}%` }">&nbsp;</div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    currentPage: {
      type: Object,
      default: () => {},
    },
    form: {
      type: Array,
      default: () => [],
    },
  },
  computed: {
    currentIndex() {
      return this.form.findIndex((page) => page.key === this.currentPage.key)
    },
    progress() {
      return ((this.currentIndex + 1) / this.form.length) * 100
    },
  },
}
</script>
