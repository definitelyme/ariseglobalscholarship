export default {
    reactive(app) {
        app.directive("reactive", {
            //E.G: v-reactive:form:firstName:email.lastName="form.firstName"
            beforeMount(el, binding, vNode, oldVnode) {
                // Set the value of the element to incoming
                el.value = binding.value;
            },
            updated(el, binding, vNode, oldVnode) {
                // binding.instance.$emit("input", el.value);
                console.log(binding);
                // binding.instance["form"]["firstName"] = "Solomon";

                const handler = (e) => {
                    // el.value = e.data;
                    binding.instance.$emit("update:firstName", e.data);
                    binding.instance.$emit("update", e.data);
                };

                el.addEventListener("input", handler);

                // console.log(el);
                // binding.instance.$emitter.emit(
                //     binding.instance.$events.tester,
                //     el.value
                // );
            },
        });
    },

    clickOutside(app) {
        app.directive("click-outside", {
            mounted(el, binding, vNode, oldVnode) {
                // Provided expression must evaluate to a function.
                if (typeof binding.value !== "function") {
                    const compName = binding.instance.name;
                    let warn = `[Vue-click-outside:] provided expression '${binding.value}' is not a Function!`;
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
