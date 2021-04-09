<template>
  <input
    class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
    type="text"
    name="kinName"
    id="kinName"
    v-model="model"
    autocomplete="name"
    required
  />
</template>

<script>
export default {
  computed: {
    proxyChecked: {
      get() {
        return this.checked;
      },

      set(val) {
        this.$emit("update:checked", val);
      },
    },
  },
};
</script>
