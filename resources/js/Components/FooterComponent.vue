<template>
  <footer class="pt-14">
    <div class="container">
      <div class="top-footer">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="widget widget-about">
              <div class="logo">
                <inertia-link :href="route('/')" :title="$app_name"
                  ><application-logo
                /></inertia-link>

                <div class="logo-name">
                  <h3 v-text="$app_name_short"></h3>
                  <span v-text="$parent.quote"></span>
                </div>
              </div>

              <p
                v-html="settings.description_short"
                :style="{
                  'text-align': $detector.isMobile ? 'justify' : 'left',
                }"
              ></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="widget widget-contact">
              <ul class="contact-add">
                <li>
                  <div class="contact-info">
                    <img :src="`${$asset_url}/icon1.png`" alt="" />
                    <div class="contact-tt">
                      <h4>Call</h4>

                      <span
                        ><a
                          :href="`tel:` + settings.phone"
                          v-text="settings.phone_styled"
                        ></a
                      ></span>
                    </div>
                  </div>
                </li>

                <!-- <li>
                  <div class="contact-info">
                    <img :src="`${$asset_url}/icon2.png`" alt="" />
                    <div class="contact-tt">
                      <h4>Work Time</h4>
                      <span>Mon - Fri 8 AM - 5 PM</span>
                    </div>
                  </div>
                </li> -->

                <li>
                  <div class="contact-info">
                    <img :src="`${$asset_url}/icon3.png`" alt="" />

                    <div class="contact-tt">
                      <h4>Address</h4>
                      <span
                        ><a
                          :href="settings.address_url"
                          v-text="settings.address"
                        ></a
                      ></span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="widget widget-links">
              <h3 class="widget-title">Quick Links</h3>
              <ul>
                <li><a :href="route('/')" title="">Home</a></li>

                <li>
                  <a :href="route('scholarship./', program)" title=""
                    >Apply for Scholarship</a
                  >
                </li>

                <li>
                  <a :href="route('about')" title="">About</a>
                </li>

                <li><a :href="route('faq')" title="">Help</a></li>

                <li><a :href="route('contact')" title="">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="bottom-footer">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <p>
              &#169; {{ new Date().getFullYear() }}
              {{ $app_name_short }}
            </p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <ul class="social-links">
              <social-link
                url="#"
                klazz="fa-facebook-f"
                link-title="Facebook"
              ></social-link>

              <social-link
                url="#"
                klazz="fa-linkedin-in"
                link-title="LinkedIn"
              ></social-link>

              <social-link
                url="#"
                klazz="fab fa-instagram"
                link-title="Instagram"
              ></social-link>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  inject: ["settings", "program"],

  data() {
    return {
      //
    };
  },
};
</script>
