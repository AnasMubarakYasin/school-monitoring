function p(r,t){const s=document.getElementById(r),i=s.querySelector("thead"),o=s.querySelector("tbody"),e=i.querySelector("input[type=checkbox]"),a=[...o.querySelectorAll("tr input[type=checkbox]")];e.addEventListener("change",h=>{a.forEach(c=>{c.checked=e.checked}),t==null||t.call(null,e)}),a.forEach(h=>{h.addEventListener("change",c=>{let n=!1;for(const l of a)if(n){if(l.checked==n)continue;e.indeterminate=!0,t==null||t.call(null,e);return}else n=l.checked;e.checked=n,e.indeterminate=!1,t==null||t.call(null,e)})})}const d=new DOMParser;function m(r){return d.parseFromString(r,"text/html").body.firstChild}class y{constructor(t){this.time=0,this.progress=0,this.timeout=2e3,this.startValue=0,this.max=100,this.interval=16,this.delay=100,this.percent=0,this.id=0,this.idEnd=0;const s=Object.assign({},{max:100,time:0,progress:0,timeout:2e3,completion:1e3,alwaysReset:!1},t);this.max=s.max,this.time=s.time,this.timeout=s.timeout,this.progress=s.progress,this.percent=this.genPercent(),this.options=s}start(){this.addStart(),this.addFinish()}resume(){this.addStart(),this.addFinish()}pause(){clearInterval(this.id),clearTimeout(this.idEnd)}finish(){this.pause(),this.time=0,this.timeout=this.options.completion,this.percent=this.genPercent(),this.addStart(),this.addFinish()}stop(){this.pause()}reset(){this.time=0,this.timeout=this.options.timeout,this.percent=this.genPercent(),this.progress=0}genPercent(){return this.max/this.timeout}addStart(){var i;const t=this.interval,s=this.percent;(i=this.onStart)==null||i.call(this),this.id=setInterval(()=>{var o;(o=this.onProgress)==null||o.call(this,this.progress),this.time+=t,this.progress+=s*t},t)}addFinish(){this.idEnd=setTimeout(()=>{var t;clearInterval(this.id),(t=this.onFinish)==null||t.call(this),this.stop(),this.options.alwaysReset&&this.reset()},this.timeout+this.delay-this.time)}}function b(r){for(var t="=".repeat((4-r.length%4)%4),s=(r+t).replace(/\-/g,"+").replace(/_/g,"/"),i=window.atob(s),o=new Uint8Array(i.length),e=0;e<i.length;++e)o[e]=i.charCodeAt(e);return o}export{y as S,m as c,p as t,b as u};