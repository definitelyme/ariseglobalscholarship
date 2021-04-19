<template>
  <button
    :type="type"
    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
    :class="{ 'opacity-25': processing }"
    :disabled="processing"
  >
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    processing: {
      type: Boolean,
      required: false,
      default: () => false,
    },

    type: {
      type: String,
      default: "submit",
    },
  },

  //   computed: {
  //     backgroundColor() {
  //       return typeof this.$attrs.class != "undefined" &&
  //         this.$attrs.class.includes(" bg-")
  //         ? ""
  //         : "";
  //     },
  //   },
};
</script>
