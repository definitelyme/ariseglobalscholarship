<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    method="POST"
    enctype="multipart/form-data"
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

    <div class="md:container" v-if="form.progress">
      <div class="grid grid-cols-12 gap-2">
        <div
          class="col-span-12 justify-self-end md:justify-self-start items-center space-x-4 md:space-x-3"
        >
          <label for="file" class="text-gray-700">Uploading... </label>

          <progress :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
          </progress>
        </div>
      </div>
    </div>

    <document-uploader />

    <slot name="footer"></slot>
  </form>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { inject } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
  inject: ["user", "scholarship"],

  setup() {
    const user = inject("user");
    const toast = inject("toast");
    const scholarship = inject("scholarship");

    const form = useForm(`UpdateDocumentsForm:${user.id}`, {
      files: [],
    });

    function createOrUpdate() {
      Inertia.post(
        route(`scholarship.update`, { user: user, scholarship: scholarship }),
        {
          _method: "put",
          ...form.files,
        },
        {
          forceFormData: true,
          preserveScroll: true,
          preserveState: true,
          onProgress: (progress) => (form.progress = progress),
          onSuccess: (page) => {
            // form.reset("password");
            toast.fire({
              icon: "error",
              title: "Signed in successfully",
            });
          },
          onError: (errors) => {
            console.log(errors);
          },
          onFinish: () => {
            form.reset("progress");
            // Inertia.get(route("dashboard"));
          },
        }
      );
    }

    return { form, createOrUpdate };
  },

  mounted() {
    //
  },
};
</script>
