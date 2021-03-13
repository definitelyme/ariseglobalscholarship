require("./bootstrap");

// Import modules...
import { createApp, h } from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue3";
import Helpers from "./Utils/helpers";
import { InertiaProgress } from "@inertiajs/progress";
import { registerComponents } from "./Utils/component-registration";
import VueTheMask from "vue-the-mask";

const el = document.getElementById("app");

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(Helpers)
    .use(VueTheMask)
    .use(InertiaPlugin);

// Register Components
registerComponents(app);

// Mount Vue Application
app.mount(el);

// Set Inertia Progress Indicator
InertiaProgress.init({ color: "#4B5563" });
