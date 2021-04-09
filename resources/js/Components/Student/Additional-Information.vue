<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> Nationality Details </create-page-subtitle>

    <!--  -->
    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
        <label for="origin_country" class="text-sm font-medium text-gray-700"
          >Country of Origin</label
        >
        <select-component
          :options="['Nigeria']"
          :value="form.country"
          @selection-changed-event="form.country = $event"
          select-first
        />
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
        <label for="origin_state" class="text-sm font-medium text-gray-700"
          >State of Origin</label
        >
        <select-component
          :options="states"
          :value="form.state"
          @selection-changed-event="form.state = $event"
        />
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
        <label for="origin_local_govt" class="text-sm font-medium text-gray-700"
          >LGA of Origin</label
        >
        <select-component
          :options="localGovtAreas"
          :value="form.localGovtArea"
          @selection-changed-event="form.localGovtArea = $event"
        />
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
        <label
          for="origin_hometown"
          class="block text-sm font-medium text-gray-700"
          >Community / Hometown</label
        >
        <input
          class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="hometown"
          id="hometown"
          v-model="form.hometown"
          autocomplete="city"
          required
        />
      </div>
    </div>

    <!--  -->
    <hr />
    <br class="md:block" />

    <create-page-subtitle :show-divider="false">
      Next of Kin Details
    </create-page-subtitle>

    <!--  -->
    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
        <label for="kinName" class="block text-sm font-medium text-gray-700"
          >Next of Kin</label
        >
        <input
          class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="kinName"
          id="kinName"
          v-model="form.kinName"
          autocomplete="name"
          required
        />
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
        <label for="kinPhone" class="block text-sm font-medium text-gray-700"
          >Phone Number</label
        >
        <div class="mt-1 flex rounded-md shadow-sm">
          <span
            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
          >
            +234
          </span>
          <input
            class="text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
            type="tel"
            name="kinPhone"
            id="kinPhone"
            autocomplete="phone"
            pattern="\([0-9]{3}\) [0-9]{3} [0-9]{4}"
            maxlength="14"
            v-mask="'(###) ### ####'"
            v-model="form.kinPhone"
          />
        </div>
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
        <label
          for="kinRelationship"
          class="block text-sm font-medium text-gray-700"
          >Relationship</label
        >
        <input
          class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="kinRelationship"
          id="kinRelationship"
          v-model="form.kinRelationship"
          autocomplete="relationship"
          required
        />
      </div>
    </div>

    <!--  -->
    <hr />
    <br class="md:block" />

    <create-page-subtitle :show-divider="false">
      Other Details
    </create-page-subtitle>
    <!--  -->
    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
        <label
          for="hasBursary"
          class="block md:inline-flex text-sm font-medium text-gray-700"
          >I am currently on a Scholarship/Bursary
        </label>

        <input
          class="md:inline-flex rounded md:ml-4 border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          :class="`w-5 h-5 md:w-4 md:h-4 cursor-pointer`"
          type="checkbox"
          name="hasBursary"
          id="hasBursary"
          v-model="bursaryChecked"
        />
      </div>
    </div>

    <slot name="footer"></slot>
  </form>
</template>

<script>
export default {
  inject: ["user"],

  data() {
    return {
      states: this.$Province.getStates().names,
      localGovtAreas: [],
      form: this.$inertia.form({
        country: "",
        state: "",
        localGovtArea: "",
        hometown: "",
        kinName: "",
        kinPhone: "",
        kinRelationship: "",
        hasBursary: false,
      }),
    };
  },

  methods: {
    createOrUpdate() {
      this.form
        .transform((data) => ({
          ...data,
        }))
        .put(this.route(`scholarship.update`, this.user), {
          onFinish: () => this.form.reset(),
        });
    },
  },

  watch: {
    "form.state"() {
      try {
        this.localGovtAreas = this.$Province
          .getLocalGovt(this.form.state)
          .map((v) => v.name);
      } catch (_) {
        return [];
      }
    },
  },

  computed: {
    bursaryChecked: {
      get() {
        return this.form.hasBursary;
      },

      set(val) {
        this.form.hasBursary = val;
      },
    },
  },

  mounted() {
    //
  },
};
</script>
