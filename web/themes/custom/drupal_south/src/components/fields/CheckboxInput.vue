<template>
  <div :data-question="question">
    <field-label :text="label" :help="help"></field-label>
    <label :for="id">
      <input v-model="current" :id="id" :type="type" :name="id" />
      <span>{{ label }}</span>
    </label>
  </div>
</template>

<script>
import inputMixins from "./mixins/input"
import FieldLabel from "./DescriptionText.vue"
export default {
  components: { FieldLabel },
  inheritAttrs: false,
  mixins: [inputMixins],
}
</script>
