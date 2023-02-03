<?php

namespace App\View\Components\Resource;

use App\Models\Resource\Table as ResourceTable;
use Illuminate\View\Component;

class Table extends Component
{
    // public function __construct(public ResourceTable $resource)
    public function __construct(public ResourceTable $resource)
    {
        $resource->resourcing();
    }

    public function render()
    {
        return view('components.resource.table', [
            'paginator' => $this->resource->paginator,
            'all' => $this->resource->all,
        ]);
    }
}
