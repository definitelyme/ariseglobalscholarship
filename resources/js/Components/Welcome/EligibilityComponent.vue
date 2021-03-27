<template>
  <section class="about-us-section py-0">
    <div class="container">
      <div class="section-title text-center">
        <h3 style="padding-bottom: 25px">Eligibility</h3>

        <div class="container">
          <div class="row custom-list">
            <div
              class="col-lg-6 col-md-12 col-sm-12"
              v-html="settings.eligibility_1"
              style="counter-reset: my-awesome-counter 0"
            ></div>
            <div
              class="col-lg-6 col-md-12 col-sm-12"
              v-html="settings.eligibility_2"
              :style="{
                'counter-reset': `my-awesome-counter ${eligibility_1_count}`,
              }"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
// import { useScreen, useGrid } from "vue-screen";

export default {
  inject: ["settings"],

  //   setup() {
  //     const screen = useScreen();
  //     const grid = useGrid("tailwind");

  //     return {
  //       screen,
  //       grid,
  //     };
  //   },

  computed: {
    eligibility_1_count() {
      return this.settings.eligibility_1
        .replace("<ol>", "")
        .replace("</ol>", "")
        .match(/<li(.*?)>.*?<\/li>/g);
    },
  },
};
</script>
