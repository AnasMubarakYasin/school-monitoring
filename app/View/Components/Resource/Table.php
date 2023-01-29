<?php

namespace App\View\Components\Resource;

use App\Models\ResourceTable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Table extends Component
{
    public function __construct(public ResourceTable $resource)
    {
        $resource->processing();
    }

    public function render()
    {
        return view('components.resource.table', [
            'paginator' => $this->resource->paginator,
            'data' => $this->resource->data,
        ]);
    }
}
