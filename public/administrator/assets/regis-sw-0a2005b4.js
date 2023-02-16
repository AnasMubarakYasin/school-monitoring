import{c as x}from"./lib-3547cf2e.js";import{D as k}from"./index-c70d8983.js";try{self["workbox:window:6.5.3"]&&_()}catch{}function E(e,r){return new Promise(function(t){var o=new MessageChannel;o.port1.onmessage=function(d){t(d.data)},e.postMessage(r,[o.port2])})}function L(e,r){for(var t=0;t<r.length;t++){var o=r[t];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}function S(e,r){(r==null||r>e.length)&&(r=e.length);for(var t=0,o=new Array(r);t<r;t++)o[t]=e[t];return o}function P(e,r){var t;if(typeof Symbol>"u"||e[Symbol.iterator]==null){if(Array.isArray(e)||(t=function(d,g){if(d){if(typeof d=="string")return S(d,g);var v=Object.prototype.toString.call(d).slice(8,-1);return v==="Object"&&d.constructor&&(v=d.constructor.name),v==="Map"||v==="Set"?Array.from(d):v==="Arguments"||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(v)?S(d,g):void 0}}(e))||r&&e&&typeof e.length=="number"){t&&(e=t);var o=0;return function(){return o>=e.length?{done:!0}:{done:!1,value:e[o++]}}}throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}return(t=e[Symbol.iterator]()).next.bind(t)}try{self["workbox:core:6.5.3"]&&_()}catch{}var w=function(){var e=this;this.promise=new Promise(function(r,t){e.resolve=r,e.reject=t})};function y(e,r){var t=location.href;return new URL(e,t).href===new URL(r,t).href}var h=function(e,r){this.type=e,Object.assign(this,r)};function p(e,r,t){return t?r?r(e):e:(e&&e.then||(e=Promise.resolve(e)),r?e.then(r):e)}function W(){}var A={type:"SKIP_WAITING"};function j(e,r){if(!r)return e&&e.then?e.then(W):Promise.resolve()}var I=function(e){var r,t;function o(u,l){var n,i;return l===void 0&&(l={}),(n=e.call(this)||this).nn={},n.tn=0,n.rn=new w,n.en=new w,n.on=new w,n.un=0,n.an=new Set,n.cn=function(){var s=n.fn,a=s.installing;n.tn>0||!y(a.scriptURL,n.sn.toString())||performance.now()>n.un+6e4?(n.vn=a,s.removeEventListener("updatefound",n.cn)):(n.hn=a,n.an.add(a),n.rn.resolve(a)),++n.tn,a.addEventListener("statechange",n.ln)},n.ln=function(s){var a=n.fn,c=s.target,f=c.state,m=c===n.vn,b={sw:c,isExternal:m,originalEvent:s};!m&&n.mn&&(b.isUpdate=!0),n.dispatchEvent(new h(f,b)),f==="installed"?n.wn=self.setTimeout(function(){f==="installed"&&a.waiting===c&&n.dispatchEvent(new h("waiting",b))},200):f==="activating"&&(clearTimeout(n.wn),m||n.en.resolve(c))},n.dn=function(s){var a=n.hn,c=a!==navigator.serviceWorker.controller;n.dispatchEvent(new h("controlling",{isExternal:c,originalEvent:s,sw:a,isUpdate:n.mn})),c||n.on.resolve(a)},n.gn=(i=function(s){var a=s.data,c=s.ports,f=s.source;return p(n.getSW(),function(){n.an.has(f)&&n.dispatchEvent(new h("message",{data:a,originalEvent:s,ports:c,sw:f}))})},function(){for(var s=[],a=0;a<arguments.length;a++)s[a]=arguments[a];try{return Promise.resolve(i.apply(this,s))}catch(c){return Promise.reject(c)}}),n.sn=u,n.nn=l,navigator.serviceWorker.addEventListener("message",n.gn),n}t=e,(r=o).prototype=Object.create(t.prototype),r.prototype.constructor=r,r.__proto__=t;var d,g,v=o.prototype;return v.register=function(u){var l=(u===void 0?{}:u).immediate,n=l!==void 0&&l;try{var i=this;return function(s,a){var c=s();return c&&c.then?c.then(a):a(c)}(function(){if(!n&&document.readyState!=="complete")return j(new Promise(function(s){return window.addEventListener("load",s)}))},function(){return i.mn=Boolean(navigator.serviceWorker.controller),i.yn=i.pn(),p(i.bn(),function(s){i.fn=s,i.yn&&(i.hn=i.yn,i.en.resolve(i.yn),i.on.resolve(i.yn),i.yn.addEventListener("statechange",i.ln,{once:!0}));var a=i.fn.waiting;return a&&y(a.scriptURL,i.sn.toString())&&(i.hn=a,Promise.resolve().then(function(){i.dispatchEvent(new h("waiting",{sw:a,wasWaitingBeforeRegister:!0}))}).then(function(){})),i.hn&&(i.rn.resolve(i.hn),i.an.add(i.hn)),i.fn.addEventListener("updatefound",i.cn),navigator.serviceWorker.addEventListener("controllerchange",i.dn),i.fn})})}catch(s){return Promise.reject(s)}},v.update=function(){try{return this.fn?j(this.fn.update()):void 0}catch(u){return Promise.reject(u)}},v.getSW=function(){return this.hn!==void 0?Promise.resolve(this.hn):this.rn.promise},v.messageSW=function(u){try{return p(this.getSW(),function(l){return E(l,u)})}catch(l){return Promise.reject(l)}},v.messageSkipWaiting=function(){this.fn&&this.fn.waiting&&E(this.fn.waiting,A)},v.pn=function(){var u=navigator.serviceWorker.controller;return u&&y(u.scriptURL,this.sn.toString())?u:void 0},v.bn=function(){try{var u=this;return function(l,n){try{var i=l()}catch(s){return n(s)}return i&&i.then?i.then(void 0,n):i}(function(){return p(navigator.serviceWorker.register(u.sn,u.nn),function(l){return u.un=performance.now(),l})},function(l){throw l})}catch(l){return Promise.reject(l)}},d=o,(g=[{key:"active",get:function(){return this.en.promise}},{key:"controlling",get:function(){return this.on.promise}}])&&L(d.prototype,g),o}(function(){function e(){this.Pn=new Map}var r=e.prototype;return r.addEventListener=function(t,o){this.Sn(t).add(o)},r.removeEventListener=function(t,o){this.Sn(t).delete(o)},r.dispatchEvent=function(t){t.target=this;for(var o,d=P(this.Sn(t.type));!(o=d()).done;)(0,o.value)(t)},r.Sn=function(t){return this.Pn.has(t)||this.Pn.set(t,new Set),this.Pn.get(t)},e}());if("serviceWorker"in navigator){const e=new I("/administrator/sw.js",{type:"module",scope:"/administrator/"});e.addEventListener("waiting",r=>{e.addEventListener("controlling",d=>{window.location.reload()});const t=x(M()),o=new k(t,t.querySelector("#close-btn"));document.getElementById("main").prepend(t),t.querySelector("#update-btn").addEventListener("click",()=>{e.messageSkipWaiting(),o.hide()})}),window.addEventListener("beforeinstallprompt",r=>{r.preventDefault();const t=x(U()),o=new k(t,t.querySelector("#close-btn"));document.getElementById("main").prepend(t),t.querySelector("#install-btn").addEventListener("click",()=>{r.prompt(),o.hide()})}),e.register({immediate:!0}).then(r=>{})}function U(){return`
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
    `}function M(){return`
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
