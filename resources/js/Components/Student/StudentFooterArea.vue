<template>
  <div class="grid grid-cols-12 gap-3">
    <div class="col-span-4 justify-self-start">
      <slot name="first">
        <!-- <button
          class="p-0 w-16 h-16 md:w-12 md:h-12 bg-main-500 rounded-full hover:bg-main-600 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none"
        >
          <svg
            viewBox="0 0 30 30"
            enable-background="new 0 0 20 20"
            class="w-7 h-7 inline-block rotate-180"
            transform="rotate(45,100,100)"
          >
            <g transform="rotate(180)">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                fill="#FFFFFF"
                d="M5.975 17.504l14.287.001-6.367 6.366L16.021 26l10.004-10.003L16.029 6l-2.128 2.129 6.367 6.366H5.977z"
              />
            </g>
          </svg>
        </button> -->
      </slot>
    </div>

    <div class="col-span-4 justify-self-center self-center">
      <slot name="second"></slot>
    </div>

    <div class="col-span-4 justify-self-end" @click.prevent="performAction">
      <button
        class="p-0 w-16 h-16 md:w-12 md:h-12 bg-main-500 rounded-full hover:bg-main-600 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none"
      >
        <svg
          viewBox="0 0 30 30"
          enable-background="new 0 0 20 20"
          class="w-7 h-7 inline-block"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            fill="#FFFFFF"
            d="M5.975 17.504l14.287.001-6.367 6.366L16.021 26l10.004-10.003L16.029 6l-2.128 2.129 6.367 6.366H5.977z"
          />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  emits: ["tab-changed"],

  props: {
    onClick: {
      type: Function,
      required: false,
    },
  },

  methods: {
    performAction() {
      if (typeof this.onClick == "undefined" || this.onClick == null) {
        this.$emitter.emit(this.$events.switchNextTab);
        return;
      }

      this.onClick();
    },
  },
};
</script>
