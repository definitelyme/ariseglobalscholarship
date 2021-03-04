<template>
  <div>
    <button
      type="button"
      class="focus:outline-none text-accent text-lg py-2.5 px-2.5 rounded-full flex items-center border border-main hover:bg-main hover:shadow-lg hover:border-transparent hover:text-white"
      style="border: 1px solid !important"
    >
      <i
        :class="`w-6 h-6 ${
          icon.length ? (icon.includes('fa-') ? `fa ${icon}` : icon) : ''
        }`"
      ></i>
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //
    };
  },
  props: {
    icon: {
      type: String,
      required: false,
      default: () => "fa-smile",
    },
  },
};
</script>
