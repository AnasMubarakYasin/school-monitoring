import Datepicker from "flowbite-datepicker/Datepicker";
const datepickerElms = document.querySelectorAll("[datepicker]");
datepickerElms.forEach((elm) => {
    new Datepicker(elm, {
        format: elm.dataset.format,
        autohide: elm.dataset.autohide,
    });
});
