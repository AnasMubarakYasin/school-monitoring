<?php

namespace App\Models\Resource\Trait;

use App\Models\Resource\Form;

trait Formable
{
    use Resourceable;
    public static function formable()
    {
        return new Form(
            model: self::modelable(),
        );
    }
}
