<template>
  <div class="responsive-menu">
    <ul class="side-nav-links">
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

      <ul>
        <li v-if="!user">
          <nav-link-component
            :href="route('login')"
            replace
            preserve-scroll
            preserve-state
            >Login
          </nav-link-component>
        </li>

        <li v-if="!user">
          <nav-link-component
            :href="route('register')"
            replace
            preserve-scroll
            preserve-state
            >Sign Up
          </nav-link-component>
        </li>

        <li v-if="user">
          <a :href="route('logout')" @click.prevent="submit">
            <form method="POST" :action="route('logout')">Log out</form>
          </a>
        </li>
      </ul>
    </ul>
  </div>
</template>

<script>
export default {
  inject: ["user"],

  data() {
    return {
      form: this.$inertia.form({}),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("logout"), {
        onFinish: () => location.assign("/"),
      });
    },
  },

  mounted() {
    // This adds a divider between the second to last element and the Auth links
    let divider = document.createElement("hr");
    divider.className = "rounded";
    document
      .querySelector("ul.side-nav-links > li:nth-last-child(2)")
      .appendChild(divider);
  },
};
</script>

<style>
ul.side-nav-links > li:nth-last-child(2) {
  margin-bottom: 0px !important;
}

hr.rounded {
  border-top: 2px solid #eee;
}
</style>
