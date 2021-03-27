<template>
  <title-component after="Home"></title-component>

  <div>
    <div class="main-section">
      <header-component />

      <side-nav-component />

      <sidebar-overlay />

      <main-banner-component />

      <h2 class="main-title" v-text="$attrs.settings.app_initials" />
    </div>

    <about-us-component />

    <eligibility-component />

    <requirement-component />

    <faq-tabs :questions="$attrs.faqs" :with-title="true" />

    <!-- <news-letter-component /> -->

    <footer-component />
  </div>
</template>

<script>
export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    quote: String,
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
    };
  },
};
</script>

<style lang="css">
img {
  display: inline-block !important;
}

.custom-list ol {
  /* counter-reset: my-awesome-counter; */
  list-style: none;
  padding-left: 25px;
}

/* @media screen and (min-width: 992px) {
  .custom-list ol {
    list-style: none;
    padding-left: 25px;
  }
} */

.custom-list ol li {
  margin: 0 0 1.1rem 0;
  counter-increment: my-awesome-counter;
  position: relative;
  color: initial;
  text-align: justify;
}

.custom-list ol li::before {
  content: counter(my-awesome-counter);
  background: #3e4095;
  border-radius: 30%;
  margin-top: -0.2rem;
  color: white;
  position: absolute;
  --size: 32px;
  left: calc(-1 * var(--size) - 10px);
  line-height: var(--size);
  width: var(--size);
  height: var(--size);
  top: 0;
  text-align: center;
  display: inline-block;
  box-sizing: border-box;
}
</style>
