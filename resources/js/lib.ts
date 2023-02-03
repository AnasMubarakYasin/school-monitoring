let input_img_preview_data = {};
export function input_img_preview(
    input_id: string,
    img_id: string | ((url: string, file: File) => void)
) {
    const input = document.getElementById(input_id) as HTMLInputElement;
    if (!input) throw new Error("element not found");
    const handler = (event) => {
        const file = input.files?.item(0);
        if (!file) return;
        input_img_preview_data[input_id] &&
            URL.revokeObjectURL(input_img_preview_data[input_id]);
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
export function table_checkbox(
    table_id: string,
    change?: (elm: HTMLInputElement) => {}
) {
    const table = document.getElementById(table_id) as HTMLTableElement;
    const table_head = table.querySelector("thead") as HTMLTableSectionElement;
    const table_body = table.querySelector("tbody") as HTMLTableSectionElement;
    const checkbox = table_head.querySelector(
        "input[type=checkbox]"
    ) as HTMLInputElement;
    const checkboxs_n = table_body.querySelectorAll(
        "tr input[type=checkbox]"
    ) as NodeListOf<HTMLInputElement>;
    const checkboxs = [...checkboxs_n];
    checkbox.addEventListener("change", (event) => {
        checkboxs.forEach((elm) => {
            elm.checked = checkbox.checked;
        });
        change?.call(null, checkbox);
    });
    checkboxs.forEach((elm) => {
        elm.addEventListener("change", (event) => {
            let last_check = false;
            for (const item of checkboxs) {
                if (last_check) {
                    if (item.checked == last_check) {
                        continue;
                    } else {
                        checkbox.indeterminate = true;
                        change?.call(null, checkbox);
                        return;
                    }
                } else {
                    last_check = item.checked;
                }
            }
            checkbox.checked = last_check;
            checkbox.indeterminate = false;
            change?.call(null, checkbox);
        });
    });
}
const dom_parser = new DOMParser();
export function create_element(element: string): HTMLElement {
    const doc = dom_parser.parseFromString(element, "text/html");
    return doc.body.firstChild as HTMLElement;
}
export class Promiseify<T = any> extends Promise<T> {
    static get [Symbol.species]() {
        return Promise;
    }
    resolver!: (value?: T) => void;
    rejector!: (error: any) => void;
    constructor(
        executor?: (
            resolve: (value: T) => void,
            reject: (error: any) => any
        ) => void
    ) {
        let resolver: any;
        let rejector: any;
        super((resolve, reject) => {
            resolver = resolve;
            rejector = reject;
            executor?.(resolve, reject);
        });
        this.resolver = resolver;
        this.rejector = rejector;
    }
}
const refWait = new WeakMap<any, any>();
export function wait<
    Arg = undefined,
    ThisArg = undefined,
    Callback = (this: ThisArg, arg: Arg) => unknown,
    Return = Callback extends (this: any, arg: Arg) => infer R
        ? R extends Promise<infer T>
            ? T
            : R
        : unknown
>(
    opt:
        | number
        | {
              timeout: number;
              delay?: number;
              callback?: Callback;
              arg?: Arg;
              thisArg?: ThisArg;
          }
): Promise<Return> {
    const promise = new Promiseify();
    if (typeof opt == "number") {
        setTimeout(() => {
            promise.resolver();
        }, opt);
    } else if (opt.callback) {
        if (opt.delay) {
            clearTimeout(refWait.get(opt.callback));
            const id = setTimeout(() => {
                promise.resolver((opt.callback as any).apply(null, [opt.arg]));
            }, opt.timeout + opt.delay);
            refWait.set(opt.callback, id);
        } else {
            setTimeout(() => {
                promise.resolver((opt.callback as any).apply(null, [opt.arg]));
            }, opt.timeout);
        }
    } else {
        setTimeout(() => {
            promise.resolver();
        }, opt.timeout);
    }
    return promise;
}

interface SequenceOptions {
	max: number;
	time: number;
	timeout: number;
	progress: number;
	completion: number;
	alwaysReset: boolean;
}

export class Sequence {
	time = 0;
	progress = 0;
	timeout = 2000;

	startValue = 0;
	max = 100;

	private interval = 16;
	private delay = 100;
	private percent = 0;
	private id: any = 0;
	private idEnd: any = 0;

	options: SequenceOptions;

	constructor(options?: Partial<SequenceOptions>) {
		const opts = Object.assign({}, {max: 100, time: 0, progress: 0, timeout: 2000, completion: 1000, alwaysReset: false} as SequenceOptions, options);
		this.max = opts.max;
		this.time = opts.time;
		this.timeout = opts.timeout;
		this.progress = opts.progress;
		this.percent = this.genPercent();
		this.options = opts;
	}

	onStart?: () => void;
	onProgress?: (value: number) => void;
	onFinish?: () => void;

	start() {
		this.addStart();
		this.addFinish();
	}
	resume() {
		this.addStart();
		this.addFinish();
	}
	pause() {
		clearInterval(this.id);
		clearTimeout(this.idEnd);
	}
	finish() {
		this.pause();
		this.time = 0;
		this.timeout = this.options.completion;
		this.percent = this.genPercent();
		this.addStart();
		this.addFinish();	
	}
	stop() {
		this.pause();
	}
	reset() {
		this.time = 0;
		this.timeout = this.options.timeout;
		this.percent = this.genPercent();
		this.progress = 0;
	}
	private genPercent() {
		return this.max / this.timeout;
	}
	private addStart() {
		const interval = this.interval;
		const percent = this.percent;

		this.onStart?.();
        
		this.id = setInterval(() => {
			this.onProgress?.(this.progress);

			this.time += interval;
			this.progress += percent * interval;
		}, interval);
	}
	private addFinish() {
		this.idEnd = setTimeout(() => {
			clearInterval(this.id);

			this.onFinish?.();
			this.stop();

			if (this.options.alwaysReset) {
				this.reset();
			}
		}, this.timeout + this.delay - this.time);
	}
}
