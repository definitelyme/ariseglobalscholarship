<template>
  <div
    :class="clazz"
    :style="
      `text-align: ${alignment};` +
      (maxWidth
        ? ` flex: 0 0 ${maxWidth.includes('%') ? maxWidth : maxWidth + `%`};`
        : '') +
      (maxWidth
        ? ` max-width: ${maxWidth.includes('%') ? maxWidth : maxWidth + `%`};`
        : '')
    "
  >
    <inertia-link
      :href="url"
      :title="value"
      :class="`btn btn-` + type"
      :style="`${btnHeight} ${btnFontSize} ${btnFontWeight} ${btnBorderRadius} ${
        btnBackgroundColor.length
          ? `background-color: ${btnBackgroundColor}`
          : ''
      } ${btnPadding}`"
      replace
      preserve-scroll
      >{{ value
      }}<i
        :class="`${
          icon.length ? (icon.includes('fa-') ? `fa ${icon}` : icon) : ''
        }`"
        :style="`${
          btnBackgroundColor.length ? `color: ${btnBackgroundColor}` : ''
        }`"
        v-if="icon.length"
      ></i
    ></inertia-link>
  </div>
</template>

<script>
const numberRegEx = /(\d+)/;

export default {
  data() {
    return {
      //
    };
  },
  props: {
    alignment: {
      type: String,
      required: false,
      default: () => "center",
    },
    clazz: {
      type: String,
      required: false,
    },
    maxWidth: {
      type: String,
      required: false,
    },
    value: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      required: false,
      default: () => "fa-long-arrow-alt-right",
    },
    iconVisible: {
      type: Boolean,
      required: true,
    },
    type: {
      type: String,
      required: false,
      default: () => "default",
    },
    url: {
      type: String,
      required: false,
      default: () => "#",
    },
    height: {
      type: String,
      required: false,
    },
    fontSize: {
      type: String,
      required: false,
    },
    fontWeight: {
      type: String,
      required: false,
    },
    backgroundColor: {
      type: String,
      required: false,
    },
    borderRadius: {
      type: String,
      required: false,
    },
    padding: {
      type: String,
      required: false,
    },
  },

  computed: {
    btnHeight() {
      if (this.height) {
        // Get only digits from prop
        var actualHeight = this.height.match(numberRegEx)[0];
        return `height: ${actualHeight}px; line-height: ${actualHeight}px;`;
      }
      return "";
    },
    btnFontSize() {
      if (this.fontSize) {
        var actualFontSize = this.fontSize.match(numberRegEx)[0];
        return `font-size: ${actualFontSize}px;`;
      }
      return "";
    },
    btnFontWeight() {
      if (this.fontWeight) {
        var actualFontWeight = this.fontWeight.match(numberRegEx)[0];
        return `font-weight: ${actualFontWeight};`;
      }
      return "";
    },
    btnBorderRadius() {
      if (this.borderRadius) {
        var actualBorderRadius = this.borderRadius.match(numberRegEx)[0];
        return `border-radius: ${actualBorderRadius}px;`;
      }
      return "";
    },
    btnPadding() {
      if (this.padding) {
        var actualPadding = this.padding.match(numberRegEx)[0];
        return `padding-left: ${actualPadding}px; padding-right: ${actualPadding}px;`;
      }
      return "";
    },
    btnBackgroundColor() {
      if (this.backgroundColor) {
        var actualBackgroundColor = this.backgroundColor.includes("#")
          ? this.backgroundColor.slice(this.backgroundColor.indexOf("#") + 1)
          : this.backgroundColor;
        return `#${actualBackgroundColor};`;
      }
      return "";
    },
  },
};
</script>
