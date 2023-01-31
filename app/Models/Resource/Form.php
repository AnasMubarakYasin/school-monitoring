<?php

namespace App\Models\Resource;

use Closure;
use Illuminate\Database\Eloquent\Model;

class Form extends Core
{
    public array|null $fields = [];
    public Closure $fetcher_model;
    public string $mode = "create";

    public function from_create(
        array|null $fields = null,
    ): Form {
        $this->fields = $fields;
        return $this;
    }
    public function from_update(
        $model = null,
        array|null $fields = null,
    ): Form {
        $this->model = $model;
        $this->fields = $fields;
        $this->mode = "update";
        return $this;
    }
    public function fetch_model(Definition $definition)
    {
        return $this->fetcher_model->call($this, $definition);
    }
    public function is_create()
    {
        return $this->mode == 'create';
    }
    public function is_update()
    {
        return $this->mode == 'update';
    }
}
