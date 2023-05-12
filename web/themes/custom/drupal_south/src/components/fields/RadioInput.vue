<template>
  <div :data-question="question">
    <description-text :text="label" :help="help"></description-text>
    <div>
      <div v-for="(label, value) in options" :key="value">
        <label>
          <input v-model="current" :id="`${id}_${value}`" type="radio" :name="id" :value="value" />
          <span>{{ label }}</span>
        </label>
      </div>
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
  computed: {
    total() {
      return Object.values(this.options).length
    },
  },
}
</script>
