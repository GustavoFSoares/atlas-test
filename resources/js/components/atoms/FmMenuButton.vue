<template>
  <div
    :class="[
      'fm-menu-button',
      { 'fm-menu-button__active' : isShowMenu }
    ]"
    @click="handleClick"
  >
    <span />
    <span />
    <span />
  </div>
</template>

<script>
export default {
  name: "fm-menu-button",
  props: {
    isShowMenu: {
      type: Boolean,
      defalt: true
    }
  },
  methods: {
    handleClick() {
      this.$emit('update:is-show-menu', !this.isShowMenu)
    }
  }
}
</script>

<style lang="scss" scoped>
.fm-menu-button {
  height: 20px;
  display: flex;
  /* border-radius: 3px; */
  /* border: 1px solid  #8C8C8C; */
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
  /* padding: 5px; */
  // animation: show-menu 3s ease-in 3s forwards;
  // transform: translate3d(100vw, 0, 0);
  /* box-shadow: 0 0 3px 1px rgba(255, 255, 255, 0.2); */

  &,
  span {
    transition: 1s ease;
  }

  span {
    width: 25px;
    border: 1.5px solid #ffffff;
    background: #ffffff;
  }

  &__active {
    span:nth-child(1) {
      transform:
        rotate(35deg)
        translate3d(4px, 5px, 0);
    }

    span:nth-child(2) {
      opacity: 0;
    }

    span:nth-child(3) {
      transform:
        rotate(-35deg)
        translate3d(3px, -6px, 0);
    }
  }
}
</style>
