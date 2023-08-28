import { Sequence } from "../../lib";

const progressElm = document.getElementById("progress-bar");
const progressVal = progressElm.firstElementChild;
const resumeProgress = sessionStorage.getItem("sequence") ?? 0;
const sequence = new Sequence({
    progress: +resumeProgress,
    timeout: 5000,
    alwaysReset: true,
});
sequence.onStart = function () {
    progressElm.classList.add("h-1");
};
sequence.onProgress = function (value) {
    progressVal.style.width = value + "%";
    // progressElm.classList.add('transition-all');
};
sequence.onFinish = function () {
    progressVal.style.width = "0%";
    progressElm.classList.add("h-0");
    // progressElm.classList.remove('transition-all');
    progressElm.classList.remove("h-1");
};
sequence.start();
window.sequence = sequence;
window.addEventListener("unload", (e) => {
    // sequence.pause();
    sessionStorage.setItem("sequence", sequence.progress);
});
window.addEventListener("beforeunload", (e) => {
    sequence.start();
});
window.addEventListener("load", (e) => {
    sequence.finish();
});
