<template>
  <div v-show="show"></div>
</template>

<script>
export default {
  inject: ["settings"],

  data() {
    return {
      show:
        JSON.parse(localStorage?.showCovidBanner ?? null) ??
        true & this.settings.showCovidBanners & !this.settings.showBottomBanner,
    };
  },

  methods: {
    dismiss() {
      this.show = false;
      localStorage.showCovidBanner = false;
    },
  },
};
</script>
