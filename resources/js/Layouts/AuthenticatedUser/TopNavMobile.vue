<template>
  <div
    class="md:hidden"
    id="top-nav-mobile"
    :class="{
      block: $parent.showingTabMenuDropdown,
      hidden: !$parent.showingTabMenuDropdown,
    }"
  >
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <a
        href="#"
        class="block px-3 py-2 rounded-md text-base font-medium"
        :class="{
          'bg-gray-900 text-white': isActiveTab(tab),
          'text-gray-300 hover:bg-gray-700 hover:text-white': !isActiveTab(tab),
        }"
        v-for="(tab, index) in tabs"
        :key="index"
        @click.prevent="$emitter.emit('tab-changed', tab)"
        >{{ tab }}</a
      >
    </div>
  </div>
</template>

<script>
export default {
  inject: ["tabs", "isActiveTab", "currentTab", "currentTabComponent"],

  emits: ["tab-changed"],

  data() {
    return {
      //
    };
  },
};
</script>
