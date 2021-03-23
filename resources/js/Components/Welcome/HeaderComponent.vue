<template>
  <header>
    <div class="container">
      <div class="header-content d-flex flex-wrap align-items-center">
        <div class="logo">
          <a :href="route('/')" :title="$app_name">
            <application-logo />
          </a>

          <div class="logo-name">
            <h3 v-text="$app_name_short"></h3>
            <span v-text="$parent.quote"></span>
          </div>
        </div>

        <ul class="contact-add d-flex flex-wrap">
          <li>
            <div class="contact-info">
              <!-- <img :src="`${$asset_url}/icon2.png`" alt="" />
              <div class="contact-tt">
                <h4>Work Time</h4>
                <span>Mon - Fri 8 AM - 5 PM</span>
              </div> -->
            </div>
          </li>

          <li>
            <div class="contact-info">
              <img :src="`${$asset_url}/icon1.png`" alt="" />
              <div class="contact-tt">
                <h4>Call</h4>
                <span
                  ><a
                    :href="`tel:` + settings.phone"
                    v-text="settings.phone_styled"
                  ></a
                ></span>
              </div>
            </div>
          </li>

          <li>
            <div class="contact-info">
              <img :src="`${$asset_url}/icon3.png`" alt="" />
              <div class="contact-tt">
                <h4>Address</h4>
                <span
                  ><a :href="settings.address_url" v-text="settings.address"></a
                ></span>
              </div>
            </div>
          </li>
        </ul>

        <div class="menu-btn" @click.prevent="emitter.emit($events.sidebar)">
          <a href="#"
            ><span
              class="bar1"
              :class="{ 'bg-white': $parent._sidebarOpen }"
            ></span>

            <span
              class="bar2"
              :class="{ 'bg-white': $parent._sidebarOpen }"
            ></span>

            <span
              class="bar3"
              :class="{ 'bg-white': $parent._sidebarOpen }"
            ></span
          ></a>
        </div>
      </div>

      <div class="navigation-bar d-flex flex-wrap align-items-center">
        <top-nav-component />

        <custom-button-widget
          value="Login"
          alignment="end"
          max-width="25"
          direction=""
          :url="route('login')"
          v-if="user == null"
        />

        <div
          class="hidden sm:inline text-right"
          style="flex: 0 0 25%; max-width: 25%"
          v-if="user != null"
        >
          <dropdown align="right" ref="headerDropdown">
            <template #trigger>
              <span class="inline-flex rounded-md">
                <button
                  type="button"
                  class="max-w-sm bg-gray-800 rounded-full flex items-center text-sm"
                  id="user-menu"
                  aria-expanded="false"
                  aria-haspopup="true"
                >
                  <span class="sr-only">Open user menu</span>

                  <img
                    class="h-8 w-8 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt=""
                  />
                </button>
              </span>

              <span class="inline-flex rounded-md h-8 w-8 cursor-pointer">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 -6 30 30"
                  fill="currentColor"
                >
                  <path
                    v-show="!showingNavigationDropdown"
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />

                  <path
                    v-show="showingNavigationDropdown"
                    fill-rule="evenodd"
                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </span>
            </template>

            <template #content>
              <dropdown-link
                :href="route('dashboard')"
                :replace="true"
                :preserve-state="true"
                as="button"
              >
                Dashboard
              </dropdown-link>

              <a
                class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                :href="route('logout')"
                type="button"
                @click.prevent="submit"
              >
                <form method="POST" :action="route('logout')">Log out</form>
              </a>
            </template>
          </dropdown>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  inject: ["user", "settings"],

  data() {
    return {
      form: this.$inertia.form({}),
      showingNavigationDropdown: false,
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("logout"), {
        onFinish: () => location.assign("/"),
      });
    },
    log() {
      console.log("Hello printing!");
    },
  },

  mounted() {
    this.emitter.on(
      this.$events.profileDropdown,
      (data) => (this.showingNavigationDropdown = data || false)
    );
  },
};
</script>

<style>
div.logo {
  display: flex;
}
div.logo > a {
  display: inline-flex;
}
div.logo-name {
  display: inline-block;
  margin: auto auto auto 10px;
  line-height: 1;
}

div.logo-name > h3 {
  font-size: 22px;
  font-family: Poppins, sans-serif;
  font-weight: 500;
  color: rgb(19, 18, 18);
  text-overflow: ellipsis;
}

div.logo-name > span {
  font-size: 15px;
  font-weight: 300;
}
</style>

<style scoped>
@media only screen and (max-width: 991px) {
  header .header-content .logo {
    flex: 0 0 80%;
    max-width: 80%;
  }
}
</style>
