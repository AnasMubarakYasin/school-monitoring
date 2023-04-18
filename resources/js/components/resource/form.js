import { create_element } from "../../lib";

models.forEach((element) => {
    create_model(element);
});

function create_model(name) {
    let ids = 0;
    let models = [];
    const input = document.getElementById(`${name}_box`);
    const add = document.getElementById(`${name}_add`);
    const list = document.getElementById(`${name}_list`);

    add.addEventListener("click", (event) => {
        if (!input.value) return;
        const model = { id: ++ids, value: input.value };
        create_item(model);
        models.push(model);
    });

    for (const model of models) {
        create_item({ id: ++ids, value: model });
    }

    for (const element of list.children) {
        const btn = element.querySelector(`#${name}_${++ids}_del`);
        btn.addEventListener("click", () => {
            element.remove();
        });
        models.push(element.querySelector('input').value);
    }

    function create_item({ id, value }) {
        const elm = gen(id, value);
        const btn = elm.querySelector(`#${name}_${id}_del`);
        btn.addEventListener("click", () => {
            elm.remove();
        });
        list.append(elm);
        input.value = "";
    }
    function gen(id, value) {
        const template = `
            <li class="flex items-center gap-2">
                <div class="relative w-full">
                    <input type="text" id="${name}_${id}" name="${name}[]" value="${value}"
                        class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <button type="button" id="${name}_${id}_del"
                    class="p-2.5 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4">
                        </path>
                    </svg>
                    <span class="sr-only">delete</span>
                </button>
            </li>
        `;
        return create_element(template);
    }
}
