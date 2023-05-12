<template>
  <div :data-question="question">
    <description-text :text="label" :help="help"></description-text>
    <div>
      <select name="" id=""></select>
      <div v-for="(option, ind) in options" :key="ind">
        <input v-model="current" :id="option.id" type="radio" :name="option.type" :value="option.id" />
        <label :for="option.id">{{ option.label }}</label>
      </div>
    </div>
  </div>
</template>

<script>
import inputMixins from "./mixins/input"
import DescriptionText from "./DescriptionText.vue"
export default {
  components: { DescriptionText },
  mixins: [inputMixins],
}
</script>
