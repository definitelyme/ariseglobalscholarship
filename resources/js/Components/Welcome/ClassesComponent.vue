<template>
  <section class="classes-section">
    <div class="container">
      <div class="sec-title">
        <h2>Our Classes</h2>
        <p>
          Nam mattis felis id sodales rutrum. Nulla ornare tristique mauris, a
          laoreet erat ornare sit amet. Nulla sagittis faucibus lacus
        </p>
      </div>
      <!--sec-title end-->
      <div class="classes-sec">
        <div class="row classes-carousel">
          <div class="col-lg-3 col-12">
            <div class="classes-col wow fadeInUp" data-wow-duration="1000ms">
              <div class="class-thumb">
                <img :src="`${asset_url}/img1.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Basic English Speaking and Grammar</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Amanda Kern</a>
                  </div>
                  <strong class="price">$45</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
          <div class="col-lg-3 col-12">
            <div
              class="classes-col wow fadeInUp"
              data-wow-duration="1000ms"
              data-wow-delay="200ms"
            >
              <div class="class-thumb">
                <img :src="`${asset_url}/img2.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Natural Sciences & Mathematics Courses</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Gypsy Hardinge</a>
                  </div>
                  <strong class="price">$67</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
          <div class="col-lg-3 col-12">
            <div
              class="classes-col wow fadeInUp"
              data-wow-duration="1000ms"
              data-wow-delay="400ms"
            >
              <div class="class-thumb">
                <img :src="`${asset_url}/img3.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Environmental Studies & Earth Sciences</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Margje Jutten</a>
                  </div>
                  <strong class="price">$89</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
          <div class="col-lg-3 col-12">
            <div
              class="classes-col wow fadeInUp"
              data-wow-duration="1000ms"
              data-wow-delay="600ms"
            >
              <div class="class-thumb">
                <img :src="`${asset_url}/img4.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Hospitality, Leisure & Sports Courses</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Hubert Franck</a>
                  </div>
                  <strong class="price">$67</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
          <div class="col-lg-3 col-12">
            <div class="classes-col">
              <div class="class-thumb">
                <img :src="`${asset_url}/img1.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Basic English Speaking and Grammar</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Amanda Kern</a>
                  </div>
                  <strong class="price">$45</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
          <div class="col-lg-3 col-12">
            <div class="classes-col">
              <div class="class-thumb">
                <img :src="`${asset_url}/img2.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Natural Sciences & Mathematics Courses</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Gypsy Hardinge</a>
                  </div>
                  <strong class="price">$67</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
          <div class="col-lg-3 col-12">
            <div class="classes-col">
              <div class="class-thumb">
                <img :src="`${asset_url}/img3.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Environmental Studies & Earth Sciences</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Margje Jutten</a>
                  </div>
                  <strong class="price">$89</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
          <div class="col-lg-3 col-12">
            <div class="classes-col">
              <div class="class-thumb">
                <img :src="`${asset_url}/img4.jpg`" alt="" class="w-100" />
                <a href="contacts.html" title="" class="crt-btn"
                  ><img :src="`${asset_url}/icon10.png`" alt=""
                /></a>
              </div>
              <div class="class-info">
                <h3>
                  <a href="class-single.html" title=""
                    >Hospitality, Leisure & Sports Courses</a
                  >
                </h3>
                <span>Mon-Fri</span> <span>10 AM - 12 AM</span>
                <div class="d-flex flex-wrap align-items-center">
                  <div class="posted-by">
                    <img :src="`${asset_url}/ico.png`" alt="" />
                    <a href="#" title="">Hubert Franck</a>
                  </div>
                  <strong class="price">$67</strong>
                </div>
              </div>
            </div>
            <!--classes-col end-->
          </div>
        </div>
        <custom-button-widget value="Classes" clazz="mt-5" />
      </div>
      <!--classes-sec end-->
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

