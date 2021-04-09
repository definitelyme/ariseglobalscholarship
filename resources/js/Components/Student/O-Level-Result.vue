<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> O Level Details </create-page-subtitle>
    <!--  -->
    <h4 class="text-gray-700 text-lg md:text-base">
      Provide details of at least 5 credits minimum of your O-Level result. Type
      the subject name followed by a space and the grade; in
      <strong>BLOCK LETTERS</strong>.
      <em>
        <h5 class="text-gray-700 text-sm">
          An example would be in the form of 'Biology A1'. The first and second
          entries are for <strong>Mathematics</strong> and
          <strong>English Language</strong> respectively.
        </h5>
      </em>
    </h4>

    <div class="grid grid-cols-12 gap-6">
      <div
        class="col-span-3 md:col-span-2 sm:justify-self-end place-self-center"
      >
        <label
          for="mathematics"
          class="block text-sm font-semibold text-gray-700"
          >Mathematics</label
        >
      </div>

      <div
        class="col-span-9 md:col-span-10 sm:justify-self-start md:auto-cols-max place-self-center"
      >
        <input
          class="block text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="mathematics"
          id="mathematics"
          v-model="form.mathematics"
          placeholder="X2"
          required
        />
      </div>
    </div>
    <!--  -->
    <div class="grid grid-cols-12 gap-6">
      <div
        class="col-span-3 md:col-span-2 sm:justify-self-end place-self-center"
      >
        <label for="english" class="block text-sm font-semibold text-gray-700"
          >English</label
        >
      </div>

      <div
        class="col-span-9 md:col-span-10 sm:justify-self-start md:auto-cols-max place-self-center"
      >
        <input
          class="block text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="english"
          id="english"
          v-model="form.english"
          placeholder="X2"
          required
        />
      </div>
    </div>

    <!-- Other subjects -->

    <div class="grid grid-cols-12 gap-6">
      <div
        class="col-span-3 md:col-span-2 sm:justify-self-end place-self-center"
      >
        <label for="subject_3" class="block text-sm font-semibold text-gray-700"
          >Sujeect 3</label
        >
      </div>

      <div
        class="col-span-9 md:col-span-10 sm:justify-self-start md:auto-cols-max place-self-center"
      >
        <input
          class="block text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="subject_3"
          id="subject_3"
          v-model="form.subject_3"
          placeholder="Subject X2"
          required
        />
      </div>
    </div>
    <!--  -->
    <div class="grid grid-cols-12 gap-6">
      <div
        class="col-span-3 md:col-span-2 sm:justify-self-end place-self-center"
      >
        <label for="subject_4" class="block text-sm font-semibold text-gray-700"
          >Sujeect 4</label
        >
      </div>

      <div
        class="col-span-9 md:col-span-10 sm:justify-self-start md:auto-cols-max place-self-center"
      >
        <input
          class="block text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="subject_4"
          id="subject_4"
          v-model="form.subject_4"
          placeholder="Subject X2"
          required
        />
      </div>
    </div>
    <!--  -->
    <div class="grid grid-cols-12 gap-6">
      <div
        class="col-span-3 md:col-span-2 sm:justify-self-end place-self-center"
      >
        <label for="subject_5" class="block text-sm font-semibold text-gray-700"
          >Sujeect 5</label
        >
      </div>

      <div
        class="col-span-9 md:col-span-10 sm:justify-self-start md:auto-cols-max place-self-center"
      >
        <input
          class="block text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="subject_5"
          id="subject_5"
          v-model="form.subject_5"
          placeholder="Subject X2"
          required
        />
      </div>
    </div>
    <!--  -->
    <div class="grid grid-cols-12 gap-6">
      <div
        class="col-span-3 md:col-span-2 sm:justify-self-end place-self-center"
      >
        <label for="subject_6" class="block text-sm font-semibold text-gray-700"
          >Sujeect 6</label
        >
      </div>

      <div
        class="col-span-9 md:col-span-10 sm:justify-self-start md:auto-cols-max place-self-center"
      >
        <input
          class="block text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="subject_6"
          id="subject_6"
          v-model="form.subject_6"
          placeholder="Subject X2"
          required
        />
      </div>
    </div>
    <!--  -->
    <div class="grid grid-cols-12 gap-6">
      <div
        class="col-span-3 md:col-span-2 sm:justify-self-end place-self-center"
      >
        <label for="subject_7" class="block text-sm font-semibold text-gray-700"
          >Sujeect 7</label
        >
      </div>

      <div
        class="col-span-9 md:col-span-10 sm:justify-self-start md:auto-cols-max place-self-center"
      >
        <input
          class="block text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text"
          name="subject_7"
          id="subject_7"
          v-model="form.subject_7"
          placeholder="Subject X2"
          required
        />
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
      this.form
        .transform((data) => ({
          ...data,
        }))
        .put(this.route(`scholarship.update`, this.user), {
          onFinish: () => this.form.reset(),
        });
    },
  },
};
</script>
