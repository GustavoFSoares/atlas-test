<template>
  <section class="pokedex-profile">
    <div class="pokedex-profile__showcase">
      <img
        class="pokedex-profile__image"
        :src="pokemon.image"
        :alt="pokemon.name"
      >

      <h1 class="pokedex-profile__name">{{pokemonId | idNormalizer }} {{ pokemon.name }}</h1>
    </div>

    <div class="pokedex-profile__stats">
      <pokemon-statistics
        :types="pokemon.types"
        :stats="pokemon.stats"
        :descriptions="pokemon.flavorTexts"
      />
    </div>

    <profile-background
      class="pokedex-profile__background-decorator"
      :main-pokemon-type="mainPokemonType"
    />
  </section>
</template>

<script>
import PokemonStatistics from "@/js/modules/pokedex/partials/Profile/PokemonStatistics.vue";
import ProfileBackground from "@/js/modules/pokedex/decorators/Profile/ProfileBackground.vue";

export default {
  name: 'pokedex-profile',
  components: {
    PokemonStatistics,
    ProfileBackground,
  },
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
  computed: {
    mainPokemonType() {
      if (!this.pokemon || !this.pokemon.types) {
        return 'no-defined'
      }

      const [mainType] = this.pokemon.types

      return mainType || 'no-defined'
    },
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
  margin-top: 10px;

  @include media('tablet', 'min') {
    gap: 20px;
    margin-top: 13px;
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
    text-transform: capitalize;
  }

  &__stats {
    width: 100%;
  }

  &__background-decorator {
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: -1;
  }
}
</style>
