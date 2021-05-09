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
          <form @submit.prevent="createGame">
            <label for="name">Name</label>
            <input type="text" id="name" v-model="name" />
            <label for="game-date">Date of Game</label>
            <datepicker v-model="gameDate" id="game-date" inline format="yyyy-MM-dd" />
            <label>
              <input type="checkbox" v-model="defaultSetup" />
              Use default Jeopardy! setup
            </label>
            <v-button class="mt-2 block" type="submit">Create</v-button>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Datepicker from 'vuejs-datepicker'
import VButton from '@/Components/Form/VButton'

export default {
  name: 'CreateGame',
  components: {
    VButton,
    AppLayout,
    Datepicker
  },
  data() {
    return {
      name: '',
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
        name: this.name.length > 0 ? this.name : this.gameDateFormatted,
        game_date: this.gameDateFormatted,
        default_setup: this.defaultSetup
      })
    }
  }
}
</script>

<style scoped></style>
