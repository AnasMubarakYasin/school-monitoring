<?php

namespace App\Dynamic\Resource;

use Closure;
use App\Dynamic\Resource\Resource;

class Form extends Resource
{
    public array|null $fields = [];
    public Closure $fetcher_relation;
    public string $mode = "create";
    public array $hidden = [];

    public function from_create(
        array|null $fields = null,
        array $hidden = [],
    ): Form {
        $this->fields = $fields;
        $this->hidden = $hidden;
        return $this;
    }
    public function from_update(
        $model = null,
        array|null $fields = null,
        array $hidden = [],
    ): Form {
        $this->model = $model;
        $this->fields = $fields;
        $this->hidden = $hidden;
        $this->mode = "update";
        return $this;
    }
    public function fetch_relation(Definition $definition)
    {
        return $this->fetcher_relation->call($this, $definition);
    }
    public function is_create()
    {
        return $this->mode == 'create';
    }
    public function is_update()
    {
        return $this->mode == 'update';
    }
    public function hidden(string $field)
    {
        if (in_array($field, $this->hidden)) {
            return "hidden";
        } else {
            return '';
        }
    }
}
