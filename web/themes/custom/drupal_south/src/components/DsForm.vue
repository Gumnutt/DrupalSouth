<template>
  <div>
    <a id="form-anchor" ref="anchor"></a>
    <form class="talk--screen" @submit.prevent="submit">
      <!-- <form-progress :form="form" :current-page="currentPage"></form-progress> -->
      <form-page v-for="(page, index) in pages" :page="page" :current-page="currentIndex" :currentIndex="index" :key="page.key" @progress="progress">
      </form-page>
      <form-navigation
        @next="nextStep"
        @prev="prevStep"
        :current-index="currentIndex"
        :total-pages="totalPages"
        :current-page-valid="currentPageValid"
      ></form-navigation>
    </form>
  </div>
</template>

<script>
import FormPage from "./form/FormPage.vue"
import FormProgress from "./form/FormProgress.vue"
import FormNavigation from "./form/FormNavigation.vue"
import { processConditions } from "./helpers/conditionalRules"
import { submitForm } from "./helpers/submission"
import { isEmpty } from "lodash"
export default {
  components: {
    FormPage,
    FormProgress,
    FormNavigation,
  },
  props: {
    webformId: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      currentIndex: 0,
      results: {},
    }
  },
  provide() {
    return {
      results: this.results,
    }
  },
  computed: {
    form() {
      return window.drupalSettings.webform.data
    },
    pages() {
      return this.form.filter((page) => {
        // {...this.results} ... just tricking vue into running this
        return processConditions(page, { ...this.results })
      })
    },
    totalPages() {
      return this.pages.length ?? 0
    },
    currentPage() {
      return this.form.find((page) => page.key === this.pages?.[this.currentIndex]?.key)
    },
    currentPageValid() {
      if (!this.currentPage || isEmpty(this.currentPage.fields)) {
        return true
      }

      for (const field of this.currentPage.fields) {
        if (field?.required === true && isEmpty(this.results[field.key])) {
          return false
        }
      }

      return true
    },
  },
  methods: {
    scrollUp() {
      this.$nextTick(() => {
        this.$refs.anchor.scrollIntoView({
          behavior: "smooth",
          block: "start",
          inline: "start",
        })
      })
    },
    approve() {
      this.disclaimerActive = false
      this.start()
    },
    nextStep() {
      this.currentIndex++
      this.scrollUp()
    },
    prevStep() {
      console.log("previous")
      this.currentIndex--
      this.scrollUp()
    },
    progress(value) {
      console.log("value passed in", value, "current index", this.currentIndex)
    },
    async submit() {
      const uuid = await submitForm(this.webformId, this.results)
    },
  },
}
</script>

<style></style>
