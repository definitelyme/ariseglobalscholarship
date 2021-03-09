<template>
  <div
    class="w-full h-full fixed block top-0 left-0 bg-black opacity-75 z-50"
    @click.prevent="emitter.emit('closeSidebar', false)"
    v-show="isSidebarOpen"
  ></div>
</template>

<script>
export default {
  data() {
    return {
      isSidebarOpen: false,
    };
  },

  mounted() {
    this.emitter.on("closeSidebar", (isOpen) => {
      this.isSidebarOpen = isOpen;
      this.$parent.sidebarOpen = this.isSidebarOpen;

      $("body").removeClass("scroll-hide");
      $(".responsive-menu").removeClass("active");
      $(".menu-btn").removeClass("active");
    });

    this.emitter.on("toggleSidebar", () => {
      var status = this.isSidebarOpen;
      this.isSidebarOpen = !status;
      this.$parent.sidebarOpen = this.isSidebarOpen;

      if (status == false) {
        $("body").removeClass("scroll-hide");
        $(".responsive-menu").removeClass("active");
        $(".menu-btn").removeClass("active");
      }
    });
  },
};
</script>
