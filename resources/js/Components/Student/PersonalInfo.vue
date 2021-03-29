<template :id="id">
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
        required
      />
    </div>

    <div class="col-span-12 sm:col-span-3 md:col-span-3 lg:col-span-3 block">
      <label class="text-sm font-medium text-gray-700">Gender</label>

      <div class="grid grid-cols-12 gap-2">
        <div class="col-span-6 sm:col-span-6 md:col-span-6 inline-flex h-10">
          <input
            id="male"
            name="gender"
            type="radio"
            class="focus:ring-main-400 self-center h-4 w-4 text-main-600 border-gray-300"
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

    <div class="col-span-12 sm:col-span-5 md:col-span-5 lg:col-span-5 relative">
      <label for="marital_status" class="text-sm font-medium text-gray-700"
        >Marital Status</label
      >
      <select-component
        :options="['Single', 'Married', 'Divorced', 'Widowed', 'Seperated']"
      ></select-component>
    </div>
  </div>

  <!--  -->

  <hr />
  <br class="md:block" />

  <h3>Address Information</h3>

  <div class="grid grid-cols-12 gap-3">
    <div class="col-span-12 sm:col-span-7 md:col-span-7">
      <label for="home_address" class="block text-sm font-medium text-gray-700">
        Home Address
      </label>

      <div class="mt-1">
        <textarea
          id="home_address"
          name="home_address"
          rows="2"
          class="text-gray-700 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
          placeholder="No 36. Melburn Street"
          required
        ></textarea>
      </div>
      <!-- <p class="mt-2 text-sm text-gray-500">
                  Brief description for your profile. URLs are hyperlinked.
                </p> -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["id"],
};
</script>
