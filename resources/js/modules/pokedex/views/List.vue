<template>
  <div class="pokedex-list">
    <div>
      <pokemon-card
        identifier="001"
        name="bulba"
        :types="['bug']"
      />
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
