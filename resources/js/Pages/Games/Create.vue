<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create a Game
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg">
          <form @submit="createGame">
            <label for="game-date">Date of Game</label>
            <datepicker v-model="gameDate" id="game-date" inline format="yyyy-MM-dd" />
            <label>
              <input type="checkbox" v-model="defaultSetup" />
              Use default Jeopardy! setup
            </label>
            <button type="submit">Create</button>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Datepicker from 'vuejs-datepicker'
export default {
  name: 'CreateGame',
  components: {
    AppLayout,
    Datepicker
  },
  data() {
    return {
      gameDate: new Date(),
      defaultSetup: true
    }
  },
  computed: {
    gameDateFormatted() {
      return this.gameDate.toJSON().split('T')[0]
    }
  },
  methods: {
    createGame() {
      this.$inertia.post(this.route('games.store'), {
        game_date: this.gameDateFormatted,
        default_setup: this.defaultSetup
      })
    }
  }
}
</script>

<style scoped></style>
