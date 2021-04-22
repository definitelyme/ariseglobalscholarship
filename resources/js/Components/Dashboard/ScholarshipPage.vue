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
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img
                        class="h-10 w-10 rounded-full"
                        :src="`${$asset_url}/user1.png`"
                        alt=""
                      />
                    </div>

                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ user.name }}
                      </div>

                      <div class="text-sm text-gray-500">
                        {{ user.email }}
                      </div>
                    </div>
                  </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    Arise Global Scholarship {{ scholarship.version }}
                  </div>
                  <div class="text-sm text-gray-500"><em>Under Review</em></div>
                </td>

                <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  Admin
                </td> -->

                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                    v-if="scholarship.run.is_active == 1"
                    v-text="'Active'"
                  >
                  </span>

                  <span
                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-500 text-white"
                    v-if="scholarship.run.is_active == 0"
                    v-text="'Inactive'"
                  >
                  </span>
                </td>

                <td
                  class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-5"
                >
                  <inertia-link
                    :href="
                      route('scholarship.edit', {
                        program: scholarship.run,
                        user: user,
                      })
                    "
                    class="text-indigo-600 hover:text-indigo-900"
                    as="button"
                    preserve-scroll
                    preserve-state
                    ><svg class="svg-icon h-5 w-5" viewBox="0 0 18 18">
                      <path
                        d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"
                      ></path></svg
                  ></inertia-link>
                  <inertia-link
                    :href="
                      route('scholarship.delete', {
                        program: scholarship.run,
                        user: user,
                      })
                    "
                    class="text-red-600 hover:text-red-900"
                    as="button"
                    preserve-scroll
                    preserve-state
                    ><svg class="svg-icon h-5 w-5" viewBox="0 0 18 18">
                      <path
                        d="M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306"
                      ></path></svg
                  ></inertia-link>
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
  inject: ["user", "scholarship"],

  props: {
    headers: {
      type: Array,
      required: true,
      default: () => ["name/email", "type", "status"],
    },
  },
};
</script>
