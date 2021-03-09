<template>
  <header>
    <div class="container">
      <div class="header-content d-flex flex-wrap align-items-center">
        <div class="logo">
          <a :href="route('/')" :title="$app_name"
            ><img
              :src="`${$asset_url}/favicon.png`"
              :alt="$app_name"
              height="60"
              width="60"
          /></a>

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
                  ><a
                    :href="settings.address"
                    v-text="settings.address_name"
                  ></a
                ></span>
              </div>
            </div>
          </li>
        </ul>

        <div class="menu-btn" @click.prevent="emitter.emit('toggleSidebar')">
          <a href="#"
            ><span
              class="bar1"
              :class="{ 'bg-white': $parent.sidebarOpen }"
            ></span>

            <span
              class="bar2"
              :class="{ 'bg-white': $parent.sidebarOpen }"
            ></span>

            <span
              class="bar3"
              :class="{ 'bg-white': $parent.sidebarOpen }"
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

        <custom-button-widget
          value="Apply Now"
          alignment="end"
          icon=""
          type="info"
          max-width="25"
          direction=""
          :url="route('scholarship./')"
          v-if="user != null"
        />
      </div>
    </div>
  </header>
</template>

<script>
export default {
  inject: ["user", "settings"],
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
