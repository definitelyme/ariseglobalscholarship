<template>
  <div
    class="w-full h-full absolute"
    :class="clazz"
    v-show="show"
    @click="onClick"
  ></div>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      onClick: () => {},
      clazz: null,
    };
  },

  //   props: {
  //     backgroundColor: {
  //       type: String,
  //       required: false,
  //     },
  //   },

  created() {
    this.$emitter.on(this.$events.toggleFullOverlay, (params) => {
      this.show = params.visible || true;
      this.onClick =
        typeof params.callback === "function"
          ? () => {
              this.show = params.visible || false;
              params.callback();
            }
          : () => {
              this.show = params.visible || false;
            };
      let background = params.background || "bg-black";
      let opacity = params.opacity || "bg-opacity-60";
      let zIndex = params.zIndex || "z-50";

      this.clazz = [background, opacity, zIndex].join(" ");
    });
  },
};
</script>
