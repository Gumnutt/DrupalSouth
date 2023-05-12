<template>
  <div :data-question="question">
    <description-text :text="label" :help="help"></description-text>
    <div>
      <label :for="id">{{ label }}</label>
      <input v-model="current" :id="id" type="text" :name="id" :placeholder="placeholder" />
    </div>
  </div>
</template>

<script>
import inputMixins from "./mixins/input"
import DescriptionText from "./DescriptionText.vue"
export default {
  components: { DescriptionText },
  inheritAttrs: false,
  mixins: [inputMixins],
}
</script>
