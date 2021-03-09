<template>
  <title-component after="FAQ"></title-component>

  <header-component />

  <side-nav-component />
  <sidebar-overlay />

  <hero-component page-title="FAQ" :uppercase="true" />

  <div>
    <div class="w-full rounded-full md:px-4 lg:px-8 md:py-14 sm:px-2 sm:py-2">
      <div class="shadow-md">
        <div
          class="tab w-full overflow-hidden border-t"
          v-for="(faq, index) in faqs"
          :key="index"
        >
          <input
            class="absolute opacity-0"
            :id="$slugify(faq.question)"
            type="radio"
            name="tabs2"
          />
          <label
            class="block p-3 leading-normal cursor-pointer"
            :for="$slugify(faq.question)"
            v-text="faq.question"
          ></label>
          <div
            class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal"
          >
            <p class="p-2" v-text="faq.answer"></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <news-letter-component />

  <footer-component />
</template>

<script>
export default {
  data() {
    return {
      active: false,
      faqs: [
        {
          question: "Tailwind CSS is awesome!",
          answer:
            "Tailwind CSS is a highly customizable, low-level CSS framework that gives you all of the building blocks you need to build bespoke designs without any annoying opinionated styles you have to fight to override.",
        },
        {
          question: "Vue.js too!",
          answer:
            "Vue is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is easy to pick up and integrate with other libraries or existing projects. On the other hand, Vue is also perfectly capable of powering sophisticated Single-Page Applications when used in combination with modern tooling and supporting libraries.",
        },
        {
          question: "Download VueTailwindAccordion on NPM now!",
          answer:
            "Relied upon by more than 11 million developers worldwide, npm is committed to making JavaScript development elegant, productive, and safe. The free npm Registry has become the center of JavaScript code sharing, and with more than one million packages, the largest software registry in the world. Our other tools and services take the Registry, and the work you do around it, to the next level. ",
        },
      ],
    };
  },

  provide() {
    return {
      user: this.$attrs.auth.user,
      settings: this.$attrs.settings,
      breadcrumbs: this.$attrs.breadcrumbs,
    };
  },

  mounted() {
    var myRadios = document.getElementsByName("tabs2");
    var setCheck;
    var x = 0;
    for (x = 0; x < myRadios.length; x++) {
      myRadios[x].onclick = function () {
        if (setCheck != this) {
          setCheck = this;
        } else {
          this.checked = false;
          setCheck = null;
        }
      };
    }
  },
};
</script>

<style scoped>
/* Tab content - closed */
.tab-content {
  max-height: 0;
  -webkit-transition: max-height 0.35s;
  -o-transition: max-height 0.35s;
  transition: max-height 0.35s;
}
/* :checked - resize to full height */
.tab input:checked ~ .tab-content {
  max-height: 100vh;
}
/* Label formatting when open */
.tab input:checked + label {
  /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
  font-size: 1.25rem; /*.text-xl*/
  padding: 0.625rem; /*.p-2.5*/
  border-left-width: 2px; /*.border-l-2*/
  border-color: #6574cd; /*.border-indigo*/
  background-color: #f8fafc; /*.bg-gray-100 */
  color: #6574cd; /*.text-indigo*/
}
/* Icon */
.tab label::after {
  float: right;
  right: 0;
  top: 0;
  display: block;
  width: 1.5em;
  height: 1.5em;
  line-height: 1.5;
  font-size: 1.25rem;
  text-align: center;
  -webkit-transition: all 0.35s;
  -o-transition: all 0.35s;
  transition: all 0.35s;
}
/* Icon formatting - closed */
.tab input[type="checkbox"] + label::after {
  content: "+";
  font-weight: bold; /*.font-bold*/
  border-width: 1px; /*.border*/
  border-radius: 9999px; /*.rounded-full */
  border-color: #b8c2cc; /*.border-grey*/
}
.tab input[type="radio"] + label::after {
  content: "\25BE";
  font-weight: bold; /*.font-bold*/
  border-width: 1px; /*.border*/
  border-radius: 9999px; /*.rounded-full */
  border-color: #b8c2cc; /*.border-grey*/
}
/* Icon formatting - open */
.tab input[type="checkbox"]:checked + label::after {
  transform: rotate(315deg);
  background-color: #6574cd; /*.bg-indigo*/
  color: #f8fafc; /*.text-grey-lightest*/
}
.tab input[type="radio"]:checked + label::after {
  transform: rotateX(180deg);
  background-color: #6574cd; /*.bg-indigo*/
  color: #f8fafc; /*.text-grey-lightest*/
}
</style>
