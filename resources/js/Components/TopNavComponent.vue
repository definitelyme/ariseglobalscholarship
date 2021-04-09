<template>
  <nav>
    <ul>
      <li>
        <a :href="route('/')" title="" :class="{ active: route().current('/') }"
          >Home</a
        >
      </li>

      <li>
        <a
          href="#"
          title=""
          :class="{
            active:
              route().current().includes('apply') ||
              route().current().includes('scholarship'),
          }"
          >Scholarship</a
        >
        <ul>
          <li>
            <a :href="route('scholarship.apply')" title="">Apply</a>
          </li>
          <li>
            <a :href="route('scholarship.about')" title="">Eligibility</a>
          </li>
          <li>
            <a :href="route('scholarship.about')" title="">Requirements</a>
          </li>
        </ul>
      </li>

      <!-- <li>
        <a
          :href="route('/')"
          title=""
          :class="{ active: route().current().includes('blog') }"
          >Blog</a
        >
      </li> -->

      <li>
        <a
          :href="route('faq')"
          title=""
          :class="{ active: route().current().includes('faq') }"
          >FAQ</a
        >
      </li>

      <li>
        <a
          :href="route('about')"
          title=""
          :class="{ active: route().current().includes('about') }"
          >About</a
        >
      </li>

      <li>
        <a
          :href="route('contact')"
          title=""
          :class="{ active: route().current().includes('contact') }"
          >Contact Us</a
        >
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      //
    };
  },
};
</script>
