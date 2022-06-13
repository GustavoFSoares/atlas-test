<template>
  <div class="pokedex-list">
    <pokemon-card />
  </div>
</template>

<script>
import PokemonCard from '../partials/List/PokemonCard.vue'

export default {
  name: 'pokedex-list',
  components: {
    PokemonCard
  }
}
</script>
