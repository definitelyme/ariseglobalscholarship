<template>
  <div>
    <div class="main-section">
      <header-component />
      <side-nav-component ref="sideNav" />
      <main-banner-component ref="topNav" />
      <h2 class="main-title" v-text="app_initials"></h2>
    </div>

    <div
      class="w-full h-full fixed block top-0 left-0 bg-black opacity-75 z-50"
      @click.prevent="emitter.emit('closeSidebar', false)"
      v-show="isSidebarOpen"
    ></div>
    <!--  -->
    <about-us-component />
    <classes-component />
    <teachers-component />
    <find-course-component />
    <blog-component />
    <news-letter-component />
    <footer-component />
  </div>
</template>

<script>
export default {
  data() {
    return {
      isSidebarOpen: false,
    };
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    quote: String,
    settings: String,
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
    };
  },

  mounted() {
    this.emitter.on("closeSidebar", (isOpen) => {
      this.isSidebarOpen = isOpen;
      $("body").removeClass("scroll-hide");
      $(".responsive-menu").removeClass("active");
      $(".menu-btn").removeClass("active");
    });
  },
};
</script>

<style lang="css">
img {
  display: inline-block !important;
}
</style>
