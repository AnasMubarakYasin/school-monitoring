<?php

namespace App\View\Components\Resource;

use App\Models\ResourceForm;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ResourceForm $resource)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.resource.form', [
            'resource' => $this->resource,
            'model' => $this->resource->model,
        ]);
    }
}
