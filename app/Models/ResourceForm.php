<?php

namespace App\Models;

use Closure;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class ResourceForm
{
    public static function create(
        Model|stdClass $model = new stdClass(),
        array|null $fields = [],
    ) {
        return new ResourceForm(
            model: $model,
            fields: $fields,
        );
    }
    public LengthAwarePaginator|null $paginator = null;
    public array $data = [];
    public function __construct(
        public Model|stdClass $model = new stdClass(),
        public array|null $fields = null,
        public string $view_any = "",
        public string $create = "",
        public string $delete_any = "",
    ) {
        $route_gen = function () {
            return "";
        };
        $this->route_view = $route_gen;
        $this->route_update = $route_gen;
        $this->route_delete = $route_gen;
        $this->route_restore = $route_gen;
        $this->fetcher_model = function () {
            return [];
        };
    }
    public Closure $route_view;
    public Closure $route_update;
    public Closure $route_delete;
    public Closure $route_restore;
    public Closure $fetcher_model;
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
    public function model(array $field)
    {
        return $this->fetcher_model->call($this, $field);
    }
    public function processing()
    {
    }
    public function mode()
    {
        return $this->model->id ? 'update' : 'create';
    }
}
