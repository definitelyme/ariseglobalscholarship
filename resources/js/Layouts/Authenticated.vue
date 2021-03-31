<template>
  <title-component after="Dashboard"></title-component>

  <overlay />

  <div class="min-h-screen min-w-full bg-gray-100">
    <nav class="bg-gray-800">
      <authenticated-desktop-view></authenticated-desktop-view>
      <authenticated-mobile-view></authenticated-mobile-view>
      <top-nav-mobile></top-nav-mobile>
    </nav>

    <!-- Page Heading -->
    <header
      class="bg-white shadow-inner"
      v-if="$slots.header"
      @click="
        (showingNavigationDropdown = false), (showingTabMenuDropdown = false)
      "
    >
      <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <main
      @click="
        (showingNavigationDropdown = false), (showingTabMenuDropdown = false)
      "
    >
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
      showingTabMenuDropdown: false,
      //   form: null,
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
    this.$emitter.on(this.$events.toggleDashboardMenu, (state) => {
      this.showingNavigationDropdown = state || !this.showingNavigationDropdown;
      // Hide Tab Menu
      this.showingTabMenuDropdown = false;
    });

    this.$emitter.on(this.$events.toggleDashboardTabMenu, (state) => {
      this.showingTabMenuDropdown = state || !this.showingTabMenuDropdown;
      // Hide Main Menu
      this.showingNavigationDropdown = false;
    });
  },

  created() {
    //
  },
};
</script>
