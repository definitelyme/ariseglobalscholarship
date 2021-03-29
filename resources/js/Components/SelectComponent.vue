<template>
  <button
    @click.prevent="collapse"
    type="button"
    aria-haspopup="listbox"
    aria-expanded="true"
    aria-labelledby="listbox-label"
    class="relative w-full bg-white border border-gray-300 rounded-lg shadow-sm pl-3 pr-10 py-2"
    :class="`text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm`"
  >
    <span class="flex items-center text-gray-700">
      <span class="block truncate" v-text="selected"> </span>
    </span>

    <span
      class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"
    >
      <svg
        class="h-5 w-5 text-gray-700"
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

  <!-- Dropdown starts here -->

  <div
    class="absolute mt-1 w-full rounded-md bg-white shadow-lg"
    :class="{ hidden: !isDropdownVisible, 'z-40': isDropdownVisible }"
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
        @click="itemSelected(option)"
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

        <span
          class="absolute inset-y-0 right-0 flex items-center pr-4"
          :class="{
            hidden: !option.isSelected,
            'text-indigo-600': option.isSelected,
          }"
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
              clip-rule="evenodd"
              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
            />
          </svg>
        </span>
      </li>
    </ul>
  </div>
</template>


<script>
export default {
  data() {
    return {
      isDropdownVisible: false,
      items: [],
    };
  },

  computed: {
    selected() {
      let initial = { value: "---  Select  ---" };

      return typeof this.items == "undefined" ||
        this.items == null ||
        !this.items.length
        ? initial.value
        : (this.items.find((e) => e.isSelected) || initial).value;
    },
  },

  props: {
    options: {
      type: Array,
      required: true,
      default: () => [],
    },
  },

  methods: {
    itemSelected(item) {
      // Close dropdown
      this.isDropdownVisible = false;

      // Re-map items
      this.items = this.items.map((e) => {
        // Assign each object to temp object
        var temp = Object.assign({}, e);
        // Change value
        temp.isSelected = e.value == item.value;
        // return modified object
        return temp;
      });

      //   // Remove overlay
      //   this.$emitter.emit(this.$events.toggleFullOverlay, {
      //     visible: this.isDropdownVisible,
      //   });
    },

    collapse() {
      this.isDropdownVisible = !this.isDropdownVisible;
      //   if (this.isDropdownVisible)
      //     this.$emitter.emit(this.$events.toggleFullOverlay, {
      //       //   background: "bg-transparent",
      //       zIndex: "z-30",
      //     });
    },
  },

  mounted() {
    if (this.options && this.options.length) {
      this.items = this.options.map((i) => ({
        value: i,
        isSelected: this.selectFirst ? this.options[0] == i : false,
      }));
    }
  },
};
</script>
