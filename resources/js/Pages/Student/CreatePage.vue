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
              @click.prevent="
                (currentTab = item),
                  $emitter.emit($events.applicationTabChanged, item)
              "
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
          <div class="flex-1 shadow-sm sm:rounded-md sm:overflow-hidden md:m-2">
            <keep-alive>
              <component :is="currentTabComponent">
                <template #footer>
                  <student-footer-area
                    :is-first-tab="currentTab == tabs[0]"
                    :is-last-tab="currentTab == tabs[tabs.length - 1]"
                  >
                    <template v-slot:second="props">
                      <breeze-button
                        class="bg-gray-800 hover:bg-gray-700"
                        type="submit"
                        v-text="
                          currentTab == tabs[tabs.length - 1]
                            ? 'Finish'
                            : 'Update'
                        "
                        :processing="props.processing"
                      >
                      </breeze-button>
                    </template>
                  </student-footer-area>
                </template>
              </component>
            </keep-alive>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeButton from "@/Components/Button";

export default {
  data() {
    return {
      currentTab: "Personal Information",
      tabs: [
        "Personal Information",
        "Additional Information",
        "Passport Photograph",
        // "Secondary Level",
        "Undergraduate Level",
        // "Post Graduate Level",
        // "O Level Result",
        "Documents",
      ],
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
    BreezeButton,
  },

  methods: {
    isActiveTab(item) {
      return (
        this.currentTabComponent == item.split(" ").join("--").toLowerCase()
      );
    },
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      program: this.$attrs.program,
      breadcrumbs: this.$attrs.breadcrumbs,
      tabs: this.tabs,
      isActiveTab: this.isActiveTab,
      $$toast: this.$toast,
      $$events: this.$events,
      $$emit: this.$emitter.emit,
      $$isEmptyObject: this.$isEmptyObject,
    };
  },

  mounted() {
    // On [event] listen, update the current tab from incoming
    this.$emitter.on(this.$events.applicationTabChanged, (incoming) => {
      this.currentTab = incoming;
    });

    // On [event] listen, go to next Tab
    this.$emitter.on(this.$events.switchNextTab, () => {
      let index = this.tabs.findIndex((v) => v === this.currentTab);
      let next = this.tabs[index + 1];

      //   console.log("Current Tab => " + this.currentTab);
      //   console.log("Next Tab => " + next);

      if (index != this.tabs.length - 1)
        this.$emitter.emit(this.$events.applicationTabChanged, next);
    });

    // On [event] listen, go to previous Tab
    this.$emitter.on(this.$events.switchPrevTab, () => {
      let index = this.tabs.findIndex((v) => v === this.currentTab);
      let prev = this.tabs[index - 1];

      if (index != 0)
        this.$emitter.emit(this.$events.applicationTabChanged, prev);
    });
  },
};
</script>
