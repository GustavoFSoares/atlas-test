<template>
  <div class="pokedex-list">
    <div class="pokedex-list__inputs-wrapper">
      <fm-input
        class="pokedex-list__input"
        placeholder="Search"
        icon="magnifier"
        type="text"
        v-model="filters.search"
      />

      <fm-input
        class="pokedex-list__input"
        placeholder="Show All"
        icon="chevron-down"
        type="number"
        v-model="filters.limit"
      />
    </div>

    <div class="pokedex-list__pokemons-list">
      <pokemon-card
        v-for="pokemon in pokemons"
        :key="pokemon.id"
        :identifier="pokemon.id"
        :name="pokemon.name"
        :image="pokemon.image"
        :types="pokemon.types"
      />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import FmInput from '@/js/components/atoms/FmInput.vue'
import PokemonCard from '../partials/List/PokemonCard.vue'

export default {
  name: 'pokedex-list',
  components: {
    FmInput,
    PokemonCard
  },
  data() {
    return {
      filters: {
        search: null,
        limit: null
      }
    }
  },
  watch: {
    filters: {
      deep: true,
      handler() {
        this.getPokemons()
      }
    }
  },
  computed: {
    ...mapState('PokemonApi', ['pokemons'])
  },
  methods: {
    getPokemons() {
      this.$store.dispatch('PokemonApi/getPokemons', this.filters)
    }
  },
  mounted() {
    this.getPokemons()
  }
}
</script>

<style lang="scss" scoped>
@import "@/sass/_flex.scss";
@import "@/sass/_colors.scss";
@import "@/sass/_mixins.scss";

.pokedex-list {
  @extend .flex-column;

  gap: 30px;
  @include media('tablet', 'min') {
    gap: 20px;
  }

  &__inputs-wrapper {
    margin-top: 23px;

    gap: 17px;
    display: flex;
    flex-direction: column;

    @include media('tablet', 'min') {
      margin-top: 30px;

      gap: 21px;
      flex-direction: row;
      justify-content: flex-end;
    }
  }

  &__pokemons-list {
    display: grid;
    gap: 15px;

    @include media('tablet', 'min') {
      grid-template-columns: repeat(3,1fr);
      gap: 20px;
    }

    @include media('tablet', '>') {
      grid-template-columns: repeat(4,1fr);
      gap: 20px;
    }
  }
}
</style>
