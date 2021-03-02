<template>
  <div>
    <div class="main-section">
      <header-component />
      <side-nav-component />
      <main-banner-component />
      <h2 class="main-title" v-text="app_name"></h2>
    </div>
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
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    quote: String,
    settings: String,
  },
  created() {
    // console.log(this.route("login"));
  },
};
</script>

<style lang="css">
img {
  display: inline-block !important;
}
</style>
