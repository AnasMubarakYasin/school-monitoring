import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { fdir } from "fdir";

const css = new fdir().withFullPaths().crawl("resources/css").sync();
const js = new fdir().withFullPaths().crawl("resources/js").sync();

export default defineConfig({
    plugins: [
        laravel({
            input: [...css, ...js],
            refresh: true,
        }),
    ],
});
