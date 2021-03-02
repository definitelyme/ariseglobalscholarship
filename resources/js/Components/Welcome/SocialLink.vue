<template>
  <li>
    <a :href="url" :title="linkTitle" target="_blank"
      ><i class="fab" :class="klazz"></i
    ></a>
  </li>
</template>

<script>
export default {
  props: {
    url: String,
    linkTitle: String,
    klazz: String,
  },
};
</script>
