<template>
  <section class="main-banner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-7">
          <div class="banner-text wow fadeInLeft" data-wow-duration="1000ms">
            <h2>The Smarter Way to Learn <span>Anything</span></h2>
            <p>
              Mauris malesuada enim eget blandit gravida. Duis hendrerit cursus
              turpis, id mollis est rutrum nec. Sed interdum nisi id libero
              tincidunt, sit amet vestibulum tortor porttitor. Cras ligula
              lacus, ullamcorper sed
            </p>
            <a :href="route('scholarship./')"
              ><breeze-button
                class="px-4 py-3 rounded-full bg-main hover:bg-main hover:shadow-lg hover:text-white"
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
            <img :src="`${asset_url}/banner-img.png`" alt="" />
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
