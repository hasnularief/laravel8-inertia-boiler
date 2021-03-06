require("./bootstrap");

// Import modules...
import { createApp, h } from "vue";
import GlobalMixin from "./Mixins/Global";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

const el = document.getElementById("app");

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
            resolveErrors: (page) => page.props.errors || {},
        }),
})
    .mixin({ methods: { route } })
    .mixin(GlobalMixin)
    .use(InertiaPlugin);

app.mount(el);

InertiaProgress.init({ color: "#4B5563" });
