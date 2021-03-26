<template>
  <section class="main-banner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-7">
          <div class="banner-text wow fadeInLeft" data-wow-duration="1000ms">
            <h2>{{ $app_name_short }} <span>Scholarship</span></h2>
            <p v-text="settings.description"></p>
            <a :href="route('scholarship./')"
              ><breeze-button
                class="px-4 py-3 rounded-full bg-main-600 hover:bg-main-400 hover:shadow-lg hover:text-white"
                type="button"
              >
                Get Started
                <i
                  class="fa fa-long-arrow-alt-right"
                  style="padding-left: 10px"
                ></i>
              </breeze-button>
            </a>
          </div>
        </div>
        <div class="col-lg-5 col-md-5">
          <div class="banner-img wow zoomIn" data-wow-duration="1000ms">
            <img :src="`${$asset_url}/banner-img.png`" alt="" />
          </div>
          <!--banner-img end-->
          <div class="elements-bg wow zoomIn" data-wow-duration="1000ms"></div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import BreezeButton from "@/Components/Button";

export default {
  inject: ["user", "settings"],

  components: {
    BreezeButton,
  },
  data() {
    return {
      //
    };
  },
};
</script>
