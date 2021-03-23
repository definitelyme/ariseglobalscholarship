<template>
  <title-component after="Home"></title-component>

  <div>
    <div class="main-section">
      <header-component />

      <side-nav-component />
      <sidebar-overlay />

      <main-banner-component />

      <h2 class="main-title" v-text="app_initials"></h2>
    </div>

    <about-us-component />
    <eligibility-component />
    <!-- <teachers-component /> -->
    <!-- <find-course-component /> -->
    <!-- <blog-component /> -->
    <news-letter-component />
    <footer-component />
  </div>
</template>

<script>
export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    quote: String,
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
    };
  },
};
</script>

<style lang="css">
img {
  display: inline-block !important;
}
</style>
