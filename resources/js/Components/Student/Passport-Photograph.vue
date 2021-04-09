<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> Passport Photograph </create-page-subtitle>
    <!--  -->
    <h4 class="text-gray-700 text-lg md:text-base">
      Upload your recent passport photograph. Files are expected to be in
      <strong>JPEG</strong> format and no larger than <strong>200kb</strong> in
      size.
    </h4>

    <div class="grid grid-cols-12 gap-5">
      <div class="col-span-12 md:col-span-5">
        <div
          class="flex justify-center border-2 border-gray-300 border-dashed rounded-md cursor-pointer object-contain max-h-80 md:w-80"
          :class="{ 'px-6 py-6': image == null, 'px-2 py-2.5': image != null }"
          @click="selectPhoto"
        >
          <div class="text-center" :class="{ 'space-y-2': image == null }">
            <span
              class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100 self-center"
              v-show="image == null"
            >
              <svg
                class="h-auto w-auto text-gray-300"
                fill="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"
                />
              </svg>
            </span>
            <!-- <svg
            class="mx-auto h-12 w-12 text-gray-400"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 48 48"
            aria-hidden="true"
          >
            <path
              d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg> -->

            <img class="h-full w-full" :src="image" v-if="image != null" />

            <div class="flex text-sm text-gray-600" v-show="image == null">
              <label
                for="passportUpload"
                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
              >
                <span>Upload a file</span>

                <input
                  id="passportUpload"
                  name="passportUpload"
                  type="file"
                  class="sr-only"
                  ref="file"
                  @change="onImageSelected"
                  autocomplete="off"
                  spellcheck="false"
                  accept="image/jpeg"
                />
              </label>

              <p class="pl-1">or drag and drop</p>
            </div>

            <p class="text-xs text-gray-500" v-show="image == null">
              PNG, JPG, GIF up to 200KB
            </p>
          </div>
        </div>
      </div>

      <!--  -->

      <div class="col-span-12 md:col-span-12 lg:col-span-7 space-y-4">
        <p class="text-sm">
          <strong class="font-extrabold">-</strong> The photograph should be in
          colour and of the size of 420px by 420px.
        </p>
        <p class="text-sm">
          <strong class="font-extrabold">-</strong> It should have full face,
          front view, eyes open.
        </p>
        <p class="text-sm">
          <strong class="font-extrabold">-</strong> Photo should present full
          head from top of hair to bottom of chin.
        </p>
        <p class="text-sm">
          <strong class="font-extrabold">-</strong> The background should be a
          plain light colored background.
        </p>
      </div>
    </div>

    <slot name="footer"></slot>
  </form>
</template>

<script>
export default {
  data() {
    return {
      image: null,
    };
  },

  methods: {
    createOrUpdate() {
      console.log(this.image);
      //   this.form
      //     .transform((data) => ({
      //       ...data,
      //     }))
      //     .put(this.route(`scholarship.update`, this.user), {
      //       onFinish: () => this.form.reset(),
      //     });
    },

    selectPhoto() {
      let ref = this.$refs.file;
      ref.click();
    },

    onImageSelected($e) {
      var files = $e.target.files;

      if (!files.length) return;
      this.createImage(files[0]);
    },

    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
  },
};
</script>
