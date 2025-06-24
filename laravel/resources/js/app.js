import "../css/app.css";
import "./bootstrap";
import Alpine from "alpinejs";
import { setDefaultHeaders, setDefaultBaseUrl } from "@/utils/fetchJson.js";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

window.Alpine = Alpine;
Alpine.start();

// Headers globaux CSRF + base URL API
const csrfToken =
    document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content") ?? "";
setDefaultHeaders({ "X-CSRF-TOKEN": csrfToken });

const urlApi =
    document
        .querySelector('meta[name="api-base-url"]')
        ?.getAttribute("content") ?? "";
setDefaultBaseUrl(urlApi);

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
