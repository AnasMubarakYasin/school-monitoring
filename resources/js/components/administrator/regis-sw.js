// import { pwaInfo } from 'virtual:pwa-info'
// import { registerSW } from 'virtual:pwa-register'

// console.log(pwaInfo);

// const updateSW = registerSW({
//     immediate: true,
//     onNeedRefresh: () => {
//         console.log('onNeedRefresh')
//     },
//     onOfflineReady: () => {
//         console.log('onOfflineReady')
//     },
//     onRegisteredSW: (url, registration) => {
//         console.log('onRegisteredSW')
//         console.log(url, registration)
//     },
//     onRegisterError: (error) => {
//         console.log('onRegisterError')
//         console.error(error)
//     },
// })

import { Workbox } from "workbox-window";

if ("serviceWorker" in navigator) {
    const wb = new Workbox("/build/sw.js", {
        type: "module",
    });

    wb.register();
}
