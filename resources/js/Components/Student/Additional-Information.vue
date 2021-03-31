<template>
  <h3>Nationality Details</h3>
  <!--  -->
  <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
    <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
      <label for="country" class="text-sm font-medium text-gray-700"
        >Country of Origin</label
      >
      <select-component
        :options="['Nigeria']"
        :value="originCountry"
        @selection-changed-event="
          $emitValue('update:originCountry', $event, originCountryModifiers)
        "
        select-first
      />
    </div>

    <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
      <label for="state" class="text-sm font-medium text-gray-700"
        >State of Origin</label
      >
      <select-component
        :options="states"
        :value="originState"
        @selection-changed-event="
          $emitValue('update:originState', $event, originStateModifiers)
        "
      />
    </div>

    <div class="col-span-12 md:col-span-6 lg:col-span-3 relative self-end">
      <label for="local_govt" class="text-sm font-medium text-gray-700"
        >LGA of Origin</label
      >
      <select-component
        :options="localGovtAreas"
        :value="originLocalGovtArea"
        @selection-changed-event="
          $emitValue(
            'update:originLocalGovtArea',
            $event,
            originLocalGovtAreaModifiers
          )
        "
      />
    </div>

    <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
      <label for="hometown" class="block text-sm font-medium text-gray-700"
        >Community / Hometown</label
      >
      <input
        class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        type="text"
        name="hometown"
        id="hometown"
        :value="originHometown"
        @input="
          $emitValue(
            'update:originHometown',
            $event.target.value,
            originHometownModifiers
          )
        "
        autocomplete="city"
        required
      />
    </div>
  </div>

  <!--  -->
  <hr />
  <br class="md:block" />

  <h3>Next of Kin Details</h3>
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
        :value="kinName"
        @input="
          $emitValue('update:kinName', $event.target.value, kinNameModifiers)
        "
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
          pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
          maxlength="14"
          v-mask="'(###) ### ####'"
          :value="kinPhone"
          @input="
            $emitValue(
              'update:kinPhone',
              $event.target.value,
              kinPhoneModifiers
            )
          "
          required
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
        :value="kinRelationship"
        @input="
          $emitValue(
            'update:kinRelationship',
            $event.target.value,
            kinRelationshipModifiers
          )
        "
        autocomplete="relationship"
        required
      />
    </div>
  </div>

  <!--  -->
  <hr />
  <br class="md:block" />

  <h3>Other Details</h3>
  <!--  -->
  <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
    <div class="col-span-12 md:col-span-6 lg:col-span-3 self-end">
      <label
        for="bursary"
        class="block md:inline-flex text-sm font-medium text-gray-700"
        >Are You On a Scholarship/Bursary?
      </label>

      <input
        class="md:inline-flex rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="checkbox"
        name="bursary"
        id="bursary"
        :value="bursary"
        v-model="bursaryChecked"
        required
      />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      states: this.$Province.getStates().names,
      localGovtAreas: [],
    };
  },

  watch: {
    originState() {
      try {
        this.localGovtAreas = this.$Province
          .getLocalGovt(this.originState)
          .map((v) => v.name);
      } catch (_) {
        return [];
      }
    },
  },

  computed: {
    bursaryChecked: {
      get() {
        return this.bursary;
      },

      set(val) {
        this.$emit("update:bursary", val);
      },
    },
  },

  props: {
    originCountry: String,
    originCountryModifiers: Object,
    originState: String,
    originStateModifiers: Object,
    originLocalGovtArea: String,
    originLocalGovtAreaModifiers: Object,
    originHometown: String,
    originHometownModifiers: Object,
    kinName: String,
    kinNameModifiers: Object,
    kinPhone: String,
    kinPhoneModifiers: Object,
    kinRelationship: String,
    kinRelationshipModifiers: Object,
    bursary: Boolean,
  },

  emits: [
    "update:originCountry",
    "update:originState",
    "update:originLocalGovtArea",
    "update:originHometown",
    "update:kinName",
    "update:kinPhone",
    "update:kinRelationship",
    "update:bursary",
  ],

  mounted() {
    //
  },
};
</script>
