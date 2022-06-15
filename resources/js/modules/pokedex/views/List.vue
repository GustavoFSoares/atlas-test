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
        v-for="pokemon in filteredPokemons"
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
  computed: {
    ...mapState('PokemonApi', ['pokemons']),
    filteredPokemons() {
      if (!this.pokemons) {
        return null
      }

      let filteredPokemons = [...this.pokemons]

      if (this.filters.search) {
        filteredPokemons = filteredPokemons.filter(({ name }) => {
          return name.includes(this.filters.search)
        })
      }

      if (this.filters.limit) {
        filteredPokemons = filteredPokemons.splice(0, this.filters.limit)
      }

      return filteredPokemons
    }
  },
  methods: {
    getPokemons() {
      this.$store.dispatch('PokemonApi/loadPokemonData')
    }
  },
  mounted() {
    this.getPokemons()
  }
}
</script>

<style lang="scss" scoped>
@import "@/sass/_flex.scss";
@import "@/sass/_mixins.scss";

.pokedex-list {
  @extend .flex-column;

  gap: 30px;
  margin-bottom: 20px;
  @include media('tablet', 'min') {
    gap: 20px;
    margin-bottom: 93px;
  }

  &__input {
    @include media('tablet', 'min') {
      width: 200px;
    }
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
