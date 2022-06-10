<template>
  <a
    class="fm-menu-item"
    :href="href"
  >
    <div class="content">
      <component class="content__icon" :is="icon" />

      <span :class="[
          'content__text',
          { 'exact': isExact }
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

