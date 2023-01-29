<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceTable
{
    public static function create(
        Builder|EloquentBuilder $query,
        array|null $fields = [],
        array|null $columns = [],
        array|null $pagination = [],
    ) {
        $columns = request()->query('columns', $columns);
        $sort = [];
        $filter = [];
        if (request()->query->getBoolean('sort')) {
            $sort = ['name' => request()->query->get('sort_name'), 'dir' => request()->query->get('sort_dir')];
        }
        if (request()->query->getBoolean('filter')) {
            $filter = collect($columns)->reduce(function ($result, $curr) {
                if (request()->query->has("filter_$curr")) {
                    $result[$curr] = request()->query->get("filter_$curr");
                }
                return $result;
            }, []);
        }
        if ($pagination) {
            $pagination['per'] = request()->query->getInt('perpage', $pagination['per']);
            $pagination['num'] = request()->query->getInt('numpage', $pagination['num']);
        }
        return new ResourceTable(
            query: $query,
            fields: $fields,
            columns: $columns,
            sort: $sort,
            filter: $filter,
            pagination: $pagination,
        );
    }
    public LengthAwarePaginator|null $paginator = null;
    public array $data = [];
    public function __construct(
        public Builder|EloquentBuilder $query,
        public array|null $pagination = null,
        public array|null $columns = null,
        public array|null $sort = null,
        public array|null $filter = null,
        public array|null $fields = null,
        public string $view_any = "",
        public string $create = "",
        public string $delete_any = "",
    ) {
        $route_gen = function () {
            return "";
        };
        $this->route_view =$route_gen;
        $this->route_update =$route_gen;
        $this->route_delete =$route_gen;
        $this->route_restore =$route_gen;
        $this->route_model =$route_gen;
    }
    public Closure $route_view;
    public Closure $route_update;
    public Closure $route_delete;
    public Closure $route_restore;
    public Closure $route_model;
    public function view(mixed $item)
    {
        return $this->route_view->call($this, $item);
    }
    public function update(mixed $item)
    {
        return $this->route_update->call($this, $item);
    }
    public function delete(mixed $item)
    {
        return $this->route_delete->call($this, $item);
    }
    public function restore(mixed $item)
    {
        return $this->route_restore->call($this, $item);
    }
    public function model(array $field, mixed $item)
    {
        return $this->route_model->call($this, $field, $item);
    }
    public function processing()
    {
        if ($this->sort && $this->sort['name'] && $this->sort['dir']) {
            $this->query->orderBy($this->sort['name'], $this->sort['dir']);
        }
        if ($this->filter) {
            foreach ($this->columns as $column) {
                switch ($column) {
                    case 'name':
                        if (isset($this->filter['name'])) {
                            $this->query->orWhereFullText('name', $this->filter['name']);
                        }
                        break;

                    default:
                        if (isset($this->filter[$column])) {
                            $this->query->orWhere($column, $this->filter[$column]);
                        }
                        break;
                }
            }
        }
        if ($this->pagination) {
            /** @var LengthAwarePaginator */
            $this->paginator = $this->query->paginate(perPage: $this->pagination['per'], pageName: 'numpage', page: $this->pagination['num']);
            $this->paginator->withQueryString();
        } else {
            $this->data = $this->query->get()->all();
        }
    }
}
