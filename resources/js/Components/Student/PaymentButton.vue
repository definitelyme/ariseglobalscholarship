<template>
  <button @click="asyncPay">Pay Using Async method</button>
</template>

<script>
const COUNTRY_CODE = "234";
export default {
  inject: ["user"],

  props: ["scholarship"],

  data() {
    return {
      paymentData: {
        tx_ref: this.generateReference(),
        amount: 2000,
        currency: "NGN",
        payment_options: "card,ussd",
        redirect_url: "",
        customer: {
          name: this.user?.name,
          email: this.user?.email,
          phone_number: this.$formatPhoneNumber(
            this.scholarship?.phone,
            COUNTRY_CODE
          ),
        },
        customizations: {
          title: "Arise Global Scholarship",
          description:
            "To generate your Exam Access Pin for Arise Global Scholarship.",
          logo: "https://cdn.filestackcontent.com/uShP0nxlTjW30xwKZiQv",
        },
        callback: this.paymentCompleted,
        onclose: this.closedPaymentModal,
      },
    };
  },

  methods: {
    async asyncPay() {
      var response = await this.asyncPayWithFlutterwave(this.paymentData);
      console.log(response);
    },

    closedPaymentModal() {
      console.log("payment is closed");
    },

    paymentCompleted() {
      console.log("Payment was successful!");
    },

    generateReference() {
      let date = new Date();
      return date.getTime().toString();
    },
  },

  mounted() {
    // console.log(this.user?.email);
  },
};
</script>
