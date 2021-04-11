<template>
  <div
    class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-10"
    :class="{ hidden: shouldHide, 'bottom-11': position }"
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
        class="text-gray-900 relative py-2 pl-2 pr-5 cursor-pointer"
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
          class="absolute inset-y-0 right-0 flex items-center pr-1"
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
  props: ["shouldHide", "items", "position"],

  methods: {
    itemSelected(item) {
      // Close dropdown
      this.$parent.isDropdownVisible = false;

      // Re-map items
      this.$parent.items = this.$parent.items.map((e) => {
        // Assign each object to temp object
        var temp = Object.assign({}, e);
        // Change value
        temp.isSelected = e.value == item.value;
        // return modified object
        return temp;
      });
    },
  },
};
</script>
