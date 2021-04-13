<template>
  <square>
    <div class="flex justify-center items-center h-full">
      <div class="jeopardy-font text-jeopardy-yellow text-shadow text-5xl select-none">${{ answer.value }}</div>
    </div>
  </square>
</template>

<script>
import Square from '@/Components/Square'
export default {
  name: 'Answer',
  components: {
    Square
  },
  props: ['answer']
}
</script>

<style scoped></style>
