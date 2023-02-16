import {
    cleanupOutdatedCaches,
    precacheAndRoute,
    matchPrecache,
    createHandlerBoundToURL,
} from "workbox-precaching";

const manifest = self.__WB_MANIFEST;
const fallback_document = "/student/offline";

cleanupOutdatedCaches();
precacheAndRoute(manifest);

// console.log(manifest);

import { clientsClaim } from "workbox-core";

// clientsClaim();
self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
        self.skipWaiting();
    }
});

import { offlineFallback } from "workbox-recipes";
import {
    setDefaultHandler,
    setCatchHandler,
    registerRoute,
    Route,
} from "workbox-routing";
import {
    NetworkFirst,
    NetworkOnly,
    StaleWhileRevalidate,
} from "workbox-strategies";

// Handle documents:
const documentRoute = new Route(
    ({ request }) => {
        return request.destination === "document";
    },
    new NetworkFirst({
        cacheName: "documents",
    })
);

// Handle images:
const imageRoute = new Route(
    ({ request }) => {
        return request.destination === "image";
    },
    new NetworkFirst({
        cacheName: "images",
    })
);

// Handle scripts:
const scriptsRoute = new Route(
    ({ request }) => {
        return request.destination === "script";
    },
    new StaleWhileRevalidate({
        cacheName: "scripts",
    })
);

// Handle styles:
const stylesRoute = new Route(
    ({ request }) => {
        return request.destination === "style";
    },
    new StaleWhileRevalidate({
        cacheName: "styles",
    })
);

// Register routes
registerRoute(documentRoute);
registerRoute(imageRoute);
registerRoute(scriptsRoute);
registerRoute(stylesRoute);

// This "catch" handler is triggered when any of the other routes fail to
// generate a response.
setCatchHandler(async ({ request }) => {
    // Fallback assets are precached when the service worker is installed, and are
    // served in the event of an error below. Use `event`, `request`, and `url` to
    // figure out how to respond, or use request.destination to match requests for
    // specific resource types.
    switch (request.destination) {
        case "document":
            // FALLBACK_HTML_URL must be defined as a precached URL for this to work:
            return matchPrecache(fallback_document);
        default:
            // If we don't have a fallback, return an error response.
            return Response.error();
    }
});
