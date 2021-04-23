<template>
  <main class="md:container mx-auto" style="margin-bottom: 60px">
    <!-- file upload modal -->
    <article
      aria-label="File Upload Modal"
      class="relative flex flex-col"
      @drop.prevent="dropHandler"
      @dragover.prevent="dragOverHandler"
      @dragleave.prevent="dragLeaveHandler"
      @dragenter.prevent="dragEnterHandler"
    >
      <!-- overlay -->
      <div
        id="overlay"
        class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md"
        ref="overlay"
      >
        <i>
          <svg
            class="fill-current w-12 h-12 mb-3 text-blue-700"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
          >
            <path
              d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z"
            />
          </svg>
        </i>
        <p class="text-lg text-blue-700">Drop files to upload</p>
      </div>

      <!-- scroll area -->
      <section class="h-full w-full overflow-none flex flex-col">
        <header
          class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center cursor-pointer"
          @click="$refs.hidden.click()"
        >
          <p
            class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center"
          >
            <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
          </p>

          <input
            id="hidden-input"
            class="sr-only hidden"
            name="documents[]"
            type="file"
            multiple
            autocomplete="off"
            spellcheck="false"
            ref="hidden"
            @change="onChanged"
            accept="image/png, image/jpeg, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
          />

          <button
            id="button"
            class="mt-2 rounded-sm px-3 py-1 text-white bg-gray-400 hover:bg-gray-500 focus:shadow-outline focus:outline-none"
            ref="button"
            @click.prevent=""
          >
            Choose documents
          </button>
        </header>

        <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
          To Upload
        </h1>

        <ul class="text-gray-700 mb-3">
          <li>1. Addmission Letter</li>
        </ul>

        <ul
          id="gallery"
          class="flex flex-1 flex-wrap -m-1"
          @click="performGalleryAction"
          ref="gallery"
        >
          <li
            id="empty"
            class="h-full w-full text-center flex flex-col items-center justify-center"
            :class="{ hidden: selected_files.length }"
          >
            <img
              class="mx-auto w-32"
              :src="`${$asset_url}/upload-image-0.png`"
              alt="no data"
            />
            <span class="text-small text-gray-500">No documents selected</span>
          </li>

          <li
            class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24"
            v-for="(file, i) in selected_files"
            :key="i"
            :id="file.id"
          >
            <file-upload-template
              :file="file"
              :mimes="mimeTypes"
              @delete-file="deleteFile"
            />

            <image-upload-template
              :file="file"
              :mimes="mimeTypes"
              @delete-file="deleteFile"
            />
          </li>
        </ul>
      </section>
    </article>
  </main>
</template>

<script>
export default {
  inject: ["user", "settings"],

  data() {
    return {
      counter: 0,
      selected_files: [],
      mimeTypes: {
        IMAGE: "image",
        PDF: "pdf",
        MSWORD: "msword",
        OFFICE_DOC: "officedocument",
      },
    };
  },

  methods: {
    performActionAddFile(file) {
      const isValidMime = this.settings.document_mimes.some((mime) =>
          file.type.match(mime)
        ),
        objectURL = URL.createObjectURL(file),
        mimeType = this.determineMimeType(file.type),
        fileSize =
          file.size > 1024
            ? file.size > 1048576
              ? Math.round(file.size / 1048576) + "mb"
              : Math.round(file.size / 1024) + "kb"
            : file.size + "b",
        getFile = (file) => {
          let reader = new FileReader();
          reader.readAsDataURL(file);
          return reader;
        };

      if (isValidMime) {
        this.selected_files.push({
          fid: this.$guid(),
          isDocument: mimeType != this.mimeTypes.IMAGE,
          isImage: mimeType == this.mimeTypes.IMAGE,
          name: file.name,
          type: mimeType,
          url: objectURL,
          size: fileSize,
        });

        this.$parent.form.documents.push(file);
      }
    },

    hasFiles({ dataTransfer: { types = [] } }) {
      return types.indexOf("Files") > -1;
    },

    dragEnterHandler(event) {
      if (!this.hasFiles(event)) {
        return;
      }

      ++this.counter && this.$refs.overlay.classList.add("draggedover");
    },

    dragLeaveHandler(_) {
      1 > --this.counter && this.$refs.overlay.classList.remove("draggedover");
    },

    dragOverHandler(event) {
      if (this.hasFiles(event)) event.preventDefault();
    },

    dropHandler(event) {
      for (const file of event.dataTransfer.files) {
        // Add file to list
        this.performActionAddFile(file);

        // Remove overlay and reset counter
        this.$refs.overlay.classList.remove("draggedover");
        this.counter = 0;
      }
    },

    determineMimeType(type) {
      if (type.includes(this.mimeTypes.IMAGE)) return this.mimeTypes.IMAGE;
      if (type.includes(this.mimeTypes.PDF)) return this.mimeTypes.PDF;
      if (type.includes(this.mimeTypes.MSWORD)) return this.mimeTypes.MSWORD;
      if (type.includes(this.mimeTypes.OFFICE_DOC))
        return this.mimeTypes.OFFICE_DOC;
    },

    onChanged(e) {
      for (const file of e.target.files) {
        this.performActionAddFile(file);
      }
    },

    deleteFile(file) {
      let index = this.selected_files.findIndex((i) => i.fid === file.fid);
      this.selected_files.splice(index, 1);
      this.$parent.form?.documents?.splice(index, 1);
    },
  },
};
</script>

<style scoped>
.hasImage:hover section {
  background-color: rgba(5, 5, 5, 0.4);
}
.hasImage:hover button:hover {
  background: rgba(5, 5, 5, 0.45);
}

#overlay p,
i {
  opacity: 0;
}

#overlay.draggedover {
  background-color: rgba(255, 255, 255, 0.7);
}
#overlay.draggedover p,
#overlay.draggedover i {
  opacity: 1;
}

.group:hover .group-hover\:text-blue-800 {
  color: #2b6cb0;
}
</style>
