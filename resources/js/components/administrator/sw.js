import {
    cleanupOutdatedCaches,
    precacheAndRoute,
    createHandlerBoundToURL,
} from "workbox-precaching";

const manifest = self.__WB_MANIFEST;

cleanupOutdatedCaches();
precacheAndRoute(manifest);

import { clientsClaim } from "workbox-core";

self.skipWaiting();
clientsClaim();

import { registerRoute, Route, NavigationRoute } from "workbox-routing";
import { NetworkFirst, StaleWhileRevalidate } from "workbox-strategies";


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
