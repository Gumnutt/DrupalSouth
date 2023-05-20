<template>
  <div :data-question="question">
    <div>
      <div v-for="(label, value) in options" :key="value">
        <label>
          <input v-model="current" :id="`${id}_${value}`" type="checkbox" :name="id" :value="value" /><span>{{ label }}</span>
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
  data() {
    return {
      current: [],
    }
  },
  computed: {
    total() {
      return Object.values(this.options).length
    },
  },
  methods: {
    load() {
      this.current = this.results?.[this.id] || []
    },
  },
}
</script>
