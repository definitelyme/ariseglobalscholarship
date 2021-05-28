<template>
  <section class="main-banner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-7">
          <div
            class="banner-text wow fadeInLeft flex flex-col space-y-3"
            data-wow-duration="1000ms"
          >
            <h2>{{ $app_name_short }} <span>Scholarship</span></h2>
            <p v-text="settings.description"></p>
            <a :href="route('scholarship.apply')" class="cursor-pointer"
              ><breeze-button
                class="px-4 py-3 rounded-full bg-main-600 hover:bg-main-400 hover:shadow-lg hover:text-white cursor-pointer"
                type="button"
              >
                Get Started
                <i
                  class="fa fa-long-arrow-alt-right"
                  style="padding-left: 10px"
                ></i>
              </breeze-button>
            </a>
            <!--  -->
            <span>
              <payment-button
                v-if="user != null && !isAdmin"
                amount="2000"
                :public-key="$flutter_wave_publicKey"
                :is-production="true"
                :callback="callback"
                :close="close"
                :scholarship="user.last_active_scholarship"
                >Obtain Exam pin</payment-button
              >
            </span>
          </div>
        </div>
        <!--  -->
        <div class="col-lg-5 col-md-5">
          <div class="banner-img wow zoomIn" data-wow-duration="1000ms">
            <!-- <img :src="`${$asset_url}/banner-img.png`" alt="" /> -->
          </div>
          <!--banner-img end-->
          <div class="elements-bg wow zoomIn" data-wow-duration="1000ms"></div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import BreezeButton from "@/Components/Button";

export default {
  inject: ["user", "settings", "isAdmin"],

  components: {
    BreezeButton,
  },

  data() {
    return {
      //
    };
  },

  methods: {
    callback(response) {
      this.$inertia.post(
        this.route("payment.successful.store"),
        this.$inertia.form({
          ...response,
        }),
        {
          onSuccess: () => {
            if (this.$page.props.flash.success) {
              this.closePaymentModal();
              this.$inertia.get(this.route("payment.generate.pin"));
              return;
            }
          },
        }
      );
    },

    closePaymentModal() {
      document
        .getElementsByName("checkout")[0]
        .setAttribute(
          "style",
          "position:fixed;top:0;left:0;z-index:-1;border:none;opacity:0;pointer-events:none;width:100%;height:100%;"
        );
      document.body.style.overflow = "";
    },

    close() {
      //   console.log("Payment modal closed in MainBannerComponent");
    },
  },
};
</script>
