<template>
  <div class="grid grid-cols-12 gap-3">
    <div class="col-span-4 justify-self-start" @click.prevent="goToPreviousTab">
      <slot name="first">
        <button
          class="p-0 w-16 h-16 md:w-12 md:h-12 bg-main-500 rounded-full hover:bg-main-600 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none"
          v-show="!isFirstTab"
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
              d="M26.025 14.496l-14.286-.001 6.366-6.366L15.979 6 5.975 16.003 15.971 26l2.129-2.129-6.367-6.366h14.29z"
            />
          </svg>
        </button>
      </slot>
    </div>

    <div class="col-span-4 justify-self-center self-center">
      <slot
        name="second"
        v-bind:processing="
          typeof $parent.form == 'undefined' ? null : $parent.form.processing
        "
      >
        <breeze-button type="submit" :processing="processing">
          Update
        </breeze-button>
      </slot>
    </div>

    <div class="col-span-4 justify-self-end" @click.prevent="performAction">
      <button
        class="p-0 w-16 h-16 md:w-12 md:h-12 bg-main-500 rounded-full hover:bg-main-600 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none"
        v-show="!isLastTab"
        :class="{ 'opacity-25': disabled }"
        :disabled="disabled"
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
import BreezeButton from "@/Components/Button";

export default {
  data() {
    return {
      processing: false,
      canNavigate: true,
    };
  },

  emits: ["tab-changed"],

  props: {
    isFirstTab: Boolean,

    isLastTab: Boolean,

    onClick: {
      type: Function,
      required: false,
    },
  },

  computed: {
    disabled() {
      return this.canNavigate == false || this.processing == true;
    },
  },

  components: {
    BreezeButton,
  },

  watch: {
    "$parent.errors"() {
      // Watch Parent errors property
      this.canNavigate = this.$isEmptyObject(this.$parent.errors);
    },
  },

  methods: {
    goToPreviousTab() {
      this.$emitter.emit(this.$events.switchPrevTab);
    },

    performAction() {
      if (typeof this.onClick == "undefined" || this.onClick == null) {
        if (this.canNavigate) this.$emitter.emit(this.$events.switchNextTab);
        return;
      }

      this.onClick();
    },
  },

  mounted() {
    // Listen to $events.hasErrorsCanNavigate events
    // Update this.canNavigate property
    // this.$on(this.$events.hasErrorsCanNavigate, (value) => {
    //   console.log("Can navigate " + value);
    //   this.canNavigate = value;
    // });
  },
};
</script>
