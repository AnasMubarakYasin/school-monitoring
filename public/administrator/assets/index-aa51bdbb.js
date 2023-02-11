document.getElementById("content");const r=document.getElementById("drawer-btn"),c=document.getElementById("notif-btn"),n=document.getElementById("theme-btn"),s=document.getElementById("theme-list"),h=document.getElementById("lang-btn"),t=document.getElementById("drawer-main"),d=matchMedia("(max-width: 640px)"),m='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" /></svg>',g='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>',l=["text-white","bg-blue-500","hover:text-gray-900","hover:bg-gray-200","dark:hover:bg-gray-600","dark:hover:text-white"],a={placement:"left",backdrop:!1,bodyScrolling:!0,edge:!0,edgeOffset:"",onHide:()=>{r.innerHTML='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>',t.style.flexBasis="0",t.style.position="absolute"},onShow:()=>{r.innerHTML='<svg class="w-6 h-6" focusable="false" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24"><path d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z"></path></svg>',d.matches?(t.style.width="300px",t.style.position="fixed",t.style.zIndex="100"):(t.style.flex="300px 0 0",t.style.position="static")}};let o=new Drawer(t,a);o.show();r.addEventListener("click",e=>{o.toggle()});w(d.matches);d.addEventListener("change",e=>{w(e.matches)});function w(e){a.backdrop=e,o=new Drawer(t,a),e?(o.hide(),n.style.display="none",c.style.display="none",h.style.display="none"):(o.show(),n.style.display="block",c.style.display="block",h.style.display="block")}v(localStorage.getItem("theme")??"light");n.addEventListener("click",()=>{localStorage.setItem("theme",u(localStorage.getItem("theme")??"light"))});for(const e of s.children)e.firstElementChild.addEventListener("click",()=>{localStorage.setItem("theme",u(e.firstElementChild.dataset.theme=="light"?"dark":"light"))});function v(e){e=="light"?(document.documentElement.classList.remove("dark"),n.innerHTML=m):e=="dark"?(document.documentElement.classList.add("dark"),n.innerHTML=g):alert("something wrong"),s.querySelector(`[data-theme="${e}"]`).classList.add(...l)}function u(e){const i=s.querySelector(`[data-theme="${e}"]`);if(i.classList.remove(...l),i.classList.add("hover:text-gray-900","hover:bg-gray-200","dark:hover:bg-gray-600","dark:hover:text-white"),e=="light")return document.documentElement.classList.add("dark"),n.innerHTML=g,s.querySelector('[data-theme="dark"]').classList.add(...l),"dark";if(e=="dark")return document.documentElement.classList.remove("dark"),n.innerHTML=m,s.querySelector('[data-theme="light"]').classList.add(...l),"light";alert("something wrong")}
