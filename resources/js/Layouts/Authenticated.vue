<template>
  <title-component after="Dashboard"></title-component>

  <overlay />

  <div class="min-h-screen bg-gray-100">
    <nav class="bg-gray-800">
      <authenticated-desktop-view></authenticated-desktop-view>
      <authenticated-mobile-view></authenticated-mobile-view>
    </nav>

    <!-- Page Heading -->
    <header
      class="bg-white shadow-inner"
      v-if="$slots.header"
      @click="showingNavigationDropdown = false"
    >
      <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <main @click="showingNavigationDropdown = false">
      <slot />
    </main>
  </div>
</template>

<script>
export default {
  data() {
    return {
      authForm: this.$inertia.form({}),
      showingNavigationDropdown: false,
    };
  },

  methods: {
    submit() {
      this.authForm.post(this.route("logout"), {
        onFinish: () => location.assign("/"),
      });
    },
  },

  mounted() {
    this.emitter.on("toggle-dashboard-menu", (state) => {
      this.showingNavigationDropdown = state || !this.showingNavigationDropdown;
    });
  },
};
</script>
