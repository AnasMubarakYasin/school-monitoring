<?php

namespace App\Models\Resource;

class Stat extends Core
{
    public int $total = 0;
    public string $mode = "create";

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
