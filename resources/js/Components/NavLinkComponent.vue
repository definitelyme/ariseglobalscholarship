<template>
  <inertia-link :class="active ? 'active' : ''" @click="action">
    <slot />
  </inertia-link>
</template>

<script>
export default {
  props: {
    active: {
      type: Boolean,
      required: false,
    },
    action: {
      required: false,
      default: () => {},
    },
  },
};
</script>
