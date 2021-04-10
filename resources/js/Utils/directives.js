export default {
    reactive(app) {
        app.directive("reactive", {
            beforeMount(el, binding, vNode, oldVnode) {
                // console.log(el);
                // Set the value of the element to incoming
                el.value = binding.value;
            },
            beforeUpdate(el, binding, vNode, oldVnode) {
                el.value = binding.value;
                console.log(binding);
                console.log(binding.instance.$emit);
                binding.instance.$emit("hello");
            },
            updated(el, binding, vNode, oldVnode) {
                el.value = binding.value;
                console.log(binding);
            },
            beforeUnmount(el, binding) {},
        });
    },

    clickOutside(app) {
        app.directive("click-outside", {
            mounted(el, binding, vNode, oldVnode) {
                // Provided expression must evaluate to a function.
                if (typeof binding.value !== "function") {
                    const compName = binding.instance.name;
                    let warn = `[Vue-click-outside:] provided expression '${binding.expression}' is not a Function!`;
                    if (compName) {
                        warn += `Found in component '${compName}'`;
                    }

                    console.warn(warn);
                }
                // Define Handler and cache it on the element
                const bubble = binding.modifiers.bubble;
                const handler = (e) => {
                    if (bubble || !(el == e.target || el.contains(e.target))) {
                        if (typeof binding.value === "function")
                            binding.value(e);
                        return binding.value;
                    }
                };
                el.__vueClickOutside__ = handler;

                // add Event Listeners
                document.addEventListener("click", handler);
            },

            beforeUnmount(el, binding) {
                // Remove Event Listeners
                document.removeEventListener("click", el.__vueClickOutside__);
                el.__vueClickOutside__ = null;
            },
        });
    },

    switchColor(app) {
        app.directive("switch-color", {
            beforeMount(el, binding, vNode, oldVnode) {
                const colors = binding.value;

                if (!colors.length) return;

                let i = 0;
                let duration = binding.modifiers.short
                    ? 800
                    : binding.modifiers.long
                    ? 2500
                    : 500;
                setInterval(() => {
                    el.style.color = colors[i++];
                    if (i > colors.length - 1) i = 0;
                }, duration);
            },
        });
    },
};
