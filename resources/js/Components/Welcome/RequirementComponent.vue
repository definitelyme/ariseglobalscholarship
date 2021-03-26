<template>
  <section
    class="about-us-section"
    style="padding-top: 0px; padding-bottom: 0px"
  >
    <div class="container">
      <div class="section-title text-center">
        <h3>What are the <span>requirements</span> to apply?</h3>

        <div class="container">
          <div class="row custom-list">
            <div class="col-12" v-html="settings.requirements"></div>
          </div>
        </div>
      </div>

      <home-gallery-component v-if="$detector.isMobile" />
    </div>
  </section>
</template>

<script>
export default {
  inject: ["settings"],
};
</script>
