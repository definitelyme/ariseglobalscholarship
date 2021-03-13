<template>
  <section class="main-banner py-0 px-0">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 col-md-5">
          <!--banner-img end-->
          <div
            class="elements-bg wow zoomIn"
            :class="{ hidden: bannerHidden }"
            data-wow-duration="1000ms"
            style="
              visibility: visible;
              animation-duration: 1000ms;
              animation-name: jb;
            "
          ></div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    bannerHidden: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
};
</script>
