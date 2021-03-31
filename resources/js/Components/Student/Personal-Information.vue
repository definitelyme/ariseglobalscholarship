<template>
  <h3>Basic Personal Information</h3>
  <!--  -->
  <div class="grid grid-cols-12 gap-3">
    <div class="col-span-12 sm:col-span-6 md:col-span-4">
      <label for="first_name" class="block text-sm font-medium text-gray-700"
        >First Name</label
      >
      <input
        class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        type="text"
        name="first_name"
        id="first_name"
        :value="firstName"
        @input="
          $emitValue(
            'update:firstName',
            $event.target.value,
            firstNameModifiers
          )
        "
        autocomplete="given-name"
        required
      />
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4">
      <label for="last_name" class="block text-sm font-medium text-gray-700"
        >Surname</label
      >
      <input
        class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        type="text"
        name="last_name"
        id="last_name"
        :value="lastName"
        @input="
          $emitValue('update:lastName', $event.target.value, lastNameModifiers)
        "
        autocomplete="family-name"
        required
      />
    </div>

    <div class="col-span-12 sm:col-span-6 md:col-span-4">
      <label for="other_names" class="block text-sm font-medium text-gray-700"
        >Other Names</label
      >
      <input
        class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        type="text"
        name="other_names"
        id="other_names"
        :value="otherNames"
        @input="
          $emitValue(
            'update:otherNames',
            $event.target.value,
            otherNamesModifiers
          )
        "
        autocomplete="given-name"
        required
      />
    </div>

    <div class="col-span-12 sm:col-span-7 md:col-span-6">
      <label for="email_address" class="block text-sm font-medium text-gray-700"
        >Email address</label
      >
      <input
        class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        type="text"
        name="email_address"
        id="email_address"
        :value="email"
        @input="$emitValue('update:email', $event.target.value, emailModifiers)"
        autocomplete="email"
        required
      />
    </div>

    <div class="col-span-12 sm:col-span-5 md:col-span-6">
      <label for="phone_number" class="block text-sm font-medium text-gray-700"
        >Mobile Number</label
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
          name="phone"
          id="phone_number"
          autocomplete="phone"
          pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
          maxlength="14"
          v-mask="'(###) ### ####'"
          :value="phone"
          @input="
            $emitValue('update:phone', $event.target.value, phoneModifiers)
          "
          required
        />
      </div>
    </div>
  </div>

  <div class="grid grid-cols-12 gap-3">
    <div class="col-span-12 sm:col-span-4 md:col-span-4 lg:col-span-4">
      <label for="dob" class="block text-sm font-medium text-gray-700"
        >Date of Birth</label
      >
      <input
        class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        type="date"
        name="dob"
        id="dob"
        autocomplete="date_of_birth"
        pattern="\d{4}-\d{2}-\d{2}"
        :value="dob"
        @input="$emitValue('update:dob', $event.target.value, dobModifiers)"
        required
      />
    </div>

    <div class="col-span-12 sm:col-span-3 md:col-span-4 lg:col-span-3 block">
      <label class="text-sm font-medium text-gray-700">Gender</label>

      <div class="grid grid-cols-12 gap-2">
        <div class="col-span-6 sm:col-span-6 md:col-span-6 inline-flex h-10">
          <input
            id="male"
            name="gender"
            type="radio"
            class="focus:ring-main-400 self-center h-4 w-4 text-main-600 border-gray-300"
            value="male"
            @click="
              $emitValue('update:gender', $event.target.value, genderModifiers)
            "
          />

          <label for="male" class="flex h-full items-center">
            <span class="ml-2 self-center text-sm font-medium text-gray-700"
              >Male</span
            >
          </label>
        </div>
        <!--  -->
        <div class="col-span-6 sm:col-span-6 md:col-span-6 inline-flex h-10">
          <input
            id="female"
            name="gender"
            type="radio"
            class="focus:ring-main-400 self-center h-4 w-4 text-main-600 border-gray-300"
            value="female"
            @click="
              $emitValue('update:gender', $event.target.value, genderModifiers)
            "
          />

          <label for="female" class="flex h-full items-center">
            <span class="ml-2 self-center text-sm font-medium text-gray-700"
              >Female</span
            >
          </label>
        </div>
        <!--  -->
      </div>
    </div>

    <div class="col-span-12 sm:col-span-5 md:col-span-4 lg:col-span-5 relative">
      <label for="marital_status" class="text-sm font-medium text-gray-700"
        >Marital Status</label
      >
      <select-component
        :options="['Single', 'Married', 'Divorced', 'Widowed', 'Seperated']"
        :value="maritalStatus"
        @selection-changed-event="
          $emitValue('update:maritalStatus', $event, maritalStatusModifiers)
        "
      ></select-component>
    </div>
  </div>

  <!--  -->

  <hr />
  <br class="md:block" />

  <h3>Residential Details</h3>

  <div class="grid grid-cols-12 gap-3">
    <div class="col-span-12 sm:col-span-7 md:col-span-7">
      <label for="home_address" class="block text-sm font-medium text-gray-700">
        Home Address
      </label>

      <div class="mt-1">
        <textarea
          id="home_address"
          name="home_address"
          rows="3"
          class="text-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
          placeholder="No 36. Melburn Street"
          :value="address"
          @input="
            $emitValue('update:address', $event.target.value, addressModifiers)
          "
          required
        ></textarea>
      </div>
      <!-- <p class="mt-2 text-sm text-gray-500">
        Brief description for your profile. URLs are hyperlinked.
      </p> -->
    </div>
  </div>

  <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
    <div class="col-span-12 md:col-span-3 lg:col-span-3 relative self-end">
      <label for="country" class="text-sm font-medium text-gray-700"
        >Country</label
      >
      <select-component
        :options="['Nigeria']"
        :value="country"
        @selection-changed-event="
          $emitValue('update:country', $event, countryModifiers)
        "
        select-first
      />
    </div>

    <div class="col-span-12 md:col-span-3 lg:col-span-3 relative self-end">
      <label for="state" class="text-sm font-medium text-gray-700"
        >State of Residence</label
      >
      <select-component
        :options="states"
        :value="state"
        @selection-changed-event="
          $emitValue('update:state', $event, stateModifiers)
        "
        positioned
      />
    </div>

    <div class="col-span-12 md:col-span-3 lg:col-span-3 relative self-end">
      <label for="local_govt" class="text-sm font-medium text-gray-700"
        >Local Govt. of Residence</label
      >
      <select-component
        :options="localGovtAreas"
        :value="localGovtArea"
        @selection-changed-event="
          $emitValue('update:localGovtArea', $event, localGovtAreaModifiers)
        "
        positioned
      />
    </div>

    <div class="col-span-12 md:col-span-3 lg:col-span-3 self-end">
      <label for="city" class="block text-sm font-medium text-gray-700"
        >City</label
      >
      <input
        class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
        type="text"
        name="city"
        id="city"
        :value="city"
        @input="$emitValue('update:city', $event.target.value, cityModifiers)"
        autocomplete="city"
        required
      />
    </div>
  </div>

  <div class="grid grid-cols-12 gap-3 pb-10">
    <div class="md:hidden col-span-4" />

    <div
      class="col-span-4 md:col-start-10 md:col-span-3 lg:col-start-11 lg:col-span-2"
    >
      <button
        type="button"
        class="inline-flex px-2.5 py-2 w-full bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase content-center place-content-center"
        :class="`tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150`"
      >
        Next
        <svg
          viewBox="0 0 32 32"
          class="h-5 w-5 pl-1 icon icon-arrow-right"
          aria-hidden="true"
          fill="currentColor"
        >
          <path
            d="M5.975 17.504l14.287.001-6.367 6.366L16.021 26l10.004-10.003L16.029 6l-2.128 2.129 6.367 6.366H5.977z"
          />
        </svg>
      </button>
    </div>

    <div class="md:hidden col-span-4" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      states: this.$Province.getStates().names,
      localGovtAreas: new Array(),
    };
  },

  watch: {
    state() {
      // Auto-sync list of Local govts.
      try {
        this.localGovtAreas = this.$Province
          .getLocalGovt(this.state)
          .map((v) => v.name);
      } catch (_) {
        return [];
      }
    },
  },

  props: {
    firstName: String,
    firstNameModifiers: Object,
    lastName: String,
    lastNameModifiers: Object,
    otherNames: String,
    otherNamesModifiers: Object,
    email: String,
    emailModifiers: Object,
    phone: String,
    phoneModifiers: Object,
    dob: String,
    dobModifiers: Object,
    gender: String,
    genderModifiers: Object,
    maritalStatus: String,
    maritalStatusModifiers: Object,
    address: String,
    addressModifiers: Object,
    country: String,
    countryModifiers: Object,
    state: String,
    stateModifiers: Object,
    localGovtArea: String,
    localGovtAreaModifiers: Object,
    city: String,
    cityModifiers: Object,
  },

  emits: [
    "update:firstName",
    "update:lastName",
    "update:otherNames",
    "update:email",
    "update:phone",
    "update:dob",
    "update:gender",
    "update:maritalStatus",
    "update:address",
    "update:country",
    "update:state",
    "update:localGovtArea",
    "update:city",
  ],

  created() {
    // console.log(this.countryModifiers);
  },
};
</script>
