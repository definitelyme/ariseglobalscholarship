<template>
  <div
    class="inline-block md:align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl max-w-lg"
  >
    <div class="bg-white">
      <div class="sm:flex sm:items-start">
        <div
          class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
          v-if="$slots.modal_icon"
        >
          <slot name="modal_icon" />
        </div>
        <div class="text-center sm:mt-0 sm:text-left min-w-full text-gray-700">
          <div :class="[headerPadding, headerGap]">
            <span v-if="$slots.modal_header">
              <slot name="modal_header" />
            </span>
          </div>

          <div :class="[bodyPadding, bodyGap]">
            <div class="mt-2" v-if="$slots.modal_body">
              <slot name="modal_body" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
      v-if="$slots.modal_cancel || $slots.modal_ok"
    >
      <slot name="modal_cancel">
        <button
          type="button"
          @click="$emitter.emit($events.closeModal, modalId)"
          class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
        >
          Close
        </button>
      </slot>
      <slot name="modal_ok"> </slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    modalId: String,
    headerGap: {
      type: String,
      required: false,
      default: () => "",
    },
    headerPadding: {
      type: String,
      required: false,
      default: () => "pl-4 pr-4 pt-4 sm:pt-6",
    },
    bodyGap: {
      type: String,
      required: false,
      default: () => "",
    },
    bodyPadding: {
      type: String,
      required: false,
      default: () => "pl-4 pr-4 pb-4",
    },
  },
  mounted() {
    //
  },
};
</script>
