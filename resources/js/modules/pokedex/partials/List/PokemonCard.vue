<template>
  <div class="pokemon-card">
    <div class="pokemon-card__image">
      <div class="img" />
    </div>

    <div class="pokemon-card__container">
      <div class="header">
        <span class="header__identifier">
          #001
        </span>
      </div>

      <div class="content">
        <div class="content__types">
          <div class="content__types__item content__types__item--grass">G</div>
          <div class="content__types__item content__types__item--poison">P</div>
        </div>

        <div class="content__name">
          <h4 class="content__name__text">bulbasaur</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'pokemon-card',
}
</script>
