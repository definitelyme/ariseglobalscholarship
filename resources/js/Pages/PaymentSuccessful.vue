<template>
  <title-component
    after="Payment Successful
"
  ></title-component>

  <teleport to="body">
    <modal-overlay modal-id="payment-successful" :dismissible="false">
      <modal class="h-200 w-96" modal-id="payment-successful" header-padding>
        <template #modal_header class="bg-main-100">
          <div class="bg-green-400">
            <div class="flex flex-row justify-around items-stretch max-h-32">
              <i></i>
              <div class="grid grid-rows-3 grid-flow-col">
                <span class="col-span-2"></span>
                <!--  -->
                <span class="col-span-2 place-self-center"
                  ><i class="cil-check-circle text-8xl text-white"></i
                ></span>
                <!--  -->
                <span class="col-span-2"></span>
              </div>
              <i></i>
            </div>
          </div>
          <!--  -->
        </template>
        <template #modal_body>
          <div class="flex flex-row justify-center">
            <div class="flex flex-column">
              <strong class="font-semibold text-2xl self-center">Great!</strong>
              <span class="text-lg self-center mb-7"
                >Payment was successful</span
              >
              <span class="self-center"
                >Transaction Reference:
                <span v-text="receipt.transaction_reference"></span
              ></span>
              <span class="self-center mb-6"
                >Exam Access Pin:
                <strong
                  ref="pin"
                  v-text="receipt.pin"
                  class="hover:underline hover:text-indigo-500 cursor-pointer"
                ></strong
              ></span>
              <span
                class="text-xs self-center text-center italic text-accent-500"
                ><strong>Note:</strong> Please copy down this Pin somewhere
                safe, if you lose it, you'll have to contact us.</span
              >
            </div>
          </div>
        </template>
        <template #modal_cancel><span v-show="false"></span></template
      ></modal> </modal-overlay
  ></teleport>
</template>

<script>
export default {
  props: {
    receipt: Object,
  },

  data() {
    return {
      canCopy: false,
    };
  },

  methods: {
    async copy() {
      let pinText = this.$refs.pin;
    },
  },

  mounted() {
    this.$emitter.emit(this.$events.openModal, "payment-successful");
    // console.log(this.receipt);
  },

  created() {
    this.canCopy = !!navigator.clipboard;
  },
};
</script>
