<template>
  <title-component after="FAQ"></title-component>

  <header-component />

  <side-nav-component />
  <sidebar-overlay />

  <hero-component page-title="FAQ" :uppercase="true" />

  <div
    class="w-full rounded-full sm:px-4 sm:py-4 md:px-4 md:py-8 lg:px-8 py-8"
  >
    <div class="shadow-md">
      <div
        class="tab w-full overflow-hidden border-t"
        v-for="(faq, index) in $attrs.faqs"
        :key="index"
      >
        <input
          class="absolute opacity-0"
          :id="$slugify(faq.title)"
          type="radio"
          name="tabs2"
        />
        <label
          class="block p-3 leading-normal cursor-pointer"
          :for="$slugify(faq.title)"
          v-text="faq.title"
        ></label>
        <div
          class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal"
        >
          <p class="p-2" v-html="faq.body"></p>
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
