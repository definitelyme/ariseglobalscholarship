<template>
  <title-component after="Scholarship - Application"></title-component>

  <header-component />

  <side-nav-component />
  <sidebar-overlay />

  <div class="main-section">
    <background-component />

    <div
      class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
    >
      <div
        class="w-full sm:max-w-md md:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-auto sm:rounded-lg"
      >
        Application form goes here...in a bit
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //
    };
  },

  computed: {
    //
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      breadcrumbs: this.$attrs.breadcrumbs,
    };
  },
};
</script>
