<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @click.prevent="createOrUpdate"
  >
    <create-page-subtitle> Undergraduate Information </create-page-subtitle>
    <!--  -->
    <h4 class="text-gray-700 text-lg md:text-base">
      Details of your undergraduate education including entry details and
      current status.
    </h4>

    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div
        class="flex col-span-12 md:col-span-12 lg:col-span-7 items-center space-x-5"
      >
        <label
          for="course_of_study"
          class="flex-1 text-sm font-medium text-gray-700 inline-flex"
          >Course of Study</label
        >

        <select
          class="flex-1 border bg-white rounded px-3 py-2 text-gray-700 outline-none inline-flex"
          name="course_of_study"
        >
          <option>-- Select --</option>
          <option
            class="py-1 text-gray-700"
            v-for="(course, index) in $kLists.courses"
            :key="index"
            v-text="course"
          ></option>
        </select>
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
          class="flex-1 border bg-white rounded px-3 py-2 text-gray-700 outline-none inline-flex"
          name="course_duration"
        >
          <option>-- Select --</option>
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
          class="flex-1 border bg-white rounded px-3 py-2 text-gray-700 outline-none inline-flex"
          name="current_level"
        >
          <option>-- Select --</option>
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
          class="flex-1 border bg-white rounded px-3 py-2 text-gray-700 outline-none inline-flex"
          name="expected_date_of_graduation"
        >
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
        mathematics: "",
        english: "",
        subject_3: "",
        subject_4: "",
        subject_5: "",
        subject_6: "",
        subject_7: "",
      }),
    };
  },

  methods: {
    createOrUpdate() {
      console.log(this.form);
    },
  },

  mounted() {
    //
  },
};
</script>
