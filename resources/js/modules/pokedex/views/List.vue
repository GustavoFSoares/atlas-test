<template>
  <div class="pokedex-list">
    <div class="pokedex-list__inputs-wrapper">
      <fm-input class="pokedex-list__input" placeholder="Search" v-model="filters.search" icon="magnifier" />
      <fm-input class="pokedex-list__input" placeholder="Show All" v-model="filters.showAll" icon="chevron-down" />
    </div>

    <div class="pokedex-list__pokemons-list">
      <pokemon-card
        identifier="001"
        name="bulba"
        :types="['bug']"
      />
      <pokemon-card
        identifier="001"
        name="bulba"
        :types="['bug']"
      />
      <pokemon-card
        identifier="001"
        name="bulba"
        :types="['bug']"
      />
      <pokemon-card
        identifier="001"
        name="bulba"
        :types="['bug']"
      />
      <pokemon-card
        identifier="001"
        name="bulba"
        :types="['bug']"
      />
    </div>
  </div>
</template>

<script>
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
        search: ''
      }
    }
  },
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

  &__input {
    @include media('tablet', 'min') {
      width: 200px;
    }
  }

  &__pokemons-list {
    display: grid;
    gap: 15px;

    @include media('tablet', 'min') {
      grid-template-columns: repeat(4,1fr);
      gap: 20px;
    }
  }
}
</style>
