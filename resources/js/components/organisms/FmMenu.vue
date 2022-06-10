<template>
  <nav class="fm-menu" :class="{'active': isShowMenu}">
    <fm-menu-logo class="fm-menu-logo" />

    <fm-menu-button
      class="fm-menu-button"
      :is-show-menu.sync="isShowMenu"
    />

    <div class="fm-menu-items" @click="isShowMenu = false">
      <div class="fm-menu-items__container">
        <fm-menu-item
          v-for="(item, index) in menuItems"
          :key="`${index}-${item}`"
          :label="item.label"
          :href="item.path"
          :hash="item.id"
          :name="item.name"
          :class="`fm-menu-items__container--item fm-menu-items__container--item-${item.name}`"
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
