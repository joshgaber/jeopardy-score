<template>
  <div class="h-screen flex flex-col">
    <div class="flex-initial h-16 bg-white">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ game.name }}
      </h2>
    </div>

    <div class="flex-auto bg-white">
      <div class="flex h-full">
        <category v-for="category in regular" :key="category.id" :category="category" class="flex-auto" />
      </div>
    </div>
  </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Category from '@/Components/Category'

export default {
  name: 'Store',
  components: {
    AppLayout,
    Category
  },
  props: ['game'],
  computed: {
    regular() {
      return this.game.categories.filter(cat => cat.type === 'regular')
    },
    double() {
      return this.game.categories.filter(cat => cat.type === 'double')
    },
    final() {
      return this.game.categories.filter(cat => cat.type === 'final')
    }
  }
}
</script>

<style scoped></style>
