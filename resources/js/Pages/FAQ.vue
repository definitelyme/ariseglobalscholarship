<template>
  <title-component after="FAQ"></title-component>

  <header-component />

  <side-nav-component />
  <sidebar-overlay />

  <hero-component page-title="FAQ" :uppercase="true" />

  <div class="mt-8 opacity-75">
    <faq-logo />
  </div>

  <faq-tabs :questions="$attrs.faqs" />

  <!-- <news-letter-component /> -->

  <footer-component />

  <covid-bottom-banner />

  <covid-modal-banner />
</template>

<script>
export default {
  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      breadcrumbs: this.$attrs.breadcrumbs,
      program: this.$attrs.program,
    };
  },
};
</script>
