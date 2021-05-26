require("./bootstrap");

// Import modules...
import { createApp, h } from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { registerComponents } from "./Utils/component-registration";
// import VueScreen from "vue-screen";

// Plugins...
import { utils } from "./Utils/helpers";
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
    .use(utils)
    .use(VueTheMask)
    // .use(VueScreen)
    .use(InertiaPlugin);

// Register Components
registerComponents(app);

// Mount Vue Application
app.mount(el);

// Set Inertia Progress Indicator
InertiaProgress.init({
    color: "#eb2d33",
    includeCSS: true,
    showSpinner: false,
});
