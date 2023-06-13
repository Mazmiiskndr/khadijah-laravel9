import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/js/frontend.js",
                "resources/css/app.css",
                "resources/css/backend.css",
                "resources/css/frontend.css",
            ],
            output: "public", // folder output
            refresh: true,
            minify: process.env.NODE_ENV === "production", // minify hanya jika di environment production
        }),
    ],
});
