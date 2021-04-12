<template>
  <div
    class="md:hidden"
    id="top-nav-mobile"
    :class="{
      block: $parent.showingTabMenuDropdown,
      hidden: !$parent.showingTabMenuDropdown,
    }"
  >
    <div class="mx-2 px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <a
        href="#"
        class="block px-3 py-2 rounded-md text-base font-medium"
        :class="{
          'bg-gray-300 text-gray-800 hover:text-gray-800': isActiveTab(tab),
          'text-gray-300 hover:bg-gray-700 hover:text-white': !isActiveTab(tab),
        }"
        v-for="(tab, index) in tabs"
        :key="index"
        v-text="tab"
        @click.prevent="tabChanged(tab)"
      ></a>
    </div>
  </div>
</template>

<script>
export default {
  inject: ["tabs", "isActiveTab"],

  emits: ["application-tab-changed"],

  methods: {
    tabChanged(tab) {
      this.$parent.showingTabMenuDropdown = false;
      this.$emitter.emit(this.$events.applicationTabChanged, tab);
    },
  },
};
</script>
