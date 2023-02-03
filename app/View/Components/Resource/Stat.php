<?php

namespace App\View\Components\Resource;

use App\Models\Resource\Stat as ModelsResourceStat;
use Illuminate\View\Component;

class Stat extends Component
{
    public function __construct(public ModelsResourceStat $resource)
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
