<template>
  <section class="course-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="find-course">
            <div class="sec-title">
              <h2>Find Your Course</h2>
              <p>
                ullam fringilla ipsum sed enim scelerisque, ac porttitor libero
                egestas. Donec iaculis nisi eget bibendum efficitur. Lorem ipsum
                dolor sit
              </p>
              <h3>
                <img :src="`${asset_url}/icon11.png`" alt="" />Call:
                <strong>+2 342 5446 67</strong>
              </h3>
            </div>
            <!--sec-title end-->
            <div class="course-img">
              <img :src="`${asset_url}/course-img.png`" alt="" />
            </div>
            <!--course-img end-->
          </div>
          <!--find-course end-->
        </div>
        <div class="col-lg-6">
          <div class="courses-list">
            <div class="course-card wow fadeInLeft" data-wow-duration="1000ms">
              <div class="d-flex flex-wrap align-items-center">
                <ul class="course-meta">
                  <li>
                    <img :src="`${asset_url}/icon12.png`" alt="" /> 29/07/2020
                  </li>
                  <li>11AM to 15PM</li>
                </ul>
                <span>FREE</span>
              </div>
              <h3>
                <a href="event-single.html" title=""
                  >Digital Transformation Conference</a
                >
              </h3>
              <div class="d-flex flex-wrap">
                <div class="posted-by">
                  <img :src="`${asset_url}/ico2.png`" alt="" />
                  <a href="#" title="">Amanda Kern</a>
                </div>
                <span class="locat"
                  ><img :src="`${asset_url}/loct.png`" alt="" />43 castle road
                  517 district</span
                >
              </div>
            </div>
            <!--course-card end-->
            <div
              class="course-card wow fadeInLeft"
              data-wow-duration="1000ms"
              data-wow-delay="400ms"
            >
              <div class="d-flex flex-wrap align-items-center">
                <ul class="course-meta">
                  <li>
                    <img :src="`${asset_url}/icon12.png`" alt="" /> 29/07/2020
                  </li>
                  <li>11AM to 15PM</li>
                </ul>
                <span>$16</span>
              </div>
              <h3>
                <a href="event-single.html" title="">Environment conference</a>
              </h3>
              <div class="d-flex flex-wrap">
                <div class="posted-by">
                  <img :src="`${asset_url}/ico2.png`" alt="" />
                  <a href="#" title="">Cvita Doleschall</a>
                </div>
                <span class="locat"
                  ><img :src="`${asset_url}/loct.png`" alt="" />43 castle road
                  517 district</span
                >
              </div>
            </div>
            <!--course-card end-->
            <div
              class="course-card wow fadeInLeft"
              data-wow-duration="1000ms"
              data-wow-delay="600ms"
            >
              <div class="d-flex flex-wrap align-items-center">
                <ul class="course-meta">
                  <li>
                    <img :src="`${asset_url}/icon12.png`" alt="" /> 29/07/2020
                  </li>
                  <li>11AM to 15PM</li>
                </ul>
                <span>$8</span>
              </div>
              <h3>
                <a href="event-single.html" title="">Campus clean workshop</a>
              </h3>
              <div class="d-flex flex-wrap">
                <div class="posted-by">
                  <img :src="`${asset_url}/ico2.png`" alt="" />
                  <a href="#" title="">Helena Brauer</a>
                </div>
                <span class="locat"
                  ><img :src="`${asset_url}/loct.png`" alt="" />43 castle road
                  517 district</span
                >
              </div>
            </div>
            <!--course-card end-->
          </div>
          <!--courses-list end-->
          <a href="events.html" title="" class="all-btn"
            >All Events <i class="fa fa-long-arrow-alt-right"></i
          ></a>
          <div class="clearfix"></div>
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
