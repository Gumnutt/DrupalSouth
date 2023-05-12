<template>
  <div :data-question="question">
    <div v-html="content"></div>
  </div>
</template>

<script>
import inputMixins from "./mixins/input"
export default {
  mixins: [inputMixins],
}
</script>
