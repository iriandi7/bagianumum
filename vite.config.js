import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/rt-plugins.css",
                "resources/css/sidebar-menu.css",
                "resources/css/app.css",

                "node_modules/tinymce/tinymce.min.js",
            ],
            refresh: true,
        }),
    ],
});
