<?php

namespace App\View\Components\SchoolYear;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class ViewAny extends Component
{
    public array $columns = ['name', 'is_active', 'semesters', 'start_at', 'end_at'];
    public LengthAwarePaginator $paginator;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        /** @var Builder|EloquentBuilder */
        $query = SchoolYear::query();
        $perpage = $request->query('perpage', 5);
        $this->columns = $request->query('columns', $this->columns);
        if ($request->query->getBoolean('sort')) {
            $query->orderBy($request->query("sort_name"), $request->query("sort_dir"));
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
        return view('components.school-year.view-any', [
            'paginator' => $this->paginator,
            'fields' => SchoolYear::$fields,
            'columns' => $this->columns,
        ]);
    }
}
