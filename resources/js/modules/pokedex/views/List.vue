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

      <fm-select
        class="pokedex-list__input"
        placeholder="Show All"
        icon="chevron-down"
        type="number"
        v-model="filters.type"
        :options="types"
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
import FmSelect from '@/js/components/atoms/FmSelect.vue'
import PokemonCard from '../partials/List/PokemonCard.vue'

export default {
  name: 'pokedex-list',
  components: {
    FmInput,
    FmSelect,
    PokemonCard
  },
  data() {
    return {
      filters: {
        search: null,
        type: null
      }
    }
  },
  computed: {
    ...mapState('PokemonApi', ['pokemons', 'types']),
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

      if (this.filters.type) {
        filteredPokemons = filteredPokemons.filter(({ types }) => {
          return types.includes(this.filters.type)
        })
      }

      return filteredPokemons
    }
  },
  methods: {
    getPokemons() {
      this.$store.dispatch('PokemonApi/loadPokemonData')
    },
    getPokemonTypes() {
      this.$store.dispatch('PokemonApi/loadPokemonTypes')
    },
  },
  mounted() {
    this.getPokemons()
    this.getPokemonTypes()
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
