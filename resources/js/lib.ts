let input_img_preview_data = {};
export function input_img_preview(
    input_id: string,
    img_id: string | ((url: string, file: File) => void),
) {
    const input = document.getElementById(input_id) as HTMLInputElement;
    if (!input) throw new Error('element not found');
    const handler = (event) => {
        const file = input.files?.item(0);
        if (!file) return;
        input_img_preview_data[input_id] && URL.revokeObjectURL(input_img_preview_data[input_id]);
        input_img_preview_data[input_id] = URL.createObjectURL(file);
        if (typeof img_id == "string") {
            const img = document.getElementById(img_id) as HTMLImageElement;
            if (!img) return;
            img.src = input_img_preview_data[input_id];
        } else {
            img_id(input_img_preview_data[input_id], file);
        }
    };
    input.addEventListener("change", handler);
    return () => {
        input.removeEventListener("change", handler);
    };
}
export function table_checkbox(table_id: string, change?: (elm: HTMLInputElement) => {}) {
    const table = document.getElementById(table_id) as HTMLTableElement
    const table_head = table.querySelector('thead') as HTMLTableSectionElement;
    const table_body = table.querySelector('tbody') as HTMLTableSectionElement;
    const checkbox = table_head.querySelector('input[type=checkbox]') as HTMLInputElement;
    const checkboxs_n = table_body.querySelectorAll('tr input[type=checkbox]') as NodeListOf<HTMLInputElement>;
    const checkboxs = [...checkboxs_n];
    checkbox.addEventListener('change', (event) => {
        checkboxs.forEach((elm) => {
            elm.checked = checkbox.checked
        })
        change?.call(null, checkbox);
    })
    checkboxs.forEach((elm) => {
        elm.addEventListener('change', (event) => {
            let last_check = false
            for (const item of checkboxs) {
                if (last_check) {
                    if (item.checked == last_check) {
                        continue;
                    } else {
                        checkbox.indeterminate = true
                        change?.call(null, checkbox);
                        return
                    }
                } else {
                    last_check = item.checked
                }
            }
            checkbox.checked = last_check
            checkbox.indeterminate = false
            change?.call(null, checkbox);
        })
    })
}
const dom_parser = new DOMParser()
export function create_element(element: string): HTMLElement {
    const doc = dom_parser.parseFromString(element, "text/html")
    return doc.body.firstChild as HTMLElement
}
