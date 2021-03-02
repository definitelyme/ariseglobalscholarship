<template>
  <footer>
    <div class="container">
      <div class="top-footer">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="widget widget-about">
              <div class="logo">
                <inertia-link :href="route('/')" :title="app_name"
                  ><img
                    :src="`${asset_url}/favicon.png`"
                    :alt="app_name"
                    height="60"
                    width="60"
                /></inertia-link>
                <div class="logo-name">
                  <h3 v-text="app_name_short"></h3>
                  <span v-text="$parent.quote"></span>
                </div>
              </div>
              <p>
                Vivamus porta efficitur nibh nec convallis. Vestibulum egestas
                eleifend justo. Ut tellus ipsum, accumsan
              </p>
            </div>
            <!--widget-about end-->
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="widget widget-contact">
              <ul class="contact-add">
                <li>
                  <div class="contact-info">
                    <img :src="`${asset_url}/icon1.png`" alt="" />
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
                  <!--contact-info end-->
                </li>
                <li>
                  <div class="contact-info">
                    <img :src="`${asset_url}/icon2.png`" alt="" />
                    <div class="contact-tt">
                      <h4>Work Time</h4>
                      <span>Mon - Fri 8 AM - 5 PM</span>
                    </div>
                  </div>
                  <!--contact-info end-->
                </li>
                <li>
                  <div class="contact-info">
                    <img :src="`${asset_url}/icon3.png`" alt="" />
                    <div class="contact-tt">
                      <h4>Address</h4>
                      <span
                        ><a
                          :href="settings.address"
                          v-text="settings.address"
                        ></a
                      ></span>
                    </div>
                  </div>
                  <!--contact-info end-->
                </li>
              </ul>
            </div>
            <!--widget-contact end-->
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="widget widget-links">
              <h3 class="widget-title">Quick Links</h3>
              <ul>
                <li><a href="about.html" title="">About Us</a></li>
                <li><a href="classes.html" title="">Our Classes</a></li>
                <li>
                  <a href="teachers.html" title="">School Teachers</a>
                </li>
                <li><a href="events.html" title="">Recent Events</a></li>
                <li><a href="blog.html" title="">Our News</a></li>
                <li><a href="schedule.html" title="">Schedule</a></li>
              </ul>
            </div>
            <!--widget-links end-->
          </div>
        </div>
      </div>
      <!--top-footer end-->
      <div class="bottom-footer">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <p>
              &#169; {{ new Date().getFullYear() }}
              {{ app_name_short }}
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
      <!--bottom-footer end-->
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      settings: {},
    };
  },
  created() {
    this.settings = JSON.parse(this.$parent.settings);
  },
};
</script>
