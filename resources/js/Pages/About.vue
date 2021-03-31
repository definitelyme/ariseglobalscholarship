<template>
  <title-component after="About Us"></title-component>

  <header-component />

  <side-nav-component />
  <sidebar-overlay />

  <hero-component page-title="About Us" />

  <section class="about-page-content">
    <div class="container">
      <div class="abt-page-row">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6">
            <div class="section-title">
              <h2>Welcome to<br /><span v-text="$app_name_short"></span></h2>
              <p class="mw-100">
                Morbi vel augue et metus pellentesque lacinia eu non odio. Sed
                id purus urna. Maecenas ultrices ligula a nisi dictum tristique.
                Suspendisse potenti. Curabitur egestas ultrices sem, eu
                vestibulum leo sagittis et.
              </p>
              <a href="classes.html" title="" class="btn-default"
                >Get Started <i class="fa fa-long-arrow-alt-right"></i
              ></a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="avt-img">
              <img :src="`${$asset_url}/abt1.png`" alt="" />
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6">
            <div class="avt-img">
              <img :src="`${$asset_url_import}/study-photo.png`" alt="" />
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="act-inffo">
              <span>ABOUT US</span>

              <h2>Our Mission</h2>

              <p>
                Praesent rhoncus justo erat, sed sollicitudin arcu malesuada
                vel. Etiam scelerisque justo ut purus luctus ullamcorper.
                Vivamus vitae elit ligula. Fusce eu rutrum nisl.
              </p>

              <ul>
                <li>Etiam ante nisl, maximus vitae sem non, dignissim</li>
                <li>Donec blandit, sapien eu porttitor blandit</li>
                <li>Sed at urna at massa viverra feugiat non</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <about-benefits-component />

  <!-- <news-letter-component /> -->

  <footer-component />
</template>

<script>
export default {
  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      breadcrumbs: this.$attrs.breadcrumbs,
    };
  },
};
</script>
