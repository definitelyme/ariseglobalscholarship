<template>
  <title-component after="Scholarship - Apply"></title-component>

  <breeze-authenticated-layout>
    <div class="main-section">
      <background-component :banner-hidden="true" />

      <div class="flex bg-gray-100">
        <div
          class="h-screen md:m-2 hidden md:flex lg:flex xl:flex flex-col md:w-56 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 shadow-sm sm:rounded-md"
        >
          <nav
            class="flex-grow md:block pt-3.5 px-4 md:overflow-y-auto no-scrollbar"
          >
            <span
              v-for="(item, index) in tabs"
              :key="index"
              @click.prevent="currentTab = item"
            >
              <a
                class="block px-4 py-2 my-1 text-sm font-semibold text-gray-900 rounded-lg dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="#"
                :id="item.split(' ').join('--').toLowerCase()"
                :class="{
                  'bg-gray-200': isActiveTab(item),
                  'dark-mode:bg-gray-700': isActiveTab(item),
                  'bg-transparent': !isActiveTab(item),
                  'dark-mode:bg-transparent': !isActiveTab(item),
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
              <!-- md:hidden lg:hidden  -->
              <ul
                class="hidden border-b h-14 mt-2 overflow-x-scroll no-scrollbar"
              >
                <li
                  class="mr-2.5"
                  v-for="(tab, index) in tabs"
                  :key="index"
                  :class="{ '-mb-px': isActiveTab(tab) }"
                >
                  <a
                    class="inline-flex py-2 px-7 font-semibold h-full whitespace-nowrap"
                    :class="{
                      'bg-white': isActiveTab(tab),
                      'bg-gray-300': !isActiveTab(tab),
                      'border-l border-t-4 border-r bg-clip-border border-indigo-500 border-solid rounded-t-2xl': isActiveTab(
                        tab
                      ),
                      'text-main-300': isActiveTab(tab),
                      'text-gray-500 hover:text-gray-700': !isActiveTab(tab),
                    }"
                    href="#"
                    ><span
                      class="text-center place-self-center"
                      v-text="tab"
                    ></span
                  ></a>
                </li>
                <!-- <li class="mr-2.5">
                  <a
                    class="bg-gray-300 inline-flex py-2 px-7 text-gray-500 hover:text-gray-700 font-semibold h-full"
                    href="#"
                    ><span class="text-center place-self-center">Tab</span></a
                  >
                </li>
                <li class="mr-2.5">
                  <a
                    class="bg-gray-300 inline-flex py-2 px-7 text-gray-500 hover:text-gray-700 font-semibold h-full"
                    href="#"
                    ><span class="text-center place-self-center">Tab</span></a
                  >
                </li> -->
              </ul>

              <div
                class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 h-screen overflow-y-auto no-scrollbar"
                :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
              >
                <keep-alive>
                  <component
                    :is="currentTabComponent"
                    v-model:firstName.capitalize.no-whitespace="form.firstName"
                    v-model:lastName.capitalize.no-whitespace="form.lastName"
                    v-model:otherNames.capitalize.no-whitespace="
                      form.otherNames
                    "
                    v-model:email.no-whitespace="form.email"
                    v-model:phone.unmask-phone.no-whitespace="form.phone"
                    v-model:dob.no-whitespace="form.dob"
                    v-model:gender.no-whitespace="form.gender"
                    v-model:marital-status.no-whitespace="form.maritalStatus"
                    v-model:address.sentence="form.address.label"
                    v-model:country="form.address.country"
                    v-model:state="form.address.state"
                    v-model:localGovtArea="form.address.localGovtArea"
                    v-model:city.capitalize.no-whitespace="form.address.city"
                    v-model:originCountry="form.origin.country"
                    v-model:originState="form.origin.state"
                    v-model:originLocalGovtArea="form.origin.localGovtArea"
                    v-model:originHometown.capitalize.no-whitespace="
                      form.origin.hometown
                    "
                    v-model:kinName.capitalize.no-whitespace="form.kin.name"
                    v-model:kinPhone.unmask-phone.no-whitespace="form.kin.phone"
                    v-model:kinRelationship.capitalize.no-whitespace="
                      form.kin.relationship
                    "
                    v-model:bursary="form.other.bursary"
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
      currentTab: "Additional Information",
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
        address: {
          label: "",
          country: "",
          state: "",
          localGovtArea: "",
          city: "",
        },
        origin: {
          country: "",
          state: "",
          localGovtArea: "",
          hometown: "",
        },
        kin: {
          name: "",
          phone: "",
          relationship: "",
        },
        other: {
          bursary: true,
        },
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
    isActiveTab(item) {
      return (
        this.currentTabComponent == item.split(" ").join("--").toLowerCase()
      );
    },

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
      tabs: this.tabs,
      isActiveTab: this.isActiveTab,
      currentTabComponent: this.currentTabComponent,
    };
  },

  mounted() {
    this.$emitter.on("tab-changed", (incoming) => {
      this.currentTab = incoming;
    });
  },
};
</script>
