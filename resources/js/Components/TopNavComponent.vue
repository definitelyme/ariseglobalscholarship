<template>
  <nav>
    <ul>
      <li>
        <nav-link-component
          :href="route('/')"
          title=""
          :active="route().current('/')"
          >Home</nav-link-component
        >
      </li>

      <li>
        <a
          href="#"
          title=""
          :active="
            route().current().includes('apply') ||
            route().current().includes('about')
          "
          >Scholarship</a
        >
        <ul>
          <li>
            <nav-link-component :href="route('scholarship./')" title=""
              >Apply</nav-link-component
            >
          </li>
          <li>
            <nav-link-component :href="route('scholarship.about')" title=""
              >About Scholarship</nav-link-component
            >
          </li>
        </ul>
      </li>

      <li>
        <nav-link-component
          :href="route('/')"
          title=""
          :active="route().current().includes('blog')"
          >Blog</nav-link-component
        >
      </li>

      <li>
        <nav-link-component
          :href="route('about')"
          title=""
          :active="route().current().includes('about')"
          >About</nav-link-component
        >
      </li>

      <li>
        <nav-link-component
          :href="route('contact')"
          title=""
          :active="route().current().includes('contact')"
          >Contact Us</nav-link-component
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
