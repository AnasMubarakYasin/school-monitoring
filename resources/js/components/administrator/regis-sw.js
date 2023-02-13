import { Workbox } from "workbox-window";
import { create_element } from "../../lib";
import { Dismiss } from "flowbite";

if ("serviceWorker" in navigator) {
    let prompted_install = false;
    let prompted_update = false;
    const wb = new Workbox("/administrator/sw.js", {
        type: "module",
        scope: "/administrator/",
    });
    wb.addEventListener("waiting", (event) => {
        // console.log(event);
        wb.addEventListener("controlling", (event) => {
            // console.log(event);
            window.location.reload();
        });
        const toast = create_element(template_prompt_update());
        const dismiss = new Dismiss(toast, toast.querySelector("#close-btn"));

        prompted_update = true;
        document.getElementById("main").prepend(toast);
        toast.querySelector("#update-btn").addEventListener("click", () => {
            wb.messageSkipWaiting();
            dismiss.hide();
        });
        // setTimeout(() => {
        //     prompted_update = false;
        //     dismiss.hide();
        // }, 3000);
    });
    window.addEventListener("beforeinstallprompt", (event) => {
        event.preventDefault();
        const toast = create_element(template_prompt_install());
        const dismiss = new Dismiss(toast, toast.querySelector("#close-btn"));

        prompted_install = true;
        document.getElementById("main").prepend(toast);
        toast.querySelector("#install-btn").addEventListener("click", () => {
            event.prompt();
            dismiss.hide();
        });
        // setTimeout(() => {
        //     prompted_install = false;
        //     dismiss.hide();
        // }, 5000);
    });
    wb.register({ immediate: true }).then((swr) => {
        // console.log(swr);
    });
}
function template_prompt_install() {
    return `
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
    `;
}
function template_prompt_update() {
    return `
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
    `;
}
