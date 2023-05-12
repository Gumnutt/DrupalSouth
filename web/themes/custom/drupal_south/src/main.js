import "./css/index.pcss"

import { createApp } from "vue"
import DsForm from "./components/DsForm.vue"

const app = createApp({
  components: {
    DsForm,
  },
})
app.directive("hoist", {
  inserted: (el, binding) => {
    const target = binding.arg ? document.getElementById(binding.arg) : document.body

    if (!target) {
      return
    }

    if (binding.modifiers.prepend && target.firstChild) {
      target.insertBefore(el, target.firstChild)
    } else {
      target.appendChild(el)
    }
  },
})
app.mount("#app")
