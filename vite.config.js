import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: "localhost",
        },
    },
    plugins: [
        laravel({
            input: ["resources/sass/style.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
