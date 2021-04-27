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
          :value="form.countryOrigin"
          @selection-changed-event="form.countryOrigin = $event"
          select-first
        />
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
        <label for="origin_state" class="text-sm font-medium text-gray-700"
          >State of Origin</label
        >
        <select-component
          :options="states"
          :value="form.stateOfOrigin"
          @selection-changed-event="form.stateOfOrigin = $event"
        />
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
        <label for="origin_local_govt" class="text-sm font-medium text-gray-700"
          >LGA of Origin</label
        >
        <select-component
          :options="localGovtAreas"
          :value="form.lgaOfOrigin"
          @selection-changed-event="originLocalGovtAreaField = $event"
        />
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
        <label
          for="origin_hometown"
          class="block text-sm font-medium text-gray-700"
          >Community / Hometown</label
        >

        <input-field
          v-model:hometown.trim.capitalize="form.hometown"
          :value="form.hometown"
          name="hometown"
          id="hometown"
          autocomplete="city"
          model-name="hometown"
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

        <input-field
          v-model:kinName.capitalize="form.kinName"
          :value="form.kinName"
          name="kinName"
          id="kinName"
          autocomplete="name"
          model-name="kinName"
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

          <input-field
            v-model:kinPhone.unmask-phone.no-whitespace="form.kinPhone"
            :value="form.kinPhone"
            model-name="kinPhone"
            clazz="text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
            type="tel"
            name="kinPhone"
            id="phone_number"
            autocomplete="phone"
            pattern="\([0-9]{3}\) [0-9]{3} [0-9]{4}"
            maxlength="14"
            v-mask="'(###) ### ####'"
            required
          />
        </div>
      </div>

      <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
        <label
          for="kinRelationship"
          class="block text-sm font-medium text-gray-700"
          >Relationship</label
        >

        <select-component
          :options="relationships"
          :value="form.kinRelationship"
          @selection-changed-event="form.kinRelationship = $event"
          positioned
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
      <div class="col-span-12 md:col-span-6 lg:col-span-4 self-end">
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
const COUNTRY_CODE = "234";

export default {
  inject: ["user", "program"],

  data() {
    return {
      states: this.$Province.getStates().names,
      localGovtAreas: [],
      errors: {},
      form: this.$inertia.form(`UpdateInfoForm:${this.user.id}`, {
        countryOrigin: this.user.scholarship.origin_country,
        stateOfOrigin: this.user.scholarship.origin_state,
        lgaOfOrigin: this.user.scholarship.origin_lga,
        hometown: this.user.scholarship.origin_hometown,
        kinName: this.user.scholarship.kin_name,
        kinPhone: this.user.scholarship.kin_phone?.replace(COUNTRY_CODE, ""),
        kinRelationship: this.user.scholarship.kin_relationship,
        hasBursary: this.user.scholarship.is_on_scholarship == 1,
      }),
    };
  },

  methods: {
    createOrUpdate() {
      this.form
        .transform((data) => ({
          ...data,
          kinPhone: `+${COUNTRY_CODE}${data.kinPhone}`,
        }))
        .put(
          this.route(`scholarship.update`, {
            user: this.user,
            program: this.program,
          }),
          {
            onSuccess: () => {
              // Set errors to empty obj
              this.errors = {};
              // Fire Success Toast
              this.$toast.fire({
                icon: "success",
                title: "Updated successfully!",
              });
            },
            onError: (errors) => {
              // Set errors
              this.errors = errors;
              // Loop thru errors and show Swal
              for (const err in errors) {
                // Fire Error Toast
                this.$toast.fire({
                  icon: "error",
                  title: errors[err],
                });
              }
            },
            onFinish: () => {
              // If errors object is empty, switch tab
              if (this.$isEmptyObject(this.errors))
                this.$emitter.emit(this.$events.switchNextTab);
            },
          }
        );
    },

    populateLocalGovtAreas() {
      this.localGovtAreas = this.$Province
        .getLocalGovt(this.form.stateOfOrigin)
        .map((v) => v.name);
    },
  },

  watch: {
    "form.stateOfOrigin"() {
      try {
        this.populateLocalGovtAreas();
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

    relationships() {
      return [
        "Brother",
        "Sister",
        "Mother",
        "Father",
        "Uncle",
        "Aunt",
        "Cousin",
        "Nephew",
        "Niece",
      ];
    },

    originLocalGovtAreaField: {
      get() {
        return this.form.lgaOfOrigin;
      },
      set(val) {
        if (!this.localGovtAreas.length) this.populateLocalGovtAreas();
        this.form.lgaOfOrigin = val;
      },
    },
  },

  mounted() {
    //
  },
};
</script>
