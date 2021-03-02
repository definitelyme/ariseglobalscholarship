<template>
  <section class="about-us-section">
    <div class="container">
      <div class="section-title text-center">
        <h2>
          Welcome to <span>{{ app_name_short }}</span>
        </h2>
        <p>
          Nunc consectetur ex nunc, id porttitor leo semper eget. Vivamus
          interdum, mauris quis cursus sodales, urn
        </p>
      </div>
      <!--section-title end-->
      <div class="about-sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="abt-col wow fadeInUp" data-wow-duration="1000ms">
                <img :src="`${asset_url}/icon5.png`" alt="" />
                <h3>Awesome Teachers</h3>
                <p>Vivamus interdum, mauris interdum quis curdum sodales</p>
              </div>
              <!--abt-col end-->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="abt-col wow fadeInUp"
                data-wow-duration="1000ms"
                data-wow-delay="200ms"
              >
                <img :src="`${asset_url}/icon7.png`" alt="" />
                <h3>Global Certificate</h3>
                <p>
                  Pelleneget tespharetra que fringilla egugue id eget pharetra
                </p>
              </div>
              <!--abt-col end-->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="abt-col wow fadeInUp"
                data-wow-duration="1000ms"
                data-wow-delay="400ms"
              >
                <img :src="`${asset_url}/icon8.png`" alt="" />
                <h3>Best Programm</h3>
                <p>
                  Etiam risus neque, volutpat vel laoreet a, finibus volutpat
                  non
                </p>
              </div>
              <!--abt-col end-->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="abt-col wow fadeInUp"
                data-wow-duration="1000ms"
                data-wow-delay="600ms"
              >
                <img :src="`${asset_url}/icon9.png`" alt="" />
                <h3>Student Support Service</h3>
                <p>
                  Mauris nec mi fequis ugiat, cursus tortor nec, pharetra tellus
                </p>
              </div>
              <!--abt-col end-->
            </div>
          </div>
        </div>
      </div>
      <!--about-rw end-->
      <div class="abt-img">
        <ul class="masonary">
          <li class="width1 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery1.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery1.jpg`" alt=""
            /></a>
          </li>
          <li class="width2 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery2.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery2.jpg`" alt=""
            /></a>
          </li>
          <li class="width3 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery4.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery4.jpg`" alt=""
            /></a>
          </li>
          <li class="width4 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery6.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery6.jpg`" alt=""
            /></a>
          </li>
          <li class="width5 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery8.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery8.jpg`" alt=""
            /></a>
          </li>
          <li class="width6 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery7.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery7.jpg`" alt=""
            /></a>
          </li>
          <li class="width7 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery9.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery9.jpg`" alt=""
            /></a>
          </li>
          <li class="width8 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery10.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery10.jpg`" alt=""
            /></a>
          </li>
          <li class="width9 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery3.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery3.jpg`" alt=""
            /></a>
          </li>
          <li class="width10 wow zoomIn" data-wow-duration="1000ms">
            <a
              :href="`${asset_url}/gallery5.jpg`"
              data-group="set1"
              title=""
              class="html5lightbox"
              ><img :src="`${asset_url}/gallery5.jpg`" alt=""
            /></a>
          </li>
        </ul>
      </div>
      <!-- abt-img end-->
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
