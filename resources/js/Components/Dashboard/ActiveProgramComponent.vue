<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  v-for="(header, i) in headers"
                  :key="i"
                  v-text="header"
                ></th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Actions</span>
                </th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ $app_name }} {{ unapplied.version_id }}
                  </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                    v-if="unapplied.is_active == 1"
                    v-text="'Active'"
                  >
                  </span>
                </td>

                <td
                  class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-5"
                >
                  <inertia-link
                    class="text-white hover:text-indigo-600 bg-indigo-600 hover:bg-white px-3 py-2 rounded-lg"
                    href="#"
                    as="button"
                    @click.prevent="submitApplication"
                    preserve-scroll
                    preserve-state
                  >
                    <span>Apply Here</span></inertia-link
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  inject: ["unapplied"],

  data() {
    return {
      form: this.$inertia.form("Re-apply form", {
        program: this.unapplied,
      }),
    };
  },

  props: {
    headers: {
      type: Array,
      required: true,
      default: () => ["Scholarship", "status"],
    },
  },

  methods: {
    submitApplication() {
      this.form.post(this.route("scholarship.reapply.store"), {
        onFinish: () => {
          var timeout = 2000;
          this.$toast.fire({
            icon: "success",
            title:
              "Great! Your request was successful, you'll be redirected shortly!",
            position: "top-start",
            timer: timeout,
          });
          setTimeout(() => {
            this.$inertia.get(this.route("scholarship.apply"));
          }, timeout);
        },
      });
    },
  },
};
</script>
