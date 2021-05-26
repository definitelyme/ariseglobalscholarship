<template>
  <form
    class="px-6 py-6 md:px-4 md:pt-5 bg-white space-y-4 md:space-y-6 h-screen overflow-y-auto no-scrollbar"
    :class="`border-indigo-500 border-solid border-t md:border-transparent md:border-none`"
    @submit.prevent="createOrUpdate"
  >
    <create-page-subtitle> Post Graduate Level </create-page-subtitle>
    <!--  -->
    <h4 class="text-gray-700 text-lg md:text-base">
      Details of your post graduate education including entry details and
      current status.
    </h4>

    <!--  -->

    <!-- Start Add institution -->
    <breeze-button
      type="button"
      @click="$emitter.emit($events.openModal, 'add-new-institution')"
      class="bg-main-600 hover:bg-main-800 shadow-sm capitalize"
    >
      Add Institution
    </breeze-button>

    <add-new-institution-form
      :table-heads="['Post Graduate Institution', 'Course', 'Exit Year']"
    />
    <!-- End Add institution -->

    <slot name="footer"></slot>
  </form>
</template>

<script>
import BreezeButton from "@/Components/Button";

export default {
  components: {
    BreezeButton,
  },
};
</script>
