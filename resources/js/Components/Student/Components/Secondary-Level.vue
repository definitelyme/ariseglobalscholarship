<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> Secondary School Information </create-page-subtitle>

    <!--  -->

    <h4 class="text-gray-700 text-lg md:text-base">
      Provide details of your secondary education status and institutions
      attended.
    </h4>

    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div
        class="flex col-span-12 md:col-span-12 lg:col-span-7 items-center space-x-5"
      >
        <label
          for="class"
          class="flex-1 text-sm font-medium text-gray-700 inline-flex"
          >Current Class</label
        >

        <select
          class="flex-1 border bg-white rounded px-3 py-2 outline-none inline-flex"
          name="current_class"
          v-model="form.current_class"
        >
          <option>-- Select --</option>
          <option
            class="py-1 text-gray-700"
            v-for="(clazz, index) in $kLists.classes"
            :key="index"
            v-text="clazz"
          ></option>
        </select>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-2 md:gap-2 lg:gap-3 xl:gap-3">
      <div
        class="flex col-span-12 md:col-span-12 lg:col-span-7 items-center space-x-5"
      >
        <label
          for="year"
          class="flex-1 text-sm font-medium text-gray-700 inline-flex"
          >Month / Year Graduated</label
        >

        <div class="inline-flex justify-around space-x-3">
          <select
            class="border bg-white rounded py-2 outline-none"
            name="month_graduated"
            v-model="form.month_graduated"
          >
            <option>-- Select --</option>
            <option
              class="py-1 text-gray-700"
              v-for="(month, index) in $kLists.months"
              :key="index"
              v-text="month"
            ></option>
          </select>

          <h3 class="self-center">/</h3>

          <select
            class="border bg-white rounded py-2 outline-none"
            name="year_graduated"
            v-model="form.year_graduated"
          >
            <option>-- Select --</option>
            <option
              class="py-1 text-gray-700"
              v-for="(year, index) in $kLists.years().reverse()"
              :key="index"
              v-text="year"
            ></option>
          </select>
        </div>
      </div>
    </div>

    <create-page-subtitle> Secondary schools attended </create-page-subtitle>

    <!-- Start Add institution -->
    <breeze-button
      type="button"
      @click="$emitter.emit($events.openModal)"
      class="bg-main-600 hover:bg-main-800 shadow-sm capitalize"
    >
      Add Institution
    </breeze-button>

    <add-new-institution-form
      :table-heads="['Secondary Institution', 'Entry Year', 'Exit Year']"
    />
    <!-- End Add institution -->

    <slot name="footer"></slot>
  </form>
</template>

<script>
import BreezeButton from "@/Components/Button";

export default {
  data() {
    return {
      form: this.$inertia.form({
        current_class: null,
        month_graduated: null,
        year_graduated: null,
      }),
    };
  },

  components: {
    BreezeButton,
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

    addSchool() {},
  },

  mounted() {},
};
</script>
