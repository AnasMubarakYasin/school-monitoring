<?php

namespace App\Dynamic\Resource;

class Stat extends Resource
{
    public int $total = 0;

    public function init(
        int $total = 0,
    ): Stat {
        $this->total = $total;
        return $this;
    }
    public function resourcing(): Stat
    {
        $this->total = $this->model::all()->count();
        return $this;
    }
}
