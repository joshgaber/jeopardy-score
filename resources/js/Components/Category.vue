<template>
  <div class="flex flex-col">
    <category-title :category="category" class="flex-initial" @input="onTitleChange" />
    <answer v-for="answer in category.answers" :key="answer.id" :answer="answer" class="flex-auto" />
  </div>
</template>

<script>
import Answer from '@/Components/Answer'
import CategoryTitle from '@/Components/CategoryTitle'
export default {
  name: 'Category',
  components: { Answer, CategoryTitle },
  props: ['category'],
  methods: {
    onTitleChange(title) {
      console.log(title)
    }
  }
}
</script>

<style scoped></style>
