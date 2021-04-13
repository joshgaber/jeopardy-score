<template>
  <square>
    <div class="flex justify-center items-center h-full">
      <div contenteditable="true" :ref="`title-${category.id}`" @blur="onInput" class="table-cell h-32 w-full jeopardy-font text-white text-shadow text-3xl text-center bg-transparent border-0 uppercase align-middle outline-none resize-none">
        {{ title }}
      </div>
    </div>
  </square>
</template>

<script>
import Square from '@/Components/Square'
export default {
  name: 'CategoryTitle',
  components: {
    Square
  },
  props: ['category'],
  mounted() {
    this.refs[`title-${this.category.id}`].innerText = this.category.name
  },
  methods: {
    onInput(e) {
      this.$emit('input', e.target.innerText)
    }
  }
}
</script>

<style scoped></style>
