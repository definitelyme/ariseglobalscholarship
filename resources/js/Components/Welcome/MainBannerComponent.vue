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
            <form class="search-form">
              <input type="text" name="search" placeholder="Find Anything" />
              <button><i class="fa fa-search"></i></button>
            </form>
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
export default {
  data() {
    return {
      //
    };
  },
};
</script>
