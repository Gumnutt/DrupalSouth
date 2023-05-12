export default {
  inject: ["results"],
  props: {
    id: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    label: {
      type: String,
      default: "",
    },
    question: {
      type: [String, Number],
      default: "",
    },
    options: {
      type: Object,
      default: () => {},
    },
    placeholder: {
      type: String,
      default: "",
    },
    description: {
      type: String,
      default: "",
    },
    content: {
      type: String,
      default: "",
    },
    value: {
      type: [String, Boolean, Number, Array],
      default: "",
    },
    required: {
      type: Boolean,
      default: false,
    },
    conditions: {
      type: [Object, Array],
      default: () => [],
    },
    help: {
      type: [Object, Array, Boolean],
      default: false,
    },
    extras: {
      type: [Object, Array],
      default: () => [],
    },
  },
  data() {
    return {
      current: "",
    }
  },
  methods: {
    load() {
      this.current = this.results?.[this.id] || ""
    },
  },
  created() {
    this.load()
  },
  watch: {
    current() {
      this.results[this.id] = this.current
    },
  },
}
