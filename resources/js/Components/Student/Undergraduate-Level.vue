<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> Undergraduate Information </create-page-subtitle>
    <!--  -->
    <h4 class="text-gray-700 text-lg md:text-base">
      Details of your undergraduate education including entry details and
      current status.
    </h4>

    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div class="col-span-12 md:flex lg:col-span-7">
        <label
          for="course_of_study_select"
          class="block md:flex-1 text-sm font-medium text-gray-700"
          >Course of Study</label
        >

        <div class="inline-block w-full md:flex-1">
          <select
            class="w-full border bg-white rounded-md px-3 py-2 text-gray-700 outline-none"
            name="course_of_study_select"
            v-model="form.courseOfStudy"
          >
            <option selected :value="null" disabled>-- Select --</option>
            <option
              class="py-1 text-gray-700"
              v-for="(course, index) in $kLists.courses"
              :key="index"
              v-text="course"
            ></option>
          </select>

          <input
            class="w-full text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
            type="text"
            name="course_of_study"
            id="course_of_study"
            v-model="form.courseOfStudy"
            autocomplete="subject-name"
            required
          />
        </div>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div
        class="flex col-span-12 md:col-span-12 lg:col-span-7 items-center space-x-5"
      >
        <label
          for="course_duration"
          class="flex-1 text-sm font-medium text-gray-700 inline-flex"
          >Course Duration</label
        >

        <select
          class="flex-1 border bg-white rounded-md px-3 py-2 text-gray-700 outline-none inline-flex"
          name="course_duration"
          v-model="form.courseDuration"
        >
          <option selected :value="null" disabled>-- Select --</option>
          <option
            class="py-1 text-gray-700"
            v-for="(item, index) in $kLists.course_duration"
            :key="index"
            v-text="item"
          ></option>
        </select>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div
        class="flex col-span-12 md:col-span-12 lg:col-span-7 items-center space-x-5"
      >
        <label
          for="current_level"
          class="flex-1 text-sm font-medium text-gray-700 inline-flex"
          >Current Level</label
        >

        <select
          class="flex-1 border bg-white rounded-md px-3 py-2 text-gray-700 outline-none inline-flex"
          name="current_level"
          v-model="form.currentLevel"
        >
          <option selected :value="null" disabled>-- Select --</option>
          <option
            class="py-1 text-gray-700"
            v-for="(level, index) in $kLists.levels"
            :key="index"
            v-text="level"
          ></option>
        </select>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div
        class="flex col-span-12 md:col-span-12 lg:col-span-7 items-center space-x-5"
      >
        <label
          for="expected_date_of_graduation"
          class="flex-1 text-sm font-medium text-gray-700 inline-flex"
          >Expected Date of Graduation</label
        >

        <select
          class="flex-1 border bg-white rounded-md px-3 py-2 text-gray-700 outline-none inline-flex"
          name="expected_date_of_graduation"
          v-model="form.expectedDateOfGraduation"
        >
          <option selected :value="null" disabled>-- Select --</option>
          <option
            class="py-1 text-gray-700"
            v-for="(year, index) in $kLists.years().reverse()"
            :key="index"
            v-text="year"
          ></option>
        </select>
      </div>
    </div>

    <slot name="footer"></slot>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        courseOfStudy: null,
        courseDuration: null,
        currentLevel: null,
        expectedDateOfGraduation: null,
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

  mounted() {
    //
  },
};
</script>
