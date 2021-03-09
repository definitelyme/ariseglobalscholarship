<template>
  <teleport to="head">
    <title>
      {{ `${$before || $app_name_short} ${seperator} ${after}` }}
    </title>
  </teleport>
</template>

<script>
export default {
  props: {
    before: {
      type: String,
      required: false,
    },

    seperator: {
      type: String,
      required: false,
      default: () => "|",
    },

    after: {
      type: String,
      required: true,
    },
  },
};
</script>
