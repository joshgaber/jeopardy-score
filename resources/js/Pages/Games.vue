<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Games
      </h2>
      <span>
        <a :href="route('games.create')">+ New Game</a>
      </span>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <ul>
            <li v-for="game in games" :key="game.id">
              <inertia-link :href="route('games.show', game.id)">{{ game.name }}</inertia-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
export default {
  name: 'Games',
  components: {
    AppLayout
  },
  props: ['games']
}
</script>

<style scoped></style>
