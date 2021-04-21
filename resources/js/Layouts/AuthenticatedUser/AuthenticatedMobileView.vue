<template>
  <div
    class="md:hidden"
    id="mobile-menu"
    :class="{
      block: $parent.showingNavigationDropdown,
      hidden: !$parent.showingNavigationDropdown,
    }"
  >
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <inertia-link
        class="block px-3 py-2 rounded-md text-base font-medium"
        v-for="(mobileMenu, index) in mobileMenus"
        :key="index"
        :href="
          mobileMenu.param == null
            ? route(mobileMenu.name)
            : route(mobileMenu.name, mobileMenu.param)
        "
        :title="mobileMenu.title"
        v-text="mobileMenu.title"
        :class="{
          'bg-gray-900 text-white': route().current(mobileMenu.name),
          'text-gray-300 hover:bg-gray-700 hover:text-white': !route().current(
            mobileMenu.name
          ),
        }"
      ></inertia-link>
    </div>

    <div class="pt-4 pb-3 border-t border-gray-700">
      <div class="flex items-center px-4">
        <div class="flex-shrink-0">
          <img
            class="h-10 w-10 rounded-full"
            :src="`${$asset_url}/user.png`"
            :alt="user.first_name"
          />
        </div>

        <div class="ml-3">
          <div class="text-base font-medium leading-none text-white">
            {{ $page.props.auth.user.name }}
          </div>
          <div class="text-sm font-medium leading-none text-gray-400">
            {{ $page.props.auth.user.email }}
          </div>
        </div>

        <button
          class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
        >
          <span class="sr-only">View notifications</span>
          <!-- Heroicon name: outline/bell -->
          <svg
            class="h-6 w-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
            />
          </svg>
        </button>
      </div>

      <div class="mt-3 px-2 space-y-1">
        <inertia-link
          href="#"
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700"
          >Your Profile</inertia-link
        >

        <inertia-link
          href="#"
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700"
          >Edit Profile</inertia-link
        >

        <a
          :href="route('logout')"
          @click.prevent="$parent.submit"
          class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700"
        >
          <form method="POST" :action="route('logout')">Log out</form>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";

export default {
  inject: ["user", "scholarship"],

  components: {
    BreezeApplicationLogo,
    BreezeResponsiveNavLink,
  },

  data() {
    return {
      mobileMenus: [
        {
          title: "Dashboard",
          name: "dashboard",
          param: null,
        },

        {
          title: "Apply for Scholarship",
          name: "scholarship.apply",
          param: null,
        },

        {
          title: "Application Status",
          name: "scholarship.show",
          param: {
            user: this.user,
            scholarship: this.scholarship,
          },
        },
      ],
    };
  },

  mounted() {
    console.log(this.user);
    console.log(this.scholarship);
  },
};
</script>
