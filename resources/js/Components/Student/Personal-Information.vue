<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> Basic Personal Information </create-page-subtitle>
    <!--  -->
    <div class="grid grid-cols-12 gap-3">
      <div class="col-span-12 sm:col-span-6 md:col-span-4">
        <label for="first_name" class="block text-sm font-medium text-gray-700"
          >First Name</label
        >
        <!-- v-model="form.firstName" -->
        <input
          class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="first_name"
          id="first_name"
          v-reactive="form.firstName"
          v-click-outside="logger"
          @hello="$logger('Bro was called')"
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
          v-model="form.lastName"
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
          v-model="form.otherNames"
          autocomplete="given-name"
        />
      </div>

      <div class="col-span-12 sm:col-span-7 md:col-span-6">
        <label
          for="email_address"
          class="block text-sm font-medium text-gray-700"
          >Email address</label
        >
        <input
          class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="email_address"
          id="email_address"
          v-model="form.email"
          autocomplete="email"
          required
        />
      </div>

      <div class="col-span-12 sm:col-span-5 md:col-span-6">
        <label
          for="phone_number"
          class="block text-sm font-medium text-gray-700"
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
            pattern="\([0-9]{3}\) [0-9]{3} [0-9]{4}"
            maxlength="14"
            v-mask="'(###) ### ####'"
            v-model="form.phone"
            required
          />
        </div>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-3">
      <div class="col-span-12 sm:col-span-4 md:col-span-4 lg:col-span-4">
        <label
          for="dob"
          class="block text-sm font-medium text-gray-700"
          v-if="!$detector.isSafari"
          >Date of Birth</label
        >
        <input
          v-if="!$detector.isSafari"
          class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="date"
          name="dob"
          id="dob"
          autocomplete="date_of_birth"
          pattern="\d{4}-\d{2}-\d{2}"
          v-model="form.dob"
          required
        />

        <!--  -->

        <label
          for="age"
          class="block text-sm font-medium text-gray-700"
          v-if="$detector.isSafari"
          >Age</label
        >
        <span v-if="$detector.isSafari"
          ><select
            id="age"
            name="age"
            class="w-full border bg-white rounded-md px-3 py-2 text-gray-700 outline-none"
            aria-required=""
            required
            v-model="form.age"
          >
            <option selected :value="null" disabled>
              -- Select your age --
            </option>
            <option
              v-for="age in 100"
              :key="age"
              :value="age"
              v-show="age > 20"
              v-text="age"
            ></option></select
        ></span>
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
              @input="form.gender = $event.target.value"
              required
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
              @input="form.gender = $event.target.value"
              required
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

      <div
        class="col-span-12 sm:col-span-5 md:col-span-4 lg:col-span-5 relative"
      >
        <label for="marital_status" class="text-sm font-medium text-gray-700"
          >Marital Status</label
        >
        <select-component
          :options="['Single', 'Married', 'Divorced', 'Widowed', 'Seperated']"
          :value="form.maritalStatus"
          @selection-changed-event="form.maritalStatus = $event"
        ></select-component>
      </div>
    </div>

    <!--  -->

    <hr />
    <br class="md:block" />

    <create-page-subtitle> Residential Details </create-page-subtitle>

    <div class="grid grid-cols-12 gap-3">
      <div class="col-span-12 sm:col-span-7 md:col-span-7">
        <label
          for="home_address"
          class="block text-sm font-medium text-gray-700"
        >
          Street Address
        </label>

        <div class="mt-1">
          <textarea
            id="home_address"
            name="home_address"
            rows="3"
            class="text-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
            placeholder="No 36. Melburn Street"
            v-model="form.address"
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
          >Country / Region</label
        >
        <select-component
          :options="['Nigeria']"
          :value="form.country"
          @selection-changed-event="form.country = $event"
          select-first
        />
      </div>

      <div class="col-span-12 md:col-span-3 lg:col-span-3 relative self-end">
        <label for="state" class="text-sm font-medium text-gray-700"
          >State / Province</label
        >
        <select-component
          :options="states"
          :value="form.state"
          @selection-changed-event="form.state = $event"
          positioned
        />
      </div>

      <div class="col-span-12 md:col-span-3 lg:col-span-3 relative self-end">
        <label for="local_govt" class="text-sm font-medium text-gray-700"
          >Local Govt. of Residence</label
        >
        <select-component
          :options="localGovtAreas"
          :value="form.localGovtArea"
          @selection-changed-event="form.localGovtArea = $event"
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
          v-model="form.city"
          autocomplete="city"
          required
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
        firstName: this.user.first_name,
        lastName: this.user.last_name,
        otherNames: "",
        email: this.user.email,
        phone: "",
        dob: "",
        age: "",
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

  methods: {
    logger() {
      console.log("jellmckn");
    },
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

  created() {
    // console.log(this.countryModifiers);
  },
};
</script>
