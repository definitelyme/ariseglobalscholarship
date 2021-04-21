<template>
  <div class="flex">
    <div class="flex-none">
      <h1
        class="text-gray-700 md:text-gray-500 font-bold text-lg"
        v-if="tag == 'h1'"
      >
        <slot></slot>
      </h1>
      <!--  -->
      <h2
        class="text-gray-700 md:text-gray-500 font-bold text-md"
        v-if="tag == 'h2'"
      >
        <slot></slot>
      </h2>
      <!--  -->
      <h3
        class="text-gray-700 md:text-gray-500 font-bold md:font-semibold text-lg md:text-base"
        v-if="tag == 'h3'"
      >
        <slot></slot>
      </h3>
      <!--  -->
      <h4
        class="text-gray-700 md:text-gray-500 font-bold md:font-semibold text-lg md:text-base"
        v-if="tag == 'h4'"
      >
        <slot></slot>
      </h4>
      <!--  -->
      <h5
        class="text-gray-700 md:text-gray-500 font-bold md:font-semibold text-lg md:text-base"
        v-if="tag == 'h5'"
      >
        <slot></slot>
      </h5>
      <!--  -->
      <h6
        class="text-gray-700 md:text-gray-500 font-bold md:font-semibold text-lg md:text-base"
        v-if="tag == 'h6'"
      >
        <slot></slot>
      </h6>
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
    tag: {
      type: String,
      required: false,
      default: () => "h3",
    },

    showDivider: {
      type: Boolean,
      required: false,
      default: () => true,
    },
  },
};
</script>
