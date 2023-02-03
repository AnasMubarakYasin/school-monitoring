<?php

namespace App\Models\Resource\Trait;

use App\Models\Resource\Stat;

trait Statable
{
    use Resourceable;
    public static function stateable()
    {
        return new Stat(
            model: self::modelable(),
        );
    }
}
