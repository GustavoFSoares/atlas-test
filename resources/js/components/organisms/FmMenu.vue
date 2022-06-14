<template>
  <nav
    class="menu"
    :class="{'menu--active': isShowMenu}"
  >
    <fm-menu-logo class="menu__logo" />

    <fm-menu-button
      class="menu__button"
      :is-show-menu.sync="isShowMenu"
    />

    <div class="menu__items" @click="isShowMenu = false">
      <div class="menu__items-container">
        <fm-menu-item
          v-for="(item, index) in menuItems"
          :key="`${index}-${item}`"
          :label="item.label"
          :href="item.path"
          :hash="item.id"
          :name="item.name"
          class="menu__item"
          :class="`menu__item--${item.name}`"
        />
      </div>
    </div>
  </nav>
</template>

<script>
import FmMenuItem from  '../atoms/FmMenuItem.vue'
import FmMenuLogo from  '../atoms/FmMenuLogo.vue'
import FmMenuButton from  '../atoms/FmMenuButton.vue'

export default {
  name: 'fm-menu',
  components: {
    FmMenuItem,
    FmMenuLogo,
    FmMenuButton
  },
  data () {
    return {
      menuItems: [
        {
          label: 'Home',
          path: '/',
          id: 'home',
          name: 'home',
        },
        {
          label: 'Lista',
          path: '/list',
          id: 'list',
          name: 'list',
        },
      ],
      isShowMenu: false
    }
  }
}
</script>
