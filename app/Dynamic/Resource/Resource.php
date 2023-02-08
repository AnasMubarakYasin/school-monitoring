<?php

namespace App\Dynamic\Resource;

use App\Dynamic\Trait\Resourceable;
use Illuminate\Database\Eloquent\Model;
use Closure;

class Resource
{
    public static function create(
        mixed $model = null,
    ) {
        return new Resource($model);
    }
    /** @var Model|Resourceable */
    public mixed $model = null;
    public function __construct(
        mixed $model = null,
        public ?Closure $route_view_any = null,
        public ?Closure $route_view = null,
        /**
         * route ui create
         */
        public ?Closure $route_store = null,
        public ?Closure $route_create = null,
        /**
         * route ui update
         */
        public ?Closure $route_edit = null,
        public ?Closure $route_update = null,
        public ?Closure $route_delete = null,
        public ?Closure $route_delete_any = null,
        public ?Closure $route_restore = null,

        public ?Closure $route_relation = null,
    ) {
        $this->model = $model;
        $this->model->defining();
        $route_default = function () {
            return "";
        };
        $this->route_view_any ??= $route_default;
        $this->route_view ??= $route_default;

        $this->route_store ??= $route_default;
        $this->route_create ??= $route_default;

        $this->route_edit ??= $route_default;
        $this->route_update ??= $route_default;
        $this->route_delete ??= $route_default;
        $this->route_delete_any ??= $route_default;
        $this->route_restore ??= $route_default;

        $this->route_relation ??= $route_default;
    }

    public function resourcing(): Resource
    {
        return $this;
    }

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

    public function route_relation(Definition $definition, mixed $params)
    {
        return $this->route_relation->call($this, $definition, $params);
    }
}
