<template>
  <div class="grid grid-cols-12 gap-3" :class="[height]">
    <div class="md:hidden col-span-4" />

    <div
      class="col-span-4 self-center md:col-start-10 md:col-span-3 lg:col-start-12 lg:col-span-2 xl:col-start-12 xl:col-span-2"
    >
      <button
        type="button"
        class="inline-flex px-2.5 py-2 w-full bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase content-center place-content-center"
        :class="`tracking-widest bg-main-600 hover:bg-main-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-500 active:bg-main-700 transition ease-in-out duration-150`"
        @click.prevent="performAction"
      >
        Next
        <svg
          viewBox="0 0 20 30"
          class="h-4 w-7 pl-1 icon icon-arrow-right"
          aria-hidden="true"
          fill="currentColor"
        >
          <path
            d="M5.975 17.504l14.287.001-6.367 6.366L16.021 26l10.004-10.003L16.029 6l-2.128 2.129 6.367 6.366H5.977z"
          />
        </svg>
      </button>
    </div>

    <div class="md:hidden col-span-4" />
  </div>
</template>

<script>
export default {
  inject: ["tabs", "isActiveTab", "currentTab", "currentTabComponent"],

  emits: ["tab-changed"],

  props: {
    height: {
      type: String,
      required: false,
      default: "h-20",
    },
    onClick: {
      type: Function,
      required: false,
    },
  },

  methods: {
    performAction() {
      if (typeof this.onClick == "undefined" || this.onClick == null) {
        let index = this.tabs.findIndex((v) => v === this.current);
        let next = (this.current = this.tabs[index + 1]);
        this.$emitter.emit(this.$events.applicationTabChanged, next);
        return;
      }

      this.onClick();
    },
  },
};
</script>
