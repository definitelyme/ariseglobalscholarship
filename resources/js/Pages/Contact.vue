<template>
  <title-component after="Contact Us"></title-component>

  <header-component />

  <side-nav-component />
  <sidebar-overlay />

  <hero-component page-title="Contact Us" />

  <section class="page-content">
    <div class="container">
      <div class="mdp-contact">
        <div class="row">
          <div class="col-lg-8 col-md-7">
            <div class="comment-area">
              <h3>Send Feedback</h3>
              <form id="contact-form" method="post" action="#">
                <div class="response"></div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input
                        type="text"
                        name="name"
                        class="name"
                        placeholder="Name"
                        required
                      />
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <input
                        type="email"
                        name="email"
                        class="email"
                        placeholder="Email"
                        required
                      />
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <textarea name="message" placeholder="Message"></textarea>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-submit">
                      <button type="button" id="submit" class="btn-default">
                        Send Now <i class="fa fa-long-arrow-alt-right"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-4 col-md-5">
            <div class="mdp-our-contacts">
              <h3>Our Contacts</h3>

              <ul>
                <li>
                  <div class="d-flex flex-wrap">
                    <div class="icon-v">
                      <img :src="`${$asset_url}/icon15.png`" alt="" />
                    </div>

                    <div class="dd-cont">
                      <h4>Call</h4>
                      <span>+2 342 5446 67</span>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="d-flex flex-wrap">
                    <div class="icon-v">
                      <img :src="`${$asset_url}/icon17.png`" alt="" />
                    </div>

                    <div class="dd-cont">
                      <h4>Address</h4>
                      <span>Franklin St, Greenpoint Ave</span>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <news-letter-component />

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
