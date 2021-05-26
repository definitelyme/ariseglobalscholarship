<template>
  <div class="lg:w-1/2" @click="active = !active">
    <div
      class="question-and-answer select-none cursor-pointer border-2 rounded-lg text-sm group"
      :class="[`mx-2 py-4`, withTitle ? 'px-0' : 'px-4']"
    >
      <dt class="question">
        <div class="flex justify-between">
          <div
            class="text-indigo-800 font-semibold text-left break-words"
            v-text="question.title"
          ></div>
          <div class="ml-4">
            <arrow-down :class="{ hidden: active }"></arrow-down>
            <arrow-up :class="{ hidden: !active }"></arrow-up>
          </div>
        </div>
      </dt>
      <dd
        class="answer mt-2 leading-snug text-gray-600 text-justify"
        :class="{ hidden: !active }"
        v-html="question.body"
      ></dd>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    question: { type: Object, required: true },
    withTitle: { type: Boolean, required: false, default: () => false },
  },

  data() {
    return {
      active: false,
    };
  },
};
</script>
