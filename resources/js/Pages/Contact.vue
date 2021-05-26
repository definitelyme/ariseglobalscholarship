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
              <h3>Contact Support</h3>
              <form id="contact-form" method="post" @submit.prevent="submit">
                <!-- Validation -->
                <div class="response" ref="response"></div>

                <!-- Status message -->
                <div
                  class="text-white text-justify mb-4 px-4 py-2 rounded-full bg-green-500"
                  v-show="emailSent"
                >
                  <span v-html="message"></span>
                </div>

                <!-- Loader here -->
                <div
                  class="flex-wrap loader text-white mb-4 p-2.5 rounded-full"
                  v-show="loading"
                >
                  <div
                    class="lds-hourglass inline-flex md:ml-3 lg:ml-4 xl:ml-4"
                  ></div>
                  <span
                    class="inline-flex mx-4 md:mx-3 lg:mx-3 xl:mx-3"
                    style="font-size: 18px"
                  >
                    Sending message... .
                  </span>
                </div>

                <!-- Contact Form -->
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input
                        type="text"
                        name="name"
                        class="name"
                        v-model="form.name"
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
                        v-model="form.email"
                        placeholder="Email"
                        required
                      />
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <textarea
                        name="message"
                        v-model="form.message"
                        placeholder="Hello support, I can not..."
                      ></textarea>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-submit">
                      <button type="submit" id="submit" class="btn-default">
                        Send<i class="fa fa-long-arrow-alt-right"></i>
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
                  <div class="d-flex flex-wrap md:flex-nowrap lg:flex-nowrap">
                    <div class="icon-v">
                      <img :src="`${$asset_url}/icon15.png`" alt="" />
                    </div>

                    <div
                      class="dd-cont flex-col text-center md:text-justify lg:text-justify"
                    >
                      <h4>Call</h4>
                      <a
                        :href="`tel:${$attrs.settings.phone}`"
                        class="text-gray-700"
                      >
                        <span v-text="$attrs.settings.phone_styled"></span>
                      </a>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="d-flex flex-wrap md:flex-nowrap lg:flex-nowrap">
                    <div class="icon-v">
                      <img :src="`${$asset_url}/icon17.png`" alt="" />
                    </div>

                    <div
                      class="dd-cont flex-col text-center md:text-justify lg:text-justify"
                    >
                      <h4>Address</h4>
                      <span v-text="$attrs.settings.address"></span>
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

  <!-- <news-letter-component /> -->

  <footer-component />

  <covid-bottom-banner />

  <covid-modal-banner />
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      form: this.$inertia.form({
        name: "",
        email: "",
        message: "",
      }),
    };
  },

  props: {
    status: String,
    message: {
      type: String,
      required: false,
    },
  },

  methods: {
    submit() {
      this.loading = true;
      this.form.post(this.route("contact.store"), {
        onFinish: () => {
          this.loading = false;
          this.form.reset("name", "email", "message");
          $(".response").empty();
        },
      });
    },
  },

  computed: {
    emailSent() {
      return this.status === "contact-email-sent";
    },
  },

  //   watch: {
  //     "$ref.response"() {
  //       console.log("Hello ref");
  //     },
  //   },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      breadcrumbs: this.$attrs.breadcrumbs,
      program: this.$attrs.program,
    };
  },
};
</script>

<style>
.loader {
  background-color: #ff9966;
}

.lds-hourglass {
  display: inline-block;
  position: relative;
}
.lds-hourglass:after {
  content: " ";
  display: block;
  border-radius: 50%;
  width: 0;
  height: 0;
  box-sizing: border-box;
  border: 9px solid #fff;
  border-color: #fff transparent #fff transparent;
  animation: lds-hourglass 1.2s infinite;
}
@keyframes lds-hourglass {
  0% {
    transform: rotate(0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }
  50% {
    transform: rotate(900deg);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  100% {
    transform: rotate(1800deg);
  }
}
</style>
