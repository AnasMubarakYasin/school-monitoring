try{self["workbox:core:6.5.3"]&&_()}catch{}const G=(s,...e)=>{let t=s;return e.length>0&&(t+=` :: ${JSON.stringify(e)}`),t},Q=G;class h extends Error{constructor(e,t){const n=Q(e,t);super(n),this.name=e,this.details=t}}const f={googleAnalytics:"googleAnalytics",precache:"precache-v2",prefix:"workbox",runtime:"runtime",suffix:typeof registration<"u"?registration.scope:""},P=s=>[f.prefix,s,f.suffix].filter(e=>e&&e.length>0).join("-"),z=s=>{for(const e of Object.keys(f))s(e)},k={updateDetails:s=>{z(e=>{typeof s[e]=="string"&&(f[e]=s[e])})},getGoogleAnalyticsName:s=>s||P(f.googleAnalytics),getPrecacheName:s=>s||P(f.precache),getPrefix:()=>f.prefix,getRuntimeName:s=>s||P(f.runtime),getSuffix:()=>f.suffix};function v(s,e){const t=e();return s.waitUntil(t),t}try{self["workbox:precaching:6.5.3"]&&_()}catch{}const J="__WB_REVISION__";function X(s){if(!s)throw new h("add-to-cache-list-unexpected-type",{entry:s});if(typeof s=="string"){const c=new URL(s,location.href);return{cacheKey:c.href,url:c.href}}const{revision:e,url:t}=s;if(!t)throw new h("add-to-cache-list-unexpected-type",{entry:s});if(!e){const c=new URL(t,location.href);return{cacheKey:c.href,url:c.href}}const n=new URL(t,location.href),r=new URL(t,location.href);return n.searchParams.set(J,e),{cacheKey:n.href,url:r.href}}class Y{constructor(){this.updatedURLs=[],this.notUpdatedURLs=[],this.handlerWillStart=async({request:e,state:t})=>{t&&(t.originalRequest=e)},this.cachedResponseWillBeUsed=async({event:e,state:t,cachedResponse:n})=>{if(e.type==="install"&&t&&t.originalRequest&&t.originalRequest instanceof Request){const r=t.originalRequest.url;n?this.notUpdatedURLs.push(r):this.updatedURLs.push(r)}return n}}}class Z{constructor({precacheController:e}){this.cacheKeyWillBeUsed=async({request:t,params:n})=>{const r=(n==null?void 0:n.cacheKey)||this._precacheController.getCacheKeyForURL(t.url);return r?new Request(r,{headers:t.headers}):t},this._precacheController=e}}let w;function ee(){if(w===void 0){const s=new Response("");if("body"in s)try{new Response(s.body),w=!0}catch{w=!1}w=!1}return w}async function te(s,e){let t=null;if(s.url&&(t=new URL(s.url).origin),t!==self.location.origin)throw new h("cross-origin-copy-response",{origin:t});const n=s.clone(),r={headers:new Headers(n.headers),status:n.status,statusText:n.statusText},c=e?e(r):r,a=ee()?n.body:await n.blob();return new Response(a,c)}const se=s=>new URL(String(s),location.href).href.replace(new RegExp(`^${location.origin}`),"");function O(s,e){const t=new URL(s);for(const n of e)t.searchParams.delete(n);return t.href}async function ne(s,e,t,n){const r=O(e.url,t);if(e.url===r)return s.match(e,n);const c=Object.assign(Object.assign({},n),{ignoreSearch:!0}),a=await s.keys(e,c);for(const i of a){const o=O(i.url,t);if(r===o)return s.match(i,n)}}class re{constructor(){this.promise=new Promise((e,t)=>{this.resolve=e,this.reject=t})}}const ae=new Set;async function ce(){for(const s of ae)await s()}function ie(s){return new Promise(e=>setTimeout(e,s))}try{self["workbox:strategies:6.5.3"]&&_()}catch{}function C(s){return typeof s=="string"?new Request(s):s}class oe{constructor(e,t){this._cacheKeys={},Object.assign(this,t),this.event=t.event,this._strategy=e,this._handlerDeferred=new re,this._extendLifetimePromises=[],this._plugins=[...e.plugins],this._pluginStateMap=new Map;for(const n of this._plugins)this._pluginStateMap.set(n,{});this.event.waitUntil(this._handlerDeferred.promise)}async fetch(e){const{event:t}=this;let n=C(e);if(n.mode==="navigate"&&t instanceof FetchEvent&&t.preloadResponse){const a=await t.preloadResponse;if(a)return a}const r=this.hasCallback("fetchDidFail")?n.clone():null;try{for(const a of this.iterateCallbacks("requestWillFetch"))n=await a({request:n.clone(),event:t})}catch(a){if(a instanceof Error)throw new h("plugin-error-request-will-fetch",{thrownErrorMessage:a.message})}const c=n.clone();try{let a;a=await fetch(n,n.mode==="navigate"?void 0:this._strategy.fetchOptions);for(const i of this.iterateCallbacks("fetchDidSucceed"))a=await i({event:t,request:c,response:a});return a}catch(a){throw r&&await this.runCallbacks("fetchDidFail",{error:a,event:t,originalRequest:r.clone(),request:c.clone()}),a}}async fetchAndCachePut(e){const t=await this.fetch(e),n=t.clone();return this.waitUntil(this.cachePut(e,n)),t}async cacheMatch(e){const t=C(e);let n;const{cacheName:r,matchOptions:c}=this._strategy,a=await this.getCacheKey(t,"read"),i=Object.assign(Object.assign({},c),{cacheName:r});n=await caches.match(a,i);for(const o of this.iterateCallbacks("cachedResponseWillBeUsed"))n=await o({cacheName:r,matchOptions:c,cachedResponse:n,request:a,event:this.event})||void 0;return n}async cachePut(e,t){const n=C(e);await ie(0);const r=await this.getCacheKey(n,"write");if(!t)throw new h("cache-put-with-no-response",{url:se(r.url)});const c=await this._ensureResponseSafeToCache(t);if(!c)return!1;const{cacheName:a,matchOptions:i}=this._strategy,o=await self.caches.open(a),l=this.hasCallback("cacheDidUpdate"),g=l?await ne(o,r.clone(),["__WB_REVISION__"],i):null;try{await o.put(r,l?c.clone():c)}catch(u){if(u instanceof Error)throw u.name==="QuotaExceededError"&&await ce(),u}for(const u of this.iterateCallbacks("cacheDidUpdate"))await u({cacheName:a,oldResponse:g,newResponse:c.clone(),request:r,event:this.event});return!0}async getCacheKey(e,t){const n=`${e.url} | ${t}`;if(!this._cacheKeys[n]){let r=e;for(const c of this.iterateCallbacks("cacheKeyWillBeUsed"))r=C(await c({mode:t,request:r,event:this.event,params:this.params}));this._cacheKeys[n]=r}return this._cacheKeys[n]}hasCallback(e){for(const t of this._strategy.plugins)if(e in t)return!0;return!1}async runCallbacks(e,t){for(const n of this.iterateCallbacks(e))await n(t)}*iterateCallbacks(e){for(const t of this._strategy.plugins)if(typeof t[e]=="function"){const n=this._pluginStateMap.get(t);yield c=>{const a=Object.assign(Object.assign({},c),{state:n});return t[e](a)}}}waitUntil(e){return this._extendLifetimePromises.push(e),e}async doneWaiting(){let e;for(;e=this._extendLifetimePromises.shift();)await e}destroy(){this._handlerDeferred.resolve(null)}async _ensureResponseSafeToCache(e){let t=e,n=!1;for(const r of this.iterateCallbacks("cacheWillUpdate"))if(t=await r({request:this.request,response:t,event:this.event})||void 0,n=!0,!t)break;return n||t&&t.status!==200&&(t=void 0),t}}class E{constructor(e={}){this.cacheName=k.getRuntimeName(e.cacheName),this.plugins=e.plugins||[],this.fetchOptions=e.fetchOptions,this.matchOptions=e.matchOptions}handle(e){const[t]=this.handleAll(e);return t}handleAll(e){e instanceof FetchEvent&&(e={event:e,request:e.request});const t=e.event,n=typeof e.request=="string"?new Request(e.request):e.request,r="params"in e?e.params:void 0,c=new oe(this,{event:t,request:n,params:r}),a=this._getResponse(c,n,t),i=this._awaitComplete(a,c,n,t);return[a,i]}async _getResponse(e,t,n){await e.runCallbacks("handlerWillStart",{event:n,request:t});let r;try{if(r=await this._handle(t,e),!r||r.type==="error")throw new h("no-response",{url:t.url})}catch(c){if(c instanceof Error){for(const a of e.iterateCallbacks("handlerDidError"))if(r=await a({error:c,event:n,request:t}),r)break}if(!r)throw c}for(const c of e.iterateCallbacks("handlerWillRespond"))r=await c({event:n,request:t,response:r});return r}async _awaitComplete(e,t,n,r){let c,a;try{c=await e}catch{}try{await t.runCallbacks("handlerDidRespond",{event:r,request:n,response:c}),await t.doneWaiting()}catch(i){i instanceof Error&&(a=i)}if(await t.runCallbacks("handlerDidComplete",{event:r,request:n,response:c,error:a}),t.destroy(),a)throw a}}class p extends E{constructor(e={}){e.cacheName=k.getPrecacheName(e.cacheName),super(e),this._fallbackToNetwork=e.fallbackToNetwork!==!1,this.plugins.push(p.copyRedirectedCacheableResponsesPlugin)}async _handle(e,t){const n=await t.cacheMatch(e);return n||(t.event&&t.event.type==="install"?await this._handleInstall(e,t):await this._handleFetch(e,t))}async _handleFetch(e,t){let n;const r=t.params||{};if(this._fallbackToNetwork){const c=r.integrity,a=e.integrity,i=!a||a===c;n=await t.fetch(new Request(e,{integrity:e.mode!=="no-cors"?a||c:void 0})),c&&i&&e.mode!=="no-cors"&&(this._useDefaultCacheabilityPluginIfNeeded(),await t.cachePut(e,n.clone()))}else throw new h("missing-precache-entry",{cacheName:this.cacheName,url:e.url});return n}async _handleInstall(e,t){this._useDefaultCacheabilityPluginIfNeeded();const n=await t.fetch(e);if(!await t.cachePut(e,n.clone()))throw new h("bad-precaching-response",{url:e.url,status:n.status});return n}_useDefaultCacheabilityPluginIfNeeded(){let e=null,t=0;for(const[n,r]of this.plugins.entries())r!==p.copyRedirectedCacheableResponsesPlugin&&(r===p.defaultPrecacheCacheabilityPlugin&&(e=n),r.cacheWillUpdate&&t++);t===0?this.plugins.push(p.defaultPrecacheCacheabilityPlugin):t>1&&e!==null&&this.plugins.splice(e,1)}}p.defaultPrecacheCacheabilityPlugin={async cacheWillUpdate({response:s}){return!s||s.status>=400?null:s}};p.copyRedirectedCacheableResponsesPlugin={async cacheWillUpdate({response:s}){return s.redirected?await te(s):s}};class le{constructor({cacheName:e,plugins:t=[],fallbackToNetwork:n=!0}={}){this._urlsToCacheKeys=new Map,this._urlsToCacheModes=new Map,this._cacheKeysToIntegrities=new Map,this._strategy=new p({cacheName:k.getPrecacheName(e),plugins:[...t,new Z({precacheController:this})],fallbackToNetwork:n}),this.install=this.install.bind(this),this.activate=this.activate.bind(this)}get strategy(){return this._strategy}precache(e){this.addToCacheList(e),this._installAndActiveListenersAdded||(self.addEventListener("install",this.install),self.addEventListener("activate",this.activate),this._installAndActiveListenersAdded=!0)}addToCacheList(e){const t=[];for(const n of e){typeof n=="string"?t.push(n):n&&n.revision===void 0&&t.push(n.url);const{cacheKey:r,url:c}=X(n),a=typeof n!="string"&&n.revision?"reload":"default";if(this._urlsToCacheKeys.has(c)&&this._urlsToCacheKeys.get(c)!==r)throw new h("add-to-cache-list-conflicting-entries",{firstEntry:this._urlsToCacheKeys.get(c),secondEntry:r});if(typeof n!="string"&&n.integrity){if(this._cacheKeysToIntegrities.has(r)&&this._cacheKeysToIntegrities.get(r)!==n.integrity)throw new h("add-to-cache-list-conflicting-integrities",{url:c});this._cacheKeysToIntegrities.set(r,n.integrity)}if(this._urlsToCacheKeys.set(c,r),this._urlsToCacheModes.set(c,a),t.length>0){const i=`Workbox is precaching URLs without revision info: ${t.join(", ")}
This is generally NOT safe. Learn more at https://bit.ly/wb-precache`;console.warn(i)}}}install(e){return v(e,async()=>{const t=new Y;this.strategy.plugins.push(t);for(const[c,a]of this._urlsToCacheKeys){const i=this._cacheKeysToIntegrities.get(a),o=this._urlsToCacheModes.get(c),l=new Request(c,{integrity:i,cache:o,credentials:"same-origin"});await Promise.all(this.strategy.handleAll({params:{cacheKey:a},request:l,event:e}))}const{updatedURLs:n,notUpdatedURLs:r}=t;return{updatedURLs:n,notUpdatedURLs:r}})}activate(e){return v(e,async()=>{const t=await self.caches.open(this.strategy.cacheName),n=await t.keys(),r=new Set(this._urlsToCacheKeys.values()),c=[];for(const a of n)r.has(a.url)||(await t.delete(a),c.push(a.url));return{deletedURLs:c}})}getURLsToCacheKeys(){return this._urlsToCacheKeys}getCachedURLs(){return[...this._urlsToCacheKeys.keys()]}getCacheKeyForURL(e){const t=new URL(e,location.href);return this._urlsToCacheKeys.get(t.href)}getIntegrityForCacheKey(e){return this._cacheKeysToIntegrities.get(e)}async matchPrecache(e){const t=e instanceof Request?e.url:e,n=this.getCacheKeyForURL(t);if(n)return(await self.caches.open(this.strategy.cacheName)).match(n)}createHandlerBoundToURL(e){const t=this.getCacheKeyForURL(e);if(!t)throw new h("non-precached-url",{url:e});return n=>(n.request=new Request(e),n.params=Object.assign({cacheKey:t},n.params),this.strategy.handle(n))}}let U;const D=()=>(U||(U=new le),U);try{self["workbox:routing:6.5.3"]&&_()}catch{}const B="GET",b=s=>s&&typeof s=="object"?s:{handle:s};class d{constructor(e,t,n=B){this.handler=b(t),this.match=e,this.method=n}setCatchHandler(e){this.catchHandler=b(e)}}class he extends d{constructor(e,t,n){const r=({url:c})=>{const a=e.exec(c.href);if(a&&!(c.origin!==location.origin&&a.index!==0))return a.slice(1)};super(r,t,n)}}class ue{constructor(){this._routes=new Map,this._defaultHandlerMap=new Map}get routes(){return this._routes}addFetchListener(){self.addEventListener("fetch",e=>{const{request:t}=e,n=this.handleRequest({request:t,event:e});n&&e.respondWith(n)})}addCacheListener(){self.addEventListener("message",e=>{if(e.data&&e.data.type==="CACHE_URLS"){const{payload:t}=e.data,n=Promise.all(t.urlsToCache.map(r=>{typeof r=="string"&&(r=[r]);const c=new Request(...r);return this.handleRequest({request:c,event:e})}));e.waitUntil(n),e.ports&&e.ports[0]&&n.then(()=>e.ports[0].postMessage(!0))}})}handleRequest({request:e,event:t}){const n=new URL(e.url,location.href);if(!n.protocol.startsWith("http"))return;const r=n.origin===location.origin,{params:c,route:a}=this.findMatchingRoute({event:t,request:e,sameOrigin:r,url:n});let i=a&&a.handler;const o=e.method;if(!i&&this._defaultHandlerMap.has(o)&&(i=this._defaultHandlerMap.get(o)),!i)return;let l;try{l=i.handle({url:n,request:e,event:t,params:c})}catch(u){l=Promise.reject(u)}const g=a&&a.catchHandler;return l instanceof Promise&&(this._catchHandler||g)&&(l=l.catch(async u=>{if(g)try{return await g.handle({url:n,request:e,event:t,params:c})}catch(M){M instanceof Error&&(u=M)}if(this._catchHandler)return this._catchHandler.handle({url:n,request:e,event:t});throw u})),l}findMatchingRoute({url:e,sameOrigin:t,request:n,event:r}){const c=this._routes.get(n.method)||[];for(const a of c){let i;const o=a.match({url:e,sameOrigin:t,request:n,event:r});if(o)return i=o,(Array.isArray(i)&&i.length===0||o.constructor===Object&&Object.keys(o).length===0||typeof o=="boolean")&&(i=void 0),{route:a,params:i}}return{}}setDefaultHandler(e,t=B){this._defaultHandlerMap.set(t,b(e))}setCatchHandler(e){this._catchHandler=b(e)}registerRoute(e){this._routes.has(e.method)||this._routes.set(e.method,[]),this._routes.get(e.method).push(e)}unregisterRoute(e){if(!this._routes.has(e.method))throw new h("unregister-route-but-not-found-with-method",{method:e.method});const t=this._routes.get(e.method).indexOf(e);if(t>-1)this._routes.get(e.method).splice(t,1);else throw new h("unregister-route-route-not-registered")}}let y;const j=()=>(y||(y=new ue,y.addFetchListener(),y.addCacheListener()),y);function R(s,e,t){let n;if(typeof s=="string"){const c=new URL(s,location.href),a=({url:i})=>i.href===c.href;n=new d(a,e,t)}else if(s instanceof RegExp)n=new he(s,e,t);else if(typeof s=="function")n=new d(s,e,t);else if(s instanceof d)n=s;else throw new h("unsupported-route-type",{moduleName:"workbox-routing",funcName:"registerRoute",paramName:"capture"});return j().registerRoute(n),n}function fe(s,e=[]){for(const t of[...s.searchParams.keys()])e.some(n=>n.test(t))&&s.searchParams.delete(t);return s}function*de(s,{ignoreURLParametersMatching:e=[/^utm_/,/^fbclid$/],directoryIndex:t="index.html",cleanURLs:n=!0,urlManipulation:r}={}){const c=new URL(s,location.href);c.hash="",yield c.href;const a=fe(c,e);if(yield a.href,t&&a.pathname.endsWith("/")){const i=new URL(a.href);i.pathname+=t,yield i.href}if(n){const i=new URL(a.href);i.pathname+=".html",yield i.href}if(r){const i=r({url:c});for(const o of i)yield o.href}}class pe extends d{constructor(e,t){const n=({request:r})=>{const c=e.getURLsToCacheKeys();for(const a of de(r.url,t)){const i=c.get(a);if(i){const o=e.getIntegrityForCacheKey(i);return{cacheKey:i,integrity:o}}}};super(n,e.strategy)}}function ge(s){const e=D(),t=new pe(e,s);R(t)}const we="-precache-",ye=async(s,e=we)=>{const n=(await self.caches.keys()).filter(r=>r.includes(e)&&r.includes(self.registration.scope)&&r!==s);return await Promise.all(n.map(r=>self.caches.delete(r))),n};function me(){self.addEventListener("activate",s=>{const e=k.getPrecacheName();s.waitUntil(ye(e).then(t=>{}))})}function Re(s){return D().matchPrecache(s)}function Ce(s){D().precache(s)}function be(s,e){Ce(s),ge(e)}const F={cacheWillUpdate:async({response:s})=>s.status===200||s.status===0?s:null};class H extends E{constructor(e={}){super(e),this.plugins.some(t=>"cacheWillUpdate"in t)||this.plugins.unshift(F)}async _handle(e,t){const n=t.fetchAndCachePut(e).catch(()=>{});t.waitUntil(n);let r=await t.cacheMatch(e),c;if(!r)try{r=await n}catch(a){a instanceof Error&&(c=a)}if(!r)throw new h("no-response",{url:e.url,error:c});return r}}try{self["workbox:cacheable-response:6.5.3"]&&_()}catch{}const _e=(s,e)=>e.some(t=>s instanceof t);let S,A;function ke(){return S||(S=[IDBDatabase,IDBObjectStore,IDBIndex,IDBCursor,IDBTransaction])}function Pe(){return A||(A=[IDBCursor.prototype.advance,IDBCursor.prototype.continue,IDBCursor.prototype.continuePrimaryKey])}const q=new WeakMap,N=new WeakMap,$=new WeakMap,L=new WeakMap,x=new WeakMap;function Ue(s){const e=new Promise((t,n)=>{const r=()=>{s.removeEventListener("success",c),s.removeEventListener("error",a)},c=()=>{t(m(s.result)),r()},a=()=>{n(s.error),r()};s.addEventListener("success",c),s.addEventListener("error",a)});return e.then(t=>{t instanceof IDBCursor&&q.set(t,s)}).catch(()=>{}),x.set(e,s),e}function Le(s){if(N.has(s))return;const e=new Promise((t,n)=>{const r=()=>{s.removeEventListener("complete",c),s.removeEventListener("error",a),s.removeEventListener("abort",a)},c=()=>{t(),r()},a=()=>{n(s.error||new DOMException("AbortError","AbortError")),r()};s.addEventListener("complete",c),s.addEventListener("error",a),s.addEventListener("abort",a)});N.set(s,e)}let K={get(s,e,t){if(s instanceof IDBTransaction){if(e==="done")return N.get(s);if(e==="objectStoreNames")return s.objectStoreNames||$.get(s);if(e==="store")return t.objectStoreNames[1]?void 0:t.objectStore(t.objectStoreNames[0])}return m(s[e])},set(s,e,t){return s[e]=t,!0},has(s,e){return s instanceof IDBTransaction&&(e==="done"||e==="store")?!0:e in s}};function Te(s){K=s(K)}function Ie(s){return s===IDBDatabase.prototype.transaction&&!("objectStoreNames"in IDBTransaction.prototype)?function(e,...t){const n=s.call(T(this),e,...t);return $.set(n,e.sort?e.sort():[e]),m(n)}:Pe().includes(s)?function(...e){return s.apply(T(this),e),m(q.get(this))}:function(...e){return m(s.apply(T(this),e))}}function Ne(s){return typeof s=="function"?Ie(s):(s instanceof IDBTransaction&&Le(s),_e(s,ke())?new Proxy(s,K):s)}function m(s){if(s instanceof IDBRequest)return Ue(s);if(L.has(s))return L.get(s);const e=Ne(s);return e!==s&&(L.set(s,e),x.set(e,s)),e}const T=s=>x.get(s),Ke=["get","getKey","getAll","getAllKeys","count"],Ee=["put","add","delete","clear"],I=new Map;function W(s,e){if(!(s instanceof IDBDatabase&&!(e in s)&&typeof e=="string"))return;if(I.get(e))return I.get(e);const t=e.replace(/FromIndex$/,""),n=e!==t,r=Ee.includes(t);if(!(t in(n?IDBIndex:IDBObjectStore).prototype)||!(r||Ke.includes(t)))return;const c=async function(a,...i){const o=this.transaction(a,r?"readwrite":"readonly");let l=o.store;return n&&(l=l.index(i.shift())),(await Promise.all([l[t](...i),r&&o.done]))[0]};return I.set(e,c),c}Te(s=>({...s,get:(e,t,n)=>W(e,t)||s.get(e,t,n),has:(e,t)=>!!W(e,t)||s.has(e,t)}));try{self["workbox:expiration:6.5.3"]&&_()}catch{}try{self["workbox:recipes:6.5.3"]&&_()}catch{}class V extends E{constructor(e={}){super(e),this.plugins.some(t=>"cacheWillUpdate"in t)||this.plugins.unshift(F),this._networkTimeoutSeconds=e.networkTimeoutSeconds||0}async _handle(e,t){const n=[],r=[];let c;if(this._networkTimeoutSeconds){const{id:o,promise:l}=this._getTimeoutPromise({request:e,logs:n,handler:t});c=o,r.push(l)}const a=this._getNetworkPromise({timeoutId:c,request:e,logs:n,handler:t});r.push(a);const i=await t.waitUntil((async()=>await t.waitUntil(Promise.race(r))||await a)());if(!i)throw new h("no-response",{url:e.url});return i}_getTimeoutPromise({request:e,logs:t,handler:n}){let r;return{promise:new Promise(a=>{r=setTimeout(async()=>{a(await n.cacheMatch(e))},this._networkTimeoutSeconds*1e3)}),id:r}}async _getNetworkPromise({timeoutId:e,request:t,logs:n,handler:r}){let c,a;try{a=await r.fetchAndCachePut(t)}catch(i){i instanceof Error&&(c=i)}return e&&clearTimeout(e),(c||!a)&&(a=await r.cacheMatch(t)),a}}function De(s){j().setCatchHandler(s)}const xe=[{"revision":null,"url":"assets/app-6922157f.css"},{"revision":null,"url":"assets/app-f0619294.js"},{"revision":null,"url":"assets/axios-bff3f665.js"},{"revision":null,"url":"assets/bootstrap-82b095aa.js"},{"revision":null,"url":"assets/Datepicker-aec77fe4.js"},{"revision":null,"url":"assets/form-aecc209f.js"},{"revision":null,"url":"assets/index-49a1e2cd.js"},{"revision":null,"url":"assets/index-9fbbea74.js"},{"revision":null,"url":"assets/index-c70d8983.js"},{"revision":null,"url":"assets/lib-c0c25e73.js"},{"revision":null,"url":"assets/NetworkFirst-6cd2f28b.js"},{"revision":null,"url":"assets/progress-40344444.js"},{"revision":null,"url":"assets/regis-sw-4ed993c7.js"},{"revision":null,"url":"assets/regis-sw-952e6918.js"},{"revision":null,"url":"assets/regis-sw-95a3aecc.js"},{"revision":null,"url":"assets/setCatchHandler-142d2621.js"},{"revision":null,"url":"assets/sw-1d279366.js"},{"revision":null,"url":"assets/sw-a9ac85f2.js"},{"revision":null,"url":"assets/sw-c6c40e17.js"},{"revision":null,"url":"assets/table-5fd2c4d4.js"},{"revision":null,"url":"assets/workbox-window.prod.es5-8f11f700.js"},{"revision":"caa95a4429c7c860967649cb685aa973","url":"registerSW.js"},{"revision":"1","url":"/student/offline"},{"revision":"6523134f80e370476611f2eddf67a167","url":"site.webmanifest"}],Me="/student/offline";me();be(xe);self.addEventListener("message",s=>{s.data&&s.data.type==="SKIP_WAITING"&&self.skipWaiting()});const ve=new d(({request:s})=>s.destination==="document",new V({cacheName:"documents"})),Oe=new d(({request:s})=>s.destination==="image",new V({cacheName:"images"})),Se=new d(({request:s})=>s.destination==="script",new H({cacheName:"scripts"})),Ae=new d(({request:s})=>s.destination==="style",new H({cacheName:"styles"}));R(ve);R(Oe);R(Se);R(Ae);De(async({request:s})=>{switch(s.destination){case"document":return Re(Me);default:return Response.error()}});self.addEventListener("push",s=>{const e=s.data.json();e&&(s.waitUntil(self.registration.showNotification(e.title,e)),"setAppBadge"in navigator&&(navigator.setAppBadge(1),navigator.setClientBadge()))});self.addEventListener("notificationclick",s=>{s.notification.close();let e="";s.action?e=s.action:e=`${self.location.origin}/student/dashboard`,clients.openWindow(e)});
