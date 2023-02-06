<?php

namespace App\View\Components\Resource;

use App\Dynamic\Resource\Stat as DynamicResourceStat;
use Illuminate\View\Component;

class Stat extends Component
{
    public function __construct(public DynamicResourceStat $resource)
    {
        $resource->resourcing();
    }

    public function render()
    {
        return view('components.resource.stat', [
            'model' => $this->resource->model,
        ]);
    }
}
