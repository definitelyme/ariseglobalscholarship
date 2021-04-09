<template>
  <div class="py-2 align-middle inline-block w-full">
    <div class="shadow overflow-x-auto border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
              v-for="(item, index) in tableHeads"
              :key="index"
              v-text="item"
            ></th>
            <th scope="col" class="relative px-6 py-3">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                  <svg-house-widget />
                </div>
                <div class="ml-4 text-sm font-medium text-gray-900">
                  Federal University of Technology Owerri
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              2014
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              2019
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
            >
              <a href="#" class="text-indigo-600 hover:text-indigo-900">
                <svg class="svg-icon h-5 w-5" viewBox="0 0 18 18">
                  <path
                    d="M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306"
                  ></path>
                </svg>
              </a>
            </td>
          </tr>

          <!-- More items... -->
        </tbody>
      </table>
    </div>
  </div>

  <teleport to="body">
    <modal-overlay>
      <modal>
        <!--  -->
        <template #modal_header>
          <h3
            class="text-lg leading-6 font-medium text-gray-900"
            id="modal-title"
          >
            Add Institution
          </h3>
        </template>
        <!--  -->
        <template #modal_body>
          <form @click.prevent="addSchool" class="space-y-3">
            <div class="grid grid-cols-12">
              <div class="col-span-12">
                <label
                  for="name"
                  class="block text-sm font-medium text-gray-700"
                  >Name of Institution</label
                >
                <input
                  type="text"
                  name="name"
                  v-model="new_secondary_sch_form.name"
                  id="name"
                  autocomplete="school-name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>

            <div class="grid grid-cols-12">
              <div class="col-span-12 md:auto-cols-min">
                <label
                  for="name"
                  class="block text-sm font-medium text-gray-700"
                  >Year of Admission / Year of Graduation</label
                >
              </div>

              <div class="col-span-12 md:auto-cols-min">
                <div class="flex flex-grow-0 space-x-2 mt-1">
                  <div class="inline-flex">
                    <select
                      class="border bg-white focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                      name="entry"
                      v-model="new_secondary_sch_form.entry"
                    >
                      <option>-- Select --</option>
                      <option
                        class="py-1 text-gray-700"
                        v-for="(year, index) in $kLists.years()"
                        :key="index"
                        v-text="year"
                      ></option>
                    </select>
                  </div>

                  <div class="inline-flex">
                    <select
                      class="border bg-white focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                      name="finished"
                      v-model="new_secondary_sch_form.finished"
                    >
                      <option>-- Select --</option>
                      <option
                        class="py-1 text-gray-700"
                        v-for="(year, index) in $kLists.years()"
                        :key="index"
                        v-text="year"
                      ></option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </template>
        <!--  -->
        <template #modal_cancel>
          <button
            type="button"
            @click="$emitter.emit($events.closeModal)"
            class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm"
          >
            Cancel
          </button>
        </template>
        <!--  -->
        <template #modal_ok>
          <button
            type="button"
            class="sm:mt-0 mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
          >
            Add
          </button>
        </template>
      </modal>
    </modal-overlay>
  </teleport>
</template>

<script>
export default {
  props: {
    tableHeads: {
      type: Array,
      required: true,
    },
  },

  data() {
    return {
      new_secondary_sch_form: this.$inertia.form({
        name: "",
        entry: "",
        finshed: "",
        isCurrent: false,
      }),
    };
  },
};
</script>
