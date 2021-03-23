<template>
  <section class="about-us-section">
    <div class="container">
      <div class="section-title text-center">
        <h2>About the <span>Scholarship</span></h2>

        <span v-html="settings.home_about"></span>
      </div>

      <!-- <home-benefits-component /> -->

      <!-- <home-gallery-component /> -->
    </div>
  </section>
</template>

<script>
export default {
  inject: ["user", "settings"],

  data() {
    return {
      //
    };
  },
};
</script>
