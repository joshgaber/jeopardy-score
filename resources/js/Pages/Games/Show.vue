<template>
  <div class="h-screen flex flex-col">
    <div class="flex-initial flex h-16 bg-jeopardy-blue border border-white">
      <inertia-link :href="route('games.index')" class="block h-full leading-8 p-4 text-2xl font-bold text-jeopardy-yellow hover:bg-jeopardy-blue-lighter">
        &lt;
      </inertia-link>
      <h2 class="font-semibold text-2xl text-jeopardy-yellow leading-8 ml-2 py-4">{{ game.name }} - {{ game.game_date }}</h2>
    </div>

    <div class="flex-auto bg-white">
      <div class="flex h-full">
        <category v-for="category in regular" :key="category.id" :category="category" class="flex-auto" />
      </div>
    </div>
  </div>
</template>

<script>
import Category from '@/Components/Category'

export default {
  name: 'Store',
  components: {
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
