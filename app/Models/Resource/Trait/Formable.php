<?php

namespace App\Models\Resource\Trait;

use App\Models\Resource\Stat;

trait Formable
{
    use Resourceable;
    public static function statable()
    {
        return new Stat(
            model: self::modelable(),
        );
    }
}
