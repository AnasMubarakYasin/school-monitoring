axios.defaults.headers.common["Authorization"] = `Bearer ${panel.token}`;

const ctn = document.getElementById("content");
const drawerBtn = document.getElementById("drawer-btn");
const notifBtn = document.getElementById("notif-btn");
const themeBtn = document.getElementById("theme-btn");
const themeList = document.getElementById("theme-list");
const langBtn = document.getElementById("lang-btn");
const drawerElm = document.getElementById("drawer-main");
const maxLG = matchMedia("(max-width: 640px)");
const icon_dark = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" /></svg>`;
const icon_light = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>`;
const themeClass = [
    "text-white",
    "bg-blue-500",
    "hover:text-gray-900",
    "hover:bg-gray-200",
    "dark:hover:bg-gray-600",
    "dark:hover:text-white",
];
const drawerOpt = {
    placement: "left",
    backdrop: false,
    bodyScrolling: true,
    edge: true,
    edgeOffset: "",
    onHide: () => {
        drawerBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>`;
        drawerElm.style.flexBasis = "0";
        drawerElm.style.position = "absolute";
    },
    onShow: () => {
        drawerBtn.innerHTML = `<svg class="w-6 h-6" focusable="false" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24"><path d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z"></path></svg>`;
        if (maxLG.matches) {
            drawerElm.style.width = "300px";
            drawerElm.style.position = "fixed";
            drawerElm.style.zIndex = "100";
        } else {
            drawerElm.style.flex = "300px 0 0";
            drawerElm.style.position = "static";
        }
    },
};
let drawer = new Drawer(drawerElm, drawerOpt);
drawer.show();
drawerBtn.addEventListener("click", (event) => {
    drawer.toggle();
});
drawerChange(maxLG.matches);
maxLG.addEventListener("change", (event) => {
    drawerChange(event.matches);
});
function drawerChange(change) {
    drawerOpt.backdrop = change;
    drawer = new Drawer(drawerElm, drawerOpt);
    if (change) {
        drawer.hide();
        themeBtn.style.display = "none";
        notifBtn.style.display = "none";
        langBtn.style.display = "none";
    } else {
        drawer.show();
        themeBtn.style.display = "block";
        notifBtn.style.display = "block";
        langBtn.style.display = "block";
    }
}
themeSelect(localStorage.getItem("theme") ?? "light");
themeBtn.addEventListener("click", () => {
    localStorage.setItem(
        "theme",
        themeToggle(localStorage.getItem("theme") ?? "light")
    );
});
for (const themeItem of themeList.children) {
    themeItem.firstElementChild.addEventListener("click", () => {
        localStorage.setItem(
            "theme",
            themeToggle(
                themeItem.firstElementChild.dataset.theme == "light"
                    ? "dark"
                    : "light"
            )
        );
    });
}
function themeSelect(theme) {
    if (theme == "light") {
        document.documentElement.classList.remove("dark");
        themeBtn.innerHTML = icon_dark;
    } else if (theme == "dark") {
        document.documentElement.classList.add("dark");
        themeBtn.innerHTML = icon_light;
    } else {
        alert("something wrong");
    }
    themeList
        .querySelector(`[data-theme="${theme}"]`)
        .classList.add(...themeClass);
}
function themeToggle(theme) {
    const btn = themeList.querySelector(`[data-theme="${theme}"]`);
    btn.classList.remove(...themeClass);
    btn.classList.add(
        "hover:text-gray-900",
        "hover:bg-gray-200",
        "dark:hover:bg-gray-600",
        "dark:hover:text-white"
    );
    if (theme == "light") {
        document.documentElement.classList.add("dark");
        themeBtn.innerHTML = icon_light;
        themeList
            .querySelector(`[data-theme="dark"]`)
            .classList.add(...themeClass);
        return "dark";
    } else if (theme == "dark") {
        document.documentElement.classList.remove("dark");
        themeBtn.innerHTML = icon_dark;
        themeList
            .querySelector(`[data-theme="light"]`)
            .classList.add(...themeClass);
        return "light";
    } else {
        alert("something wrong");
    }
}
