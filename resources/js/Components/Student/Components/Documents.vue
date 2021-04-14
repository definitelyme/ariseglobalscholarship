<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> Documents Upload </create-page-subtitle>

    <h4 class="text-gray-700 text-lg md:text-base">
      Upload supporting documents to ensure a valid application
      <em>
        <h5 class="text-gray-700 text-sm">
          Documents are expected to be either JPEG, MS Word (*.doc or *.docx) or
          PDF format and no larger than 500kb in size.
        </h5>
      </em>
    </h4>

    <document-uploader />

    <slot name="footer"></slot>
  </form>
</template>

<script>
export default {
  inject: ["user"],

  data() {
    return {
      form: this.$inertia.form({}),
    };
  },

  methods: {
    createOrUpdate() {
      this.form
        .transform((data) => ({
          ...data,
        }))
        .put(this.route(`scholarship.update`, this.user), {
          onFinish: () => this.$inertia.get("/dashoard"),
        });
    },
  },

  mounted() {
    //
  },
};
</script>
