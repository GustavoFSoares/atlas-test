<template>
  <div class="pokedex-profile">
    {{ pokemonId }}
  </div>
</template>

<script>
export default {
  name: 'pokedex-profile',
  props: {
    pokemonId: {
      type: Number,
      required: true
    }
  },
  methods: {
    getPokemons() {
      this.$store.dispatch('PokemonApi/loadPokemonData')
    },
  },
  mounted() {
    // this.getPokemons()
    // this.getPokemonTypes()
  }
}
</script>

<style lang="scss" scoped>
@import "@/sass/_flex.scss";
@import "@/sass/_mixins.scss";

.pokedex-profile {
  @extend .flex;

  gap: 40px;
  margin-bottom: 20px;
  @include media('tablet', 'min') {
    gap: 20px;
    margin-bottom: 93px;
  }
}
</style>
