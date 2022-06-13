<template>
  <div class="pokemon-card">
    <div class="pokemon-card__image">
      <div class="img" />
    </div>

    <div
      class="pokemon-card__container"
      :class="`fm-pokemon-color__background--${mainPokemonType}`"
    >
      <div class="header">
        <span class="header__identifier">#{{ identifier }}</span>
      </div>

      <div class="data__card">
        <div class="data__card__container">
          <div class="data__card__container__content">
            <div class="types">
              <img
                v-for="type in types"
                :key="type"
                class="types__item types__item"
                :src="`/img/pokemon-types/${type}.png`"
              />
            </div>

            <div class="name">
              <h4
                class="name__text"
                :class="`fm-pokemon-color__text--${mainPokemonType}`"
              >{{ name }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'pokemon-card',
  props: {
    identifier: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    types: {
      type: Array,
      required: true
    },
    image: {
      type: String
    }
  },
  computed: {
    mainPokemonType() {
      const [mainType] = this.types

      return mainType
    }
  }
}
</script>
