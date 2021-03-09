<template>
  <section class="pager-section">
    <div class="container">
      <div class="pager-content text-center">
        <h2 v-text="pageTitle"></h2>
        <ul>
          <li v-for="(breadcrumb, index) in breadcrumbs" :key="index">
            <span v-if="breadcrumb != breadcrumbs[breadcrumbs.length - 1]"
              ><a
                :href="`/${breadcrumb}`"
                :title="$titleCase($replace(breadcrumb, ' '))"
                >{{ $titleCase($replace(breadcrumb, " ")) }}</a
              ></span
            >

            <span
              v-else
              :style="{ 'text-transform': uppercase ? 'uppercase' : '' }"
              >{{ $titleCase($replace(breadcrumb, " ")) }}</span
            >
          </li>
        </ul>
      </div>
      <h2 class="page-titlee">{{ $app_initials }}</h2>
    </div>
  </section>
</template>

<script>
export default {
  inject: ["breadcrumbs"],
  props: {
    pageTitle: {
      type: String,
      required: true,
    },
    uppercase: {
      type: Boolean,
      required: false,
      default: () => false,
    },
  },
};
</script>
