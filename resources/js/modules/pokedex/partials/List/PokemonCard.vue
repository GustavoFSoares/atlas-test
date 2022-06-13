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

      <div class="data__card">
        <div class="data__card__container">
          <div class="data__card__container__content">
            <div class="types">
              <div class="types__item types__item--grass">G</div>
              <div class="types__item types__item--poison">P</div>
            </div>

            <div class="name">
              <h4 class="name__text">bulbasaur</h4>
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
}
</script>
