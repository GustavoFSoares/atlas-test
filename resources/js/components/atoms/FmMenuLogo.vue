<template>
  <div class="menu-logo">
    <h2 class="menu-logo__title">PokeAtlas</h2>

    <div class="menu-logo__decorator">
      <div class="menu-logo__line" />
    </div>
  </div>
</template>

<script>
export default {
  name: 'fm-menu-logo'
}
</script>

<style lang="scss" scoped>
@import "@/sass/_flex.scss";
@import "@/sass/_colors.scss";
@import "@/sass/_fonts.scss";
@import "@/sass/_mixins.scss";

.menu-logo {
  @extend .flex-space-between;
  gap: 19px;

  &__title {
    @extend .fm-text-color-1;
    @extend .fm-font-size-20;
    @extend .fm-font-weight-regular;
  }

  &__decorator {
    width: 70px;
    @include media('tablet', 'max') {
      display: none;
    }

    @extend .flex-column;
    @extend .flex-center;

    .menu-logo__line {
      border: 1px solid map-get($colors, 1);
    }
  }

}

</style>
