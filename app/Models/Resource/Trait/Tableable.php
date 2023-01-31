<?php

namespace App\Models\Resource\Trait;

use App\Models\Resource\Table;

trait Tableable
{
    use Resourceable;
    public static function tableable()
    {
        return new Table(
            model: self::modelable(),
        );
    }
}
