<template>
  <section class="about-us-section pb-0">
    <div class="container">
      <div class="section-title text-center">
        <h3>About the <span>Scholarship</span></h3>

        <span v-html="settings.home_about"></span>
      </div>

      <!-- <home-benefits-component /> -->
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
