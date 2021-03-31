<template>
  <div class="flex">
    <div class="flex-none">
      <h3
        class="text-gray-700 md:text-gray-500 font-bold md:font-semibold text-lg md:text-base"
      >
        <slot></slot>
      </h3>
    </div>

    <div class="w-4 md:w-5"></div>

    <div class="flex-grow space-y-0.5 self-center" v-show="showDivider">
      <hr />
      <hr />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    showDivider: {
      type: Boolean,
      required: false,
      default: () => true,
    },
  },
};
</script>
