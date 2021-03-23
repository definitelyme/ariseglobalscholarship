<template>
  <section
    class="about-us-section"
    style="padding-top: 0px; padding-bottom: 0px"
  >
    <div class="container">
      <div class="section-title text-center">
        <h2>Eligibility</h2>

        <div
          class="container"
          v-if="
            grid.breakpoint == 'lg' ||
            grid.breakpoint == 'xl' ||
            grid.breakpoint == 'xxl' ||
            grid.breakpoint == 'xxxl'
          "
        >
          <div class="row">
            <div
              class="col-lg-6 col-md-12 col-sm-12"
              v-html="settings.eligibility_1"
            ></div>
            <div
              class="col-lg-6 col-md-12 col-sm-12"
              v-html="settings.eligibility_2"
            ></div>
          </div>
        </div>

        <div class="container" v-else>
          <div class="row">
            <div class="col-md-12">
              <ol v-html="eligibility"></ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { useScreen, useGrid } from "vue-screen";

export default {
  inject: ["settings"],

  setup() {
    const screen = useScreen();
    const grid = useGrid("tailwind");

    return {
      screen,
      grid,
    };
  },

  computed: {
    eligibility() {
      return (
        this.settings.eligibility_1.replace("<ol>", "").replace("</ol>", "") +
        this.settings.eligibility_2.replace("<ol>", "").replace("</ol>", "")
      );
    },
  },
};
</script>

<style>
ol {
  counter-reset: my-awesome-counter;
  list-style: none;
  padding-left: 30px;
}
ol li {
  margin: 0 0 0.5rem 0;
  counter-increment: my-awesome-counter;
  position: relative;
  color: initial;
  text-align: justify;
}
ol li::before {
  content: counter(my-awesome-counter);
  color: #3e3e3e;
  font-size: 1.5rem;
  font-weight: bold;
  position: absolute;
  --size: 32px;
  left: calc(-1 * var(--size) - 10px);
  line-height: var(--size);
  width: var(--size);
  height: var(--size);
  top: 0;
  transform: rotate(-10deg);
  background: #eeeeee;
  border-radius: 50%;
  text-align: center;
  box-shadow: 1px 1px 0 #999;
}
</style>
