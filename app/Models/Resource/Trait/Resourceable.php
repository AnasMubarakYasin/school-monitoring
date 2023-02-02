<?php

namespace App\Models\Resource\Trait;

use App\Models\Resource\Core;
use App\Models\Resource\Definition;
use Illuminate\Database\Eloquent\Model;

trait Resourceable
{
    public static array $definitions = [];
    public static function definition(string $key): Definition
    {
        if (isset(self::$definitions[$key])) {
            return self::$definitions[$key];
        }
        return new Definition(name: "undefined", type: "undefined");
    }
    public static function defining()
    {
    }
    abstract public static function modelable(): Model;
    public static function resourceable()
    {
        return Core::create(
            model: self::modelable(),
        );
    }
}
