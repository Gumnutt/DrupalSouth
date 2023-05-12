<template>
  <div>
    <h4 v-html="text"></h4>
    <div v-if="help && help.title" v-text="help.title"></div>
  </div>
</template>
<script>
export default {
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
