<template>
  <transition name="scale" mode="out-in">
    <section
      class="slide"
      :class="{
        present: currentPage == currentIndex,
        past: currentIndex < currentPage,
        future: currentIndex > currentPage,
      }"
      :data-slide="slugifiedTitle"
      :style="`--bg-default: ${randomBgColor}`"
      v-if="currentPage == currentIndex"
    >
      <div class="grid">
        <component v-for="(field, ind) in fields" :key="ind" :is="field.component" v-bind="field" />
      </div>
    </section>
  </transition>
</template>

<script>
import { slugify } from "../helpers/slugify"
import TextFieldInput from "../fields/TextFieldInput.vue"
import RadioInput from "../fields/RadioInput.vue"
import SelectField from "../fields/SelectField.vue"
import CheckboxInput from "../fields/CheckboxInput.vue"
import CheckboxesInput from "../fields/CheckboxesInput.vue"
import PlainText from "../fields/PlainText.vue"
import LabelInput from "../fields/LabelInput.vue"
import Message from "../fields/Message.vue"
import Media from "../fields/Media.vue"

const fields = {
  textfield: TextFieldInput,
  select: SelectField,
  radios: RadioInput,
  checkbox: CheckboxInput,
  checkboxes: CheckboxesInput,
  processed_text: PlainText,
  label: LabelInput,
  webform_message: Message,
  media: Media,
}

export default {
  inject: ["results"],
  props: {
    page: {
      type: Object,
      default: () => {},
    },
    currentPage: {
      type: Number,
      default: () => {},
    },
    currentIndex: {
      type: Number,
      default: () => {},
    },
  },
  data() {
    return {
      current: "",
    }
  },
  computed: {
    fields() {
      return this.page.fields
        .map((field) => {
          field.component = fields.hasOwnProperty(field.type) ? fields[field.type] : false
          return field
        })
        .filter((field) => {
          return !!field.component
        })
    },
    slugifiedTitle() {
      return slugify(this.page.title)
    },
    randomBgColor() {
      const colors = ["var(--orange)", "var(--pink)", "var(--green)", "var(--yellow)", "var(--blue)"]
      return colors[Math.floor(Math.random() * colors.length)]
    },
  },
}
</script>
