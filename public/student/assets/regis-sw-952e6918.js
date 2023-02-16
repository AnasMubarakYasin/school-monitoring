import{v as c}from"./workbox-window.prod.es5-8f11f700.js";import{c as s,u as g}from"./lib-c0c25e73.js";import{D as l}from"./index-c70d8983.js";import{a as d}from"./axios-bff3f665.js";if("serviceWorker"in navigator){let a=!1;const o=new c("/student/sw.js",{type:"module",scope:"/student/"});window.addEventListener("beforeinstallprompt",r=>{r.preventDefault();const e=s(p()),t=new l(e,e.querySelector("#close-btn"));a=!0,document.getElementById("main").prepend(e),e.querySelector("#install-btn").addEventListener("click",()=>{r.prompt(),t.hide()})}),o.addEventListener("waiting",r=>{o.addEventListener("controlling",i=>{window.location.reload()});const e=s(f()),t=new l(e,e.querySelector("#close-btn"),{onHide(){a&&(document.getElementById("prompt-install").style.display="block")}});a&&(document.getElementById("prompt-install").style.display="none"),document.getElementById("main").prepend(e),e.querySelector("#update-btn").addEventListener("click",()=>{o.messageSkipWaiting(),t.hide()})}),o.register({immediate:!0}).then(async r=>{console.log(await d.get("/api/webpush/pkey"));const e=await r.pushManager.getSubscription();if(console.log(e),!e){const t=await d.get("/api/webpush/pkey"),i=g(t.data);let n=null;try{n=await r.pushManager.subscribe({userVisibleOnly:!1,applicationServerKey:i})}catch(u){u.message=="Registration failed - permission denied"&&(n=await r.pushManager.subscribe({userVisibleOnly:!0,applicationServerKey:i}))}n&&(console.log(n),await d.post("/api/webpush/subscribe",n))}if("Notification"in window&&Notification.permission!="granted"){const t=s(b()),i=new l(t,t.querySelector("#allow-btn"));document.getElementById("main").prepend(t),t.querySelector("#allow-btn").addEventListener("click",()=>{Notification.requestPermission(),i.hide()})}})}function b(){return`
        <div
            id="prompt-notification"
            class="w-full fixed bottom-5 right-5 max-w-xs p-4 text-gray-500 bg-white rounded-lg drop-shadow-xl dark:bg-gray-800 dark:text-gray-400"
            role="alert"
        >
            <div class="flex">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                </svg>
                    <span class="sr-only">Refresh icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">
                    <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">
                        Allow Receive Notification
                    </span>
                    <div class="mb-2 text-sm font-normal">
                        This site can show important message from notification.
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <button
                                id="allow-btn"
                                class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"
                            >
                                Allow
                            </button>
                        </div>
                        <div>
                            <button
                                id="close-btn"
                                class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700"
                            >
                                Not now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `}function p(){return`
        <div
            id="prompt-install"
            class="w-full fixed bottom-5 right-5 max-w-xs p-4 text-gray-500 bg-white rounded-lg drop-shadow-xl dark:bg-gray-800 dark:text-gray-400"
            role="alert"
        >
            <div class="flex">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="w-5 h-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25"
                        />
                    </svg>
                    <span class="sr-only">Refresh icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">
                    <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">
                        Install School Monitoring
                    </span>
                    <div class="mb-2 text-sm font-normal">
                        This site can be installed as an application.
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <button
                                id="install-btn"
                                class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"
                            >
                                Install
                            </button>
                        </div>
                        <div>
                            <button
                                id="close-btn"
                                class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700"
                            >
                                Not now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `}function f(){return`
        <div
            id="prompt-update"
            class="w-full fixed bottom-5 right-5 max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-xl dark:bg-gray-800 dark:text-gray-400"
            role="alert"
        >
            <div class="flex">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                    <svg
                        aria-hidden="true"
                        class="w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="sr-only">Refresh icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">
                    <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">
                        Update available
                    </span>
                    <div class="mb-2 text-sm font-normal">
                        A new software version is available for download.
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <button
                                id="update-btn"
                                class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"
                            >
                                Update
                            </button>
                        </div>
                        <div>
                            <button
                                id="close-btn"
                                class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700"
                            >
                                Not now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `}
