<template>
  <section
    class="about-us-section"
    style="padding-top: 0px; padding-bottom: 0px"
  >
    <div class="container">
      <div class="section-title text-center">
        <h2>What are the <span>requirements</span> to apply?</h2>

        <div class="container">
          <div class="row">
            <div class="col-12" v-html="settings.requirements"></div>
          </div>
        </div>
      </div>

      <home-gallery-component />
    </div>
  </section>
</template>

<script>
export default {
  inject: ["settings"],
};
</script>

<style scoped>
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
