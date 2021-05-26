<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{
          $attrs.scholarships
            ? "My Applications"
            : `${$app_name} ${$attrs.scholarship.run.version_id}`
        }}
      </h2>
    </template>

    <div class="px-2 py-8 md:px-3">
      <scholarship-listing v-if="$attrs.scholarships"></scholarship-listing>
      <scholarship-page v-else></scholarship-page>
    </div>

    <div class="max-w-7xl py-3 pl-4 md:px-6 lg:px-8" v-show="$attrs.unapplied">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Active Scholarships
      </h2>
    </div>

    <div class="px-2 py-2 md:px-3" v-if="$attrs.unapplied">
      <active-program-component />
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  provide() {
    return {
      user: this.$attrs.auth.user,
      program: this.$attrs.program,
      unapplied: this.$attrs.unapplied,
      scholarships: this.$attrs.scholarships,
      scholarship: this.$attrs.scholarship,
    };
  },

  components: {
    BreezeAuthenticatedLayout,
  },
};
</script>
