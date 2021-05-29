<template>
  <breeze-button
    class="px-4 py-3 rounded-full text-accent-600 bg-gray-100 shadow-none border-accent-500 hover:bg-accent-400 focus:border-accent-500 hover:border-accent-500 hover:text-white hover:shadow-lg cursor-pointer"
    type="button"
    @click="makePayment"
  >
    <slot> Click Me! </slot>
    <i class="fa fa-long-arrow-alt-right" style="padding-left: 10px"></i>
  </breeze-button>
</template>

<script>
import BreezeButton from "@/Components/Button";

const COUNTRY_CODE = "+234";

export default {
  inject: ["user"],

  components: {
    BreezeButton,
  },

  props: {
    scholarship: {
      type: Object,
      required: true,
    },
    isProduction: {
      type: Boolean,
      required: false,
      default: false, //set to true if you are going live
    },
    publicKey: {
      type: String,
      required: true,
    },
    name: {
      type: String,
      required: false,
    },
    email: {
      type: String,
      required: false,
    },
    amount: {
      type: [String, Number],
      required: true,
    },
    callback: {
      type: Function,
      required: true,
      default: (response) => {
        console.log("Payment made, verify payment");
        console.log(response);
      },
    },
    close: {
      type: Function,
      required: true,
      default: () => {
        console.log("payment is closed");
      },
    },
    redirectUrl: {
      type: String,
      required: false,
    },
    currency: {
      type: String,
      default: "NGN",
    },
    country: {
      type: String,
      default: "NG",
    },
    custom_title: {
      type: String,
      default: "Arise Global Scholarship",
    },
    custom_description: {
      type: String,
      default: "To generate your Exam Access Pin for Arise Global Scholarship.",
    },
    custom_logo: {
      type: String,
      default: "https://cdn.filestackcontent.com/uShP0nxlTjW30xwKZiQv",
    },
    reference: {
      type: String,
      default: null,
    },
    payment_method: {
      type: String,
      default: "card,mobilemoney,ussd",
    },
  },

  data() {
    return {
      payment: {
        tx_ref: this.reference ?? this.generateReference(),
        public_key: this.publicKey,
        amount: this.amount,
        currency: this.currency,
        payment_options: this.payment_method,
        // redirect_url: this.redirectUrl ?? this.route("payment.generate.pin"),
        customer: {
          name: this.name ?? this.user?.name,
          email: this.email ?? this.user?.email,
          phone_number: this.$formatPhoneNumber(
            this.scholarship?.phone,
            COUNTRY_CODE,
            "0"
          ),
        },
        customizations: {
          title: this.custom_title,
          description: this.custom_description,
          logo: this.custom_logo,
        },
        callback: (response) => this.callback(response),
        onclose: this.close,
      },
    };
  },

  methods: {
    async makePayment() {
      await window.FlutterwaveCheckout(this.payment);
    },

    generateReference() {
      let text = "";
      let possible =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      for (let i = 0; i < 10; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
      return text;
    },
  },

  created() {
    const script = document.createElement("script");
    script.src = !this.isProduction
      ? "https://ravemodal-dev.herokuapp.com/v3.js"
      : "https://checkout.flutterwave.com/v3.js";
    document.getElementsByTagName("head")[0].appendChild(script);
  },
};
</script>
