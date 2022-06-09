<template>
  <a
    class="fm-menu-item"
    :href="href"
  >
    <span :class="[
        'fm-menu-item__text',
        { 'fm-menu-item__text--exact': isExact }
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

