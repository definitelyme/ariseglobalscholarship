<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        My Applications
      </h2>
    </template>

    <div class="px-2 py-8 md:px-3">
      <scholarship-listing></scholarship-listing>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  provide() {
    return {
      user: this.$attrs.auth.user,
      scholarship: this.$attrs.scholarship,
    };
  },

  components: {
    BreezeAuthenticatedLayout,
  },
};
</script>
