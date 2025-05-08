import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import { createApp } from "vue";
import { setDefaultHeaders, setDefaultBaseUrl } from "@/utils/fetchJson.js";
import App from "./App.vue";

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

const myApp = createApp(App);
myApp.mount("#app");
