<template>
  <div v-if="extras.sparkle" class="sparkley-title">
    <h1 v-html="fancylabel" :id="createId" :aria-label="label"></h1>
    <span aria-hidden="true" class="particle-pen">
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        /></svg
      ><svg class="particle" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6.937 3.846L7.75 1L8.563 3.846C8.77313 4.58114 9.1671 5.25062 9.70774 5.79126C10.2484 6.3319 10.9179 6.72587 11.653 6.936L14.5 7.75L11.654 8.563C10.9189 8.77313 10.2494 9.1671 9.70874 9.70774C9.1681 10.2484 8.77413 10.9179 8.564 11.653L7.75 14.5L6.937 11.654C6.72687 10.9189 6.3329 10.2494 5.79226 9.70874C5.25162 9.1681 4.58214 8.77413 3.847 8.564L1 7.75L3.846 6.937C4.58114 6.72687 5.25062 6.3329 5.79126 5.79226C6.3319 5.25162 6.72587 4.58214 6.936 3.847L6.937 3.846Z"
          fill="black"
          stroke="black"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </span>
  </div>
  <h1 v-else v-html="fancylabel" :id="createId" :aria-label="label"></h1>
</template>
<script>
import { slugify } from "../helpers/slugify"
import inputMixins from "./mixins/input"
export default {
  mixins: [inputMixins],
  props: {
    text: {
      type: String,
      default: "",
    },
    help: {
      type: [Object, Array, Boolean],
      default: false,
    },
  },
  mounted() {
    this.buildShadow()
    this.generateParticles()
  },
  methods: {
    buildShadow() {
      if (!this.extras.shadow) return
      console.log("build shadow")
      const title = document.getElementById("hi-im-brynn")
      const highlight = title.querySelector(".highlight")
      let shadow = ""
      const shadowlength = 500
      const groupNumber = 125
      const multiColor = false
      for (let group = 0; group < shadowlength; group += groupNumber) {
        for (let i = group; i < group + groupNumber && i < shadowlength; i++) {
          let color = `var(--shadow-color)`
          if (multiColor) {
            color = `var(--shadow-color-${group / groupNumber + 1})`
          }
          shadow += (shadow ? "," : "") + `-${i}px ${i}px 0 ${color}`
        }
      }
      highlight.style.setProperty("--shadow", shadow)
    },
    generateParticles() {
      const RANDOM = (min, max) => Math.floor(Math.random() * (max - min + 1) + min)
      const PARTICLES = document.querySelectorAll(".particle")
      PARTICLES.forEach((P) => {
        P.setAttribute(
          "style",
          `
          --x: ${RANDOM(20, 80)};
          --y: ${RANDOM(20, 80)};
          --duration: ${RANDOM(6, 20)};
          --delay: ${RANDOM(1, 10)};
          --alpha: ${RANDOM(80, 100) / 100};
          --origin-x: ${Math.random() > 0.5 ? RANDOM(300, 800) * -1 : RANDOM(300, 800)}%;
          --origin-y: ${Math.random() > 0.5 ? RANDOM(300, 800) * -1 : RANDOM(300, 800)}%;
          --size: ${RANDOM(40, 300) / 100};
        `,
        )
      })
    },
  },
  computed: {
    createId() {
      return slugify(this.label)
    },
    fancylabel() {
      if (this.extras.highlight) {
        if (!this.extras.explode) return this.label.replace(this.extras.highlight, `<span class="highlight">${this.extras.highlight}</span>`)
        const explodedString = this.extras.highlight.split("")
        const builtString = []
        explodedString.forEach((letter) => {
          builtString.push(`<span class="letter">${letter}</span>`)
        })
        if (this.extras.repeats) {
          const repeats = `<span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>
          <span class="highlight">${builtString.join("")}</span>`
          return this.label.replace(this.extras.highlight, repeats)
        } else {
          return this.label.replace(this.extras.highlight, `<span class="highlight">${builtString.join("")}</span>`)
        }
      } else {
        return this.label
      }
    },
    setParticles() {
      if (!this.extras.particles) return
      return this.generateParticles()
    },
  },
}
</script>
