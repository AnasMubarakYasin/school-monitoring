const inputs = document.querySelectorAll(".checkbox");
const data = [];

for (const input of inputs) {
    const index = +input.dataset.id;
    data[index] = input.dataset.value || null;
    input.previousElementSibling.value = data[index];
    let count = 0;
    switch (data[index]) {
        case "present":
            input.checked = true;
            count = 1;
            break;
        case "unpresent":
            input.checked = false;
            input.indeterminate = true;
            count = 2;
            break;
        default:
            input.checked = false;
            break;
    }
    input.addEventListener("change", (e) => {
        e.preventDefault();
        count++;
        switch (count) {
            case 1:
                input.checked = true;
                data[index] = "present";
                break;
            case 2:
                input.checked = false;
                data[index] = null;
                break;
            case 3:
                count = 0;
                input.checked = false;
                input.indeterminate = true;
                data[index] = "unpresent";
                break;
            default:
                input.checked = false;
                data[index] = null;
                break;
        }
        input.previousElementSibling.value = data[index];
    });
}
