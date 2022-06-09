<template>
  <a
    class="fm-menu-item"
    :href="href"
  >
    <span :class="[
        'fm-menu-item__text',
        'fm-text-color-1',
        'fm-font-size-16',
        isExact ? 'fm-font-weight-bold' : 'fm-font-weight-light'
      ]"
    >
      {{ label }}
    </span>
  </a>
</template>

<script>
export default {
  name: 'FmMenuItem',
  props: {
    label: {
      type: String,
      default: 'Menu Item',
      required: true
    },
    href: {
      type: String,
      default: '#',
      required: false
    },
    hash: {
      type: String,
      default: '#'
    },
    name: {
      type: String,
      default: ''
    }
  },
  computed: {
    isExact() {
      return this.href === window.location.pathname
    }
  }
}
</script>

<style scoped lang="scss">

.fm-menu-item {
  height: 100%;

  &__text {
    width: 100%;
    min-width: 200px;

    align-self: center;
    text-align: center;
  }
}
</style>
