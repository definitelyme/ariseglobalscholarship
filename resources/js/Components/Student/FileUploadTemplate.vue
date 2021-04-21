<template>
  <article
    v-if="file.isDocument"
    tabindex="0"
    class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm"
  >
    <img
      class="img-preview hidden w-full h-full sticky object-scale-down rounded-md bg-fixed opacity-30 hover:opacity-10"
      :src="src"
      :alt="file.type"
    />

    <section
      class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3"
    >
      <h1
        class="flex-1 group-hover:text-blue-800 text-black"
        v-text="file.name"
      ></h1>

      <div class="flex">
        <span class="p-1 text-blue-800">
          <i>
            <svg
              class="fill-current w-4 h-4 ml-auto pt-1"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
            </svg>
          </i>
        </span>

        <p class="p-1 size text-xs text-gray-700" v-text="file.size"></p>

        <button
          class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800"
          @click.prevent="$emit('delete-file', file)"
        >
          <svg
            class="pointer-events-none fill-current w-4 h-4 ml-auto"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
          >
            <path
              class="pointer-events-none"
              d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"
            />
          </svg>
        </button>
      </div>
    </section>
  </article>
</template>

<script>
export default {
  props: ["file", "mimes"],

  emits: ["delete-file"],

  computed: {
    src() {
      return this.file.type == this.mimes.PDF
        ? `${this.$asset_url}/pdf-image.png`
        : `${this.$asset_url}/msword-image.jpg`;
    },
  },
};
</script>
