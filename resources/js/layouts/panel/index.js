const ctn = document.getElementById("content");
const drawerBtn = document.getElementById("drawer-btn");
const notifBtn = document.getElementById("notif-btn");
const themeBtn = document.getElementById("theme-btn");
const langBtn = document.getElementById("lang-btn");
const drawerEl = document.getElementById("drawer-main");
const maxLG = matchMedia("(max-width: 768px)");
const drawerOpt = {
    placement: "left",
    backdrop: false,
    bodyScrolling: true,
    edge: true,
    edgeOffset: "",
    onHide: () => {
        drawerBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>`;
        drawerEl.style.flexBasis = "0";
        drawerEl.style.position = "absolute";
    },
    onShow: () => {
        drawerBtn.innerHTML = `<svg class="w-6 h-6" focusable="false" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24"><path d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z"></path></svg>`;
        if (maxLG.matches) {
            drawerEl.style.width = "300px";
            drawerEl.style.position = "fixed";
            drawerEl.style.zIndex = '100'
        } else {
            drawerEl.style.flex = "300px 0 0";
            drawerEl.style.position = "static";
        }
    },
};
let drawer = new Drawer(drawerEl, drawerOpt);
drawer.show();
drawerBtn.addEventListener("click", (event) => {
    drawer.toggle();
});
drawerChange(maxLG.matches)
maxLG.addEventListener("change", (event) => {
    drawerChange(event.matches)
});
function drawerChange(change) {
    drawerOpt.backdrop = change;
    drawer = new Drawer(drawerEl, drawerOpt)
    if (change) {
        drawer.hide();
        themeBtn.style.display = 'none'
        notifBtn.style.display = 'none'
        langBtn.style.display = 'none'
    } else {
        drawer.show();
        themeBtn.style.display = 'block'
        notifBtn.style.display = 'block'
        langBtn.style.display = 'block'
    }
}
themeSelect(localStorage.getItem("theme") ?? "light");
themeBtn.addEventListener("click", (event) => {
    localStorage.setItem(
        "theme",
        themeToggle(localStorage.getItem("theme") ?? "light")
    );
});
function themeSelect(theme) {
    if (theme == "light") {
        document.documentElement.classList.remove("dark");
        themeBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" /></svg>`;
    } else if (theme == "dark") {
        document.documentElement.classList.add("dark");
        themeBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>`;
    } else {
        alert("something wrong");
    }
}
function themeToggle(theme) {
    if (theme == "light") {
        document.documentElement.classList.add("dark");
        themeBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>`;
        return "dark";
    } else if (theme == "dark") {
        document.documentElement.classList.remove("dark");
        themeBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" /></svg>`;
        return "light";
    } else {
        alert("something wrong");
    }
}
