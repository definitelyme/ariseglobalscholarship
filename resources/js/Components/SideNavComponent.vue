<template>
  <div class="responsive-menu" id="important">
    <ul class="side-nav-links">
      <li
        v-for="(menu, index) in menus"
        :key="index"
        :class="{
          'bg-white': menu.isActive,
          'px-2': menu.isActive,
          'p-1': menu.isActive,
          'rounded-md': menu.isActive,
        }"
      >
        <a
          :href="menu.href"
          :title="menu.title"
          v-text="menu.title"
          v-if="!menu.isActive"
        ></a>

        <span
          v-else
          v-text="menu.title"
          :class="{
            active: menu.isActive,
            'text-main': menu.isActive,
          }"
        ></span>
      </li>

      <ul class="auth-section">
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
          <nav-link-component :href="route('dashboard')">
            Dashboard
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
      menus: [
        {
          title: "Home",
          href: route("/"),
          isActive:
            route().current().includes("/") &&
            !route().current().includes("apply") &&
            !route().current().includes("scholarship/about"),
        },

        {
          title: "Apply",
          href: route("apply./"),
          isActive: route().current().includes("apply"),
        },

        {
          title: "About Scholarship",
          href: route("scholarship.about"),
          isActive: route().current().includes("scholarship/about"),
        },

        {
          title: "FAQ",
          href: route("faq"),
          isActive: route().current().includes("faq"),
        },

        {
          title: "About Us",
          href: route("about"),
          isActive: route().current().includes("about"),
        },

        {
          title: "Contact Us",
          href: route("contact"),
          isActive: route().current().includes("contact"),
        },
      ],
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
      .querySelector("ul.side-nav-links > ul.auth-section")
      .prepend(divider);
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

<style scoped>
li > span.active {
  font-size: 20px;
  font-weight: 500;
  font-family: Poppins, sans-serif;
}
</style>
