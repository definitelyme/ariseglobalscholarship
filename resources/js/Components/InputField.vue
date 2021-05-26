<template>
  <input
    :class="clazz"
    :type="type"
    :name="name"
    :id="id"
    :autocomplete="autocomplete"
    :required="required"
    :value="value"
    @input="
      $emitValue(
        `update:${modelName}`,
        $event.target.value,
        $attrs[`${modelName}Modifiers`]
      )
    "
  />
</template>

<script>
export default {
  props: {
    value: String,

    clazz: {
      type: String,
      required: false,
      default: () =>
        "text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
    },

    modelName: String,

    name: {
      type: String,
      required: true,
    },

    id: {
      type: String,
      required: false,
    },

    type: {
      type: String,
      required: false,
      default: () => "text",
    },

    required: {
      type: Boolean,
      required: false,
      default: () => false,
    },

    autocomplete: {
      type: [Boolean, String],
      required: false,
      default: () => false,
    },
  },

  mounted() {
    // console.log(this.$attrs[`${this.modelName}Modifiers`]);
  },
};
</script>
