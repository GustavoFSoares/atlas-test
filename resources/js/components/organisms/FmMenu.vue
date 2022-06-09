<template>
  <nav class="fm-menu" :class="{'active' : isShowMenu}">
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
  name: 'VMenu',
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
      isShowMenu: true
    }
  },
  watch: {
    isShowMenu (val) {
      this.showMenu(val)
    }
  },
  mounted () {
    // if (window.innerWidth < 768) {
    //   const gsap = this.$gsap
    //   gsap.set(
    //     '.menu-item', {
    //       x: 768
    //     })
    // }
  },
  methods: {
    showMenu (bol) {
    //   const gsap = this.$gsap
    //   gsap.to(
    //     '.menu-item',
    //     {
    //       x: (bol) ? 0 : 768,
    //       stagger: (bol) ? 0.2 : 0.1
    //     })
    },
    toTop () {
      // if (window.scrollY === 0) {
      //   this.$router.push({ name: 'index' })
      // }

      // window.scrollTo({ top: 0, behavior: 'smooth' })
      // history.pushState('/', 'Rebirth Studio', '/')
    }
  }
}
</script>
