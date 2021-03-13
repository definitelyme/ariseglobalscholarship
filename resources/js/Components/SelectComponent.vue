<template>
  <button
    @click.prevent="isDropdownVisible = !isDropdownVisible"
    type="button"
    aria-haspopup="listbox"
    aria-expanded="true"
    aria-labelledby="listbox-label"
    class="relative w-full bg-white border border-gray-300 rounded-lg shadow-sm pl-3 pr-10 py-2"
    :class="`text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm`"
  >
    <span class="flex items-center">
      <span class="block truncate" v-text="selected.value"> </span>
    </span>

    <span
      class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"
    >
      <svg
        class="h-5 w-5 text-gray-400"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="currentColor"
        aria-hidden="true"
      >
        <path
          fill-rule="evenodd"
          d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
          clip-rule="evenodd"
        />
      </svg>
    </span>
  </button>

  <!--  -->

  <div
    class="absolute mt-1 w-full rounded-md bg-white shadow-lg"
    :class="{ hidden: !isDropdownVisible }"
  >
    <ul
      tabindex="-1"
      role="listbox"
      aria-labelledby="listbox-label"
      aria-activedescendant="listbox-item-3"
      class="max-h-56 rounded-md py-1 text-base ring-1 ring-black"
      :class="`ring-opacity-5 overflow-auto focus:outline-none sm:text-sm`"
    >
      <li
        v-for="(option, i) in items"
        :key="i"
        id="listbox-item-0"
        role="option"
        class="text-gray-900 relative py-2 pl-3 pr-9"
        :class="{
          'cursor-default': option.isSelected,
          'cursor-pointer': !option.isSelected,
        }"
      >
        <div class="flex items-center">
          <span
            class="block truncate"
            v-text="option.value"
            :class="{
              'font-semibold': option.isSelected,
              'font-normal': !option.isSelected,
            }"
          >
          </span>
        </div>

        <!--
            Checkmark, only display for selected option.

            Highlighted: "text-white", Not Highlighted: "text-indigo-600"
          -->
        <span
          class="absolute inset-y-0 right-0 flex items-center pr-4"
          :class="{ hidden: !option.isSelected }"
        >
          <svg
            class="h-5 w-5"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </span>
      </li>

      <!-- More items... -->
    </ul>
  </div>
</template>


<script>
export default {
  data() {
    return {
      isDropdownVisible: false,
      items: [],
      selected: {
        value: "-- Select --",
      },
    };
  },

  props: {
    selectFirst: {
      type: Boolean,
      required: false,
      default: () => false,
    },

    value: {
      type: String,
      required: false,
    },

    options: {
      type: Array,
      required: true,
      default: () => [],
    },
  },

  mounted() {
    if (this.options && this.options.length) {
      this.items = this.options.map((i) => ({
        value: i,
        isSelected: this.selectFirst ? this.options[0] == i : false,
      }));
    }

    this.selected = this.selectFirst ? this.items[0] : this.selected;
  },
};
</script>
