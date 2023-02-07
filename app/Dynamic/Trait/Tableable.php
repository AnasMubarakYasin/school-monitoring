<?php

namespace App\Dynamic\Trait;

use App\Dynamic\Resource\Table;

trait Tableable
{
    use Resourceable;
    public static function tableable()
    {
        self::defining();
        return new Table(
            model: self::modelable(),
            route_store: self::$route_store,
            route_create: self::$route_create,
            route_edit: self::$route_edit,
            route_update: self::$route_update,
            route_view: self::$route_view,
            route_view_any: self::$route_view_any,
            route_delete: self::$route_delete,
            route_delete_any: self::$route_delete_any,
            route_relation: self::$route_relation,
        );
    }
}
