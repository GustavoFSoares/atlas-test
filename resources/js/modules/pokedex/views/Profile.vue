<template>
  <section class="pokedex-profile fm-text-color-1">
    <div class="pokedex-profile__showcase">
      <img
        class="pokedex-profile__image"
        :src="pokemon.image"
        :alt="pokemon.name"
      >

      <h1 class="pokedex-profile__name">{{pokemonId | idNormalizer }} {{ pokemon.name }}</h1>
    </div>

    <div class="pokedex-profile__stats"></div>
  </section>
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
  data() {
    return {
      pokemon: {}
    }
  },
  methods: {
    async getPokemon() {
      this.pokemon = await this.$store.dispatch('PokemonApi/getPokemonStats', this.pokemonId)
    },
  },
  mounted() {
    this.getPokemon()
    // this.getPokemonTypes()
  }
}
</script>

<style lang="scss" scoped>
@import "@/sass/_flex.scss";
@import "@/sass/_colors.scss";
@import "@/sass/_fonts.scss";
@import "@/sass/_mixins.scss";

.pokedex-profile {
  @extend .flex;

  gap: 40px;
  margin-bottom: 20px;
  @include media('tablet', 'min') {
    gap: 20px;
    margin-bottom: 93px;
  }

  &__showcase {
    @extend .flex-column;
    @extend .flex-center;
    gap: 16px;
  }

  &__name {
    @extend .flex-center;
    @extend .fm-text-color-1;
    @extend .fm-font-size-45;
    @extend .fm-font-weight-bold;
  }
}
</style>
