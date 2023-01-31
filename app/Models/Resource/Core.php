<?php

namespace App\Models\Resource;

use App\Models\Resource\Trait\Resourceable;
use Illuminate\Database\Eloquent\Model;
use Closure;

abstract class Modelable extends Model
{
    use Resourceable;
}

class Core
{
    public static function create(
        mixed $model = null,
    ) {
        return new Core($model);
    }

    public function __construct(
        public mixed $model = null,
    ) {
        $this->model->defining();
        $route_default = function () {
            return "";
        };
        $this->route_view_any = $route_default;
        $this->route_view = $route_default;

        $this->route_store = $route_default;
        $this->route_create = $route_default;

        $this->route_edit = $route_default;
        $this->route_update = $route_default;
        $this->route_delete = $route_default;
        $this->route_delete_any = $route_default;
        $this->route_restore = $route_default;

        $this->route_model = $route_default;
    }

    public Closure $route_view_any;
    public Closure $route_view;
    /**
     * route ui create
     */
    public Closure $route_store;
    public Closure $route_create;
    /**
     * route ui update
     */
    public Closure $route_edit;
    public Closure $route_update;
    public Closure $route_delete;
    public Closure $route_delete_any;
    public Closure $route_restore;

    public Closure $route_model;

    public function route_view_any(string $query = "")
    {
        return $this->route_view_any->call($this, $query);
    }
    public function route_view(mixed $item)
    {
        return $this->route_view->call($this, $item);
    }

    public function route_store()
    {
        return $this->route_store->call($this);
    }
    public function route_create()
    {
        return $this->route_create->call($this);
    }
    public function route_restore(mixed $item)
    {
        return $this->route_restore->call($this, $item);
    }

    public function route_edit(mixed $item)
    {
        return $this->route_edit->call($this, $item);
    }
    public function route_update(mixed $item)
    {
        return $this->route_update->call($this, $item);
    }

    public function route_delete_any(string $query = "")
    {
        return $this->route_delete_any->call($this, $query);
    }
    public function route_delete(mixed $item)
    {
        return $this->route_delete->call($this, $item);
    }

    public function route_model(Definition $definition, mixed $item)
    {
        return $this->route_model->call($this, $definition, $item);
    }
}
