<?php

namespace App\View\Components\Resource;

use App\Models\Resource\Form as ModelsResourceForm;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(public ModelsResourceForm $resource)
    {
    }

    public function render()
    {
        return view('components.resource.form', [
            'model' => $this->resource->model,
        ]);
    }
}
