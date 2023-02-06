import { Sequence } from "../../lib";

const progressElm = document.getElementById('progress-bar');
const progressVal = progressElm.firstElementChild;
const sequence = new Sequence({ timeout: 5000, });
sequence.onStart = function () {
    progressElm.style.height = "4px";
}
sequence.onProgress = function (value) {
    progressVal.style.width = value + "%";
}
sequence.onFinish = function () {
    progressElm.style.height = "0px";
}
sequence.start();
window.sequence = sequence;
requestIdleCallback((deadline) => {
    sequence.finish();
})
