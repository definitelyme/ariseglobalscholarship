<template>
  <dl
    class="my-10 lg:my-16 max-w-screen-md lg:max-w-screen-xl flex flex-col lg:flex-row lg:flex-wrap lg:mx-16"
    v-if="!withTitle"
  >
    <faq-tab
      v-for="(question, index) in questions"
      :key="index"
      v-show="question.hidden == 0"
      :question="question"
    />
  </dl>

  <section class="about-us-section py-0" v-if="withTitle">
    <div class="container">
      <div class="section-title text-center">
        <h3 class="sm:pb-2 md:pb-4 lg:pb-6 xl:pb-6">
          Frequently asked questions
        </h3>

        <dl
          class="mt-0 mb-10 lg:my-16 max-w-screen-md lg:max-w-screen-xl flex flex-col lg:flex-row lg:flex-wrap"
        >
          <faq-tab
            v-for="(question, index) in questions"
            :key="index"
            v-show="question.hidden == 0"
            :question="question"
            :with-title="withTitle"
          />
        </dl>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    questions: {
      type: String,
      required: true,
    },

    withTitle: {
      type: Boolean,
      required: false,
      default: () => false,
    },
  },
};
</script>
