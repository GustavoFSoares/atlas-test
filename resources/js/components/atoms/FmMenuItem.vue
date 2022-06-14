<template>
  <a
    class="menu-item"
    :href="href"
  >
    <div class="menu-item__content">
      <component class="menu-item__icon" :is="icon" />

      <span :class="[
          'menu-item__text',
          { 'menu-item__text--exact': isExact }
        ]"
      >
        {{ label }}
      </span>
    </div>
  </a>
</template>

<script>
import FmHomeIcon from "../../icons/FmHomeIcon.vue";
import FmListIcon from "../../icons/FmListIcon.vue";

export default {
  name: 'fm-menu-item',
  components: {
    FmHomeIcon,
    FmListIcon
  },
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
    },
    icon() {
      const icons = {
        home: 'fm-home-icon',
        list: 'fm-list-icon',
      }

      return icons[this.name]
    }
  }
}
</script>

