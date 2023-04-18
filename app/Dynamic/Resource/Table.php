<?php

namespace App\Dynamic\Resource;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Pagination\LengthAwarePaginator;

class Table extends Resource
{
    public LengthAwarePaginator|null $paginator = null;
    public array $all = [];

    public array|null $pagination = null;
    public array|null $columns = null;
    public array|null $sort = null;
    public array|null $filter = null;
    public array|null $id = null;
    public array $init = [
        'perpage' => 5,
        'limitpage' => 5,
        'reference' => 'on',
        'filter_by_column' => true,
    ];
    public function from_request(
        Request $request,
        array|null $columns = [],
        array|null $pagination = null,
    ): Table {
        $this->columns = $request->query('columns', $columns);
        if ($request->query->getBoolean('sort')) {
            $this->sort = ['name' => $request->query->get('sort_name'), 'dir' => $request->query->get('sort_dir')];
        }
        if ($request->query->getBoolean('filter')) {
            $this->filter = collect($this->columns)->reduce(function ($result, $curr) use ($request) {
                if ($request->query->has("filter_$curr")) {
                    $result[$curr] = $request->query->get("filter_$curr");
                }
                return $result;
            }, []);
        }
        if ($request->query->getBoolean('ref')) {
            $this->id = $request->query('id', []);
        }
        if ($pagination) {
            $this->pagination = [
                'per' => $request->query->getInt('perpage', $pagination['per']),
                'num' => $request->query->getInt('numpage', $pagination['num']),
            ];
        }
        return $this;
    }
    public function resourcing(): Table
    {
        /** @var Builder|EloquentBuilder */
        $query = $this->model::query();
        if ($this->sort && $this->sort['name'] && $this->sort['dir']) {
            $query->orderBy($this->sort['name'], $this->sort['dir']);
        }
        if ($this->filter) {
            if ($this->init['filter_by_column']) {
                $columns = $this->columns;
            } else {
                $columns = array_keys( $this->model::$definitions);
            }
            foreach ($columns as $column) {
                if (isset($this->filter[$column])) {
                    switch ($this->model->definition($column)->type) {
                        case 'string':
                            $query->orWhereFullText($column, $this->filter[$column]);
                            break;
                        case 'number':
                            $query->orWhere($column, $this->filter[$column]);
                            break;
                        case 'model':
                            $value = $this->filter[$column];
                            $relation = $this->model->definition($column)->relation;
                            $query->with($relation)->orWhereHas($relation, function ($builder) use ($value) {
                                $builder->where('id', $value);
                            });
                            break;

                        default:
                            $query->orWhere($column, $this->filter[$column]);
                            break;
                    }
                }
            }
        }
        if (!is_null($this->id)) {
            if ($this->id) {
                $query->whereIn('id', $this->id);
            } else {
                $query->whereIn('id', [0]);
            }
        }
        if ($this->pagination) {
            /** @var LengthAwarePaginator */
            $this->paginator = $query->paginate(perPage: $this->pagination['per'], pageName: 'numpage', page: $this->pagination['num']);
            $this->paginator->withQueryString();
        } else {
            $this->all = $query->get()->all();
        }
        return $this;
    }
}
