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

    <div
      class="md:container"
      v-if="form.progress && form.progress.percentage < 100"
    >
      <div class="grid grid-cols-12 gap-2">
        <div
          class="col-span-12 justify-self-end md:justify-self-start items-center space-x-4 md:space-x-3"
        >
          <label
            for="file"
            class="text-gray-700"
            v-text="`${form.progress.percentage}% Uploaded`"
          ></label>

          <progress
            :value="form.progress.percentage"
            max="100"
            v-text="`${form.progress.percentage}%`"
          ></progress>
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
  inject: ["user", "program"],

  setup() {
    const user = inject("user");
    const program = inject("program");
    const toast = inject("$$toast");

    const form = useForm(`UpdateDocumentsForm:${user.id}`, {
      documents: [],
    });

    function createOrUpdate() {
      //   console.log(user.slug);
      Inertia.post(
        route(`scholarship.update`, {
          program: program,
          user: user,
        }),
        {
          _method: "put",
          documents: form.documents,
        },
        {
          forceFormData: true,
          preserveScroll: true,
          preserveState: true,
          onProgress: (progress) => (form.progress = progress),
          onSuccess: (_) => {
            // Set errors to empty obj
            form.errors = {};
            // Fire Success Toast
            toast.fire({
              icon: "success",
              title: "Updated successfully!",
            });
          },
          onError: (errors) => {
            // Set errors
            form.errors = errors;
            // Loop thru errors and show Swal
            for (const err in errors) {
              // Fire Error Toast
              toast.fire({
                icon: "error",
                title: errors[err],
              });
            }
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
