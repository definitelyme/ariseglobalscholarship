<template>
  <div class="responsive-menu">
    <ul>
      <li>
        <a :href="route('/')" title="" :active="route().current('/')">Home</a>
      </li>

      <li>
        <nav-link-component
          :href="route('scholarship./')"
          :active="route().current().includes('apply')"
          title=""
          >Apply</nav-link-component
        >
      </li>

      <li>
        <nav-link-component
          :href="route('scholarship.about')"
          :active="route().current().includes('scholarship/about')"
          title=""
          >About Scholarship</nav-link-component
        >
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
          :active="route().current().includes('about')"
          title=""
          >About Arise Global</nav-link-component
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

      <li>
        <nav-link-component :href="route('logout')" method="post"
          >Logout
        </nav-link-component>
      </li>
    </ul>
  </div>
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
