<template>
  <title-component after="Scholarship - Start Application"></title-component>

  <breeze-authenticated-layout>
    <div class="main-section">
      <background-component :banner-hidden="true" />

      <div class="flex bg-gray-100">
        <div
          class="h-screen md:m-2 flex flex-col md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 shadow-sm sm:rounded-md"
        >
          <nav class="flex-grow md:block pt-3.5 px-4 md:overflow-y-auto">
            <span
              v-for="(item, index) in tabs"
              :key="index"
              @click.prevent="currentTab = item"
            >
              <a
                class="block px-4 py-2 my-1 text-sm font-semibold text-gray-900 rounded-lg dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="#"
                :id="$slugify(item)"
                :class="{
                  'bg-gray-200': currentTab == $slugify(item),
                  'dark-mode:bg-gray-700': currentTab == $slugify(item),
                  'bg-transparent': currentTab != $slugify(item),
                  'dark-mode:bg-transparent': currentTab != $slugify(item),
                }"
                v-text="item"
              ></a>

              <hr class="my-0" v-if="item == tabs[1] || item == tabs[5]" />
            </span>
          </nav>
        </div>

        <div class="flex flex-col sm:rounded-md w-screen">
          <form @submit.prevent="submit">
            <div
              class="flex-1 shadow-sm sm:rounded-md sm:overflow-hidden md:m-2"
            >
              <div
                class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-6 h-screen"
              >
                <keep-alive>
                  <component
                    :is="currentTabComponent"
                    v-model:first-name="form.firstName"
                    v-model:lastName="form.lastName"
                    v-model:other-names="form.otherNames"
                    v-model:email="form.email"
                    v-model:phone="form.phone"
                    v-model:dob="form.dob"
                    v-model:gender="form.gender"
                    v-model:marital-status="form.maritalStatus"
                    v-model:address="form.address"
                    v-model:country="form.country"
                    v-model:state="form.state"
                    v-model:localGovtArea="form.localGovtArea"
                  >
                  </component>
                </keep-alive>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  data() {
    return {
      currentTab: "Personal Information",
      tabs: [
        "Personal Information",
        "Additional Information",
        "Passport Photograph",
        "Secondary Level",
        "Undergraduate Level",
        "Post Graduate Level",
        "O Level Result",
        "Documents",
      ],
      form: this.$inertia.form({
        firstName: "",
        lastName: "",
        otherNames: "",
        email: "",
        phone: "",
        dob: "",
        gender: "",
        maritalStatus: "",
        address: "",
        country: "",
        state: "",
        localGovtArea: "",
        city: "",
      }),
    };
  },

  computed: {
    status: String,
    currentTabComponent() {
      return this.currentTab.split(" ").join("--").toLowerCase();
    },
  },

  components: {
    BreezeAuthenticatedLayout,
  },

  methods: {
    submit() {
      console.log(this.form);
      //   this.form
      //     .transform((data) => ({
      //       ...data,
      //       remember: this.form.remember ? "on" : "",
      //     }))
      //     .post(this.route("login"), {
      //       onFinish: () => this.form.reset("password"),
      //     });
    },
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      breadcrumbs: this.$attrs.breadcrumbs,
    };
  },

  created() {
    this.$reactive({
      author: "Vue Team",
      year: "2020",
      title: "Vue 3 Guide",
      description: "You are reading this book right now ;)",
      price: "free",
    });
  },
};
</script>
