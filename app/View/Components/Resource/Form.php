<?php

namespace App\View\Components\Resource;

use App\Dynamic\Resource\Form as DynamicResourceForm;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(public DynamicResourceForm $resource)
    {
        $resource->resourcing();
    }

    public function render()
    {
        return view('components.resource.form', [
            'model' => $this->resource->model,
        ]);
    }
}
