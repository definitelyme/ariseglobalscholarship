<template>
  <dl
    class="my-10 lg:my-16 max-w-screen-md lg:max-w-screen-xl flex flex-col lg:flex-row lg:flex-wrap lg:mx-16"
  >
    <faq-tab
      v-for="(question, index) in questions"
      :key="index"
      v-show="question.hidden == 0"
      :question="question"
    />
  </dl>
</template>

<script>
export default {
  props: {
    questions: {
      type: String,
      required: true,
    },
  },
};
</script>
