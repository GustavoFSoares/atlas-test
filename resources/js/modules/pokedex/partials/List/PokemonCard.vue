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
                :src="`/images/pokemon-types/${type}.png`"
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

<style lang="scss" scoped>
@import "@/sass/_flex.scss";
@import "@/sass/_fonts.scss";
@import "@/sass/_colors.scss";
@import "@/sass/_mixins.scss";

.pokemon-card {
  position: relative;
  @extend .flex-column;

  @include media('tablet', 'min') {
    width: 20rem;
  }

  &__image {
    @extend .flex;

    position: absolute;
    right: 0;

    @include media('tablet', 'min') {
      position: initial;
      margin-bottom: -4rem;

      justify-content: center;
    }

    .img {
      width: 10rem;
      height: 10rem;

      z-index: 2;
    }
  }

  &__container{
    border-radius: 8px;

    padding-bottom: 10px;

    .header {
      height: 2.5rem;

      @extend .flex;
      justify-content: flex-start;
      align-items: flex-start;

      @include media('tablet', 'min') {
        justify-content: flex-end;
        align-items: flex-end;
      }

      &__identifier {
        @extend .fm-text-color-1;
        @extend .fm-font-size-16;
        @extend .fm-font-weight-regular;

        margin: 3px 0 0 10px;

        @include media('tablet', 'min') {
          margin: 0 5px 2px 0;
        }
      }
    }

    .data__card {
      @extend .fm-background-1;

      @include media('mobile', 'max') {
        padding-right: 10rem;
      }

      &__container {
        padding: 10px;

        &__content {
          position: relative;

          @extend .flex;
          flex-direction: row-reverse;
          height: 4.5rem;

          .types {
            @include media('tablet', 'min') {
              position: absolute;
              left: 0;
            }

            height: 100%;
            @extend .flex-column;
            @extend .flex-center;

            gap: 7px;

            &__item {
              height: 18px;

              @extend .flex-center-center;
            }
          }

          .name {
            @extend .flex-align-center;

            flex-grow: 1;
            @include media('tablet', 'min') {
              justify-content: center;
            }

            &__text {
              height: 100%;

              @extend .flex-align-center;
              @extend .fm-font-size-18;
              @extend .fm-font-weight-regular;
            }
          }
        }
      }
    }
  }
}
</style>
