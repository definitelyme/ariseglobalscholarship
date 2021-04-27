<template>
  <div class="covid-banner" v-show="show">
    <div>
      <p>
        {{ settings.covidSafetySM }}
        <!-- <a class="banner-more" href="#">Learn More</a> -->
        <a class="banner-dismiss" href="#" @click.prevent="dismiss">Dismiss</a>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  inject: ["settings"],

  data() {
    return {
    //   show:
    //     JSON.parse(localStorage?.showCovidBanner ?? null) ??
    //     true & this.settings.showCovidBanners & this.settings.showBottomBanner,
        show: this.settings.showCovidBanners & this.settings.showBottomBanner,
    };
  },

  methods: {
    dismiss() {
      this.show = false;
    //   localStorage.showCovidBanner = false;
    },
  },
};
</script>

<style scoped>
.covid-banner {
  border-top: 2px solid #d10000;
  position: fixed;
  display: inherit;
  bottom: 0;
  left: 0;
  width: 100%;
  max-width: 100%;
  padding: 1rem 0.5rem;
  background: #fff;
  z-index: 1030;
  color: #000;
  font-size: 14px;
  margin: 0;
  font-family: Inter, sans-serif;
}
.covid-banner p {
  margin: 0;
  color: #000;
  text-align: center;
}
.covid-banner .banner-wrapper p {
  padding-right: 3rem;
}
.covid-banner a {
  text-decoration: none;
  margin: 20px auto 0 auto;
  display: block;
  max-width: 130px;
}
.banner-dismiss {
  padding: 7px 15px;
  color: #fff;
  border-radius: 5px;
  background: #d10000;
  text-decoration: none;
}
@media (min-width: 768px) {
  .covid-banner {
    padding: 1.5rem 0.5rem;
  }
  .covid-banner a {
    display: inline-block;
    margin: 0 10px;
  }
}
</style>
