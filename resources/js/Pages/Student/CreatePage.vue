<template>
  <title-component after="Scholarship - Start Application"></title-component>

  <breeze-authenticated-layout>
    <div class="main-section">
      <background-component :banner-hidden="true" />

      <div class="flex bg-gray-100">
        <div
          class="md:m-2 flex flex-col md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 shadow-sm sm:rounded-md"
        >
          <nav
            :class="{ block: open, hidden: !open }"
            class="flex-grow md:block mt-3 px-4 pb-4 md:pb-0 md:overflow-y-auto"
          >
            <span
              v-for="(item, index) in tabs"
              :key="index"
              @click.prevent="switchTab($slugify(item))"
            >
              <a
                class="block px-4 py-2 my-1 text-sm font-semibold text-gray-900 rounded-lg dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                href="#"
                :id="$slugify(item)"
                :class="{
                  'bg-gray-200': selectedTab == $slugify(item),
                  'dark-mode:bg-gray-700': selectedTab == $slugify(item),
                  'bg-transparent': selectedTab != $slugify(item),
                  'dark-mode:bg-transparent': selectedTab != $slugify(item),
                }"
                v-text="item"
              ></a>

              <hr class="my-0" v-if="item == tabs[1] || item == tabs[5]" />
            </span>
          </nav>
        </div>

        <div class="flex flex-col w-full h-full sm:rounded-md">
          <div class="flex-1 shadow-sm sm:rounded-md sm:overflow-hidden md:m-2">
            <div class="px-6 py-6 md:px-4 bg-white space-y-6">
              <template v-if="selectedTab == $slugify(tabs[0])">
                <personal-info />
              </template>
              <!--  -->
              <template v-if="selectedTab == $slugify(tabs[1])">
                <additional-info />
              </template>
              <!--  -->
              <template v-if="selectedTab == $slugify(tabs[2])">
                <passport-photograph />
              </template>
              <!--  -->
              <template v-if="selectedTab == $slugify(tabs[3])">
                <secondary-level />
              </template>
              <!--  -->
              <template v-if="selectedTab == $slugify(tabs[4])">
                <undergraduate-level />
              </template>
              <!--  -->
              <template v-if="selectedTab == $slugify(tabs[5])">
                <post-graduate-level />
              </template>
              <!--  -->
              <template v-if="selectedTab == $slugify(tabs[6])">
                <o-level-result />
              </template>
              <!--  -->
              <template v-if="selectedTab == $slugify(tabs[7])">
                <documents />
              </template>
            </div>
          </div>
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
      selectedTab: null,
      tabs: [
        "Personal Information",
        "Additional Information",
        "Passport Photograph",
        "Secondary Level",
        "Undergraduate Level",
        "Post Graduate Level",
        "O Level Result,",
        "Documents",
      ],
    };
  },

  computed: {
    //
  },

  components: {
    BreezeAuthenticatedLayout,
  },

  methods: {
    switchTab(tab) {
      this.selectedTab = tab;
    },
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      breadcrumbs: this.$attrs.breadcrumbs,
    };
  },

  mounted() {
    this.selectedTab = this.$slugify(this.tabs[0]);
  },
};
</script>
