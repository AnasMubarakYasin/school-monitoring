<?php

namespace App\View\Components\Administrator;

use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Index extends Component
{
    public array $fields = [
        'name' => 'name',
        'email' => 'email',
    ];
    public array $columns = ['name', 'email'];
    public LengthAwarePaginator $paginator;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        /** @var Builder|EloquentBuilder */
        $query = Administrator::query();
        $perpage = $request->query('perpage', 5);
        $this->columns = $request->query('columns', $this->columns);
        if ($request->query->getBoolean('sort')) {
            foreach ($this->columns as $column) {
                if ($request->query("sort_$column")) {
                    $query->orderBy($column, $request->query("sort_$column"));
                }
            }
        }
        if ($request->query->getBoolean("filter")) {
            foreach ($this->columns as $column) {
                switch ($column) {
                    case 'name':
                        if ($request->query('filter_name')) {
                            $query->orWhereFullText('name', $request->query('filter_name'));
                        }
                        break;

                    default:
                        if ($request->query("filter_$column")) {
                            $query->orWhere($column, $request->query("filter_$column"));
                        }
                        break;
                }
            }
        }
        /** @var LengthAwarePaginator */
        $this->paginator = $query->paginate($perpage);
        $this->paginator->withQueryString();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.administrator.index', [
            'paginator' => $this->paginator,
            'fields' => $this->fields,
            'columns' => $this->columns,
        ]);
    }
}
