<template>
  <div class="pokedex-list">
    <div>
      <pokemon-card />
    </div>
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
