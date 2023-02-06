<?php

namespace App\Dynamic\Trait;

use Closure;
use stdClass;
use App\Dynamic\Resource\Resource;
use App\Dynamic\Resource\Definition;
use Illuminate\Database\Eloquent\Model;

trait Resourceable
{
    public static string $caption = "";
    public static array $definitions = [];
    public static ?Closure $route_store = null;
    public static ?Closure $route_create = null;
    public static ?Closure $route_edit = null;
    public static ?Closure $route_update = null;
    public static ?Closure $route_view = null;
    public static ?Closure $route_view_any = null;
    public static ?Closure $route_delete = null;
    public static ?Closure $route_delete_any = null;
    public static ?Closure $route_relation = null;
    public static function definition(string $key): Definition
    {
        if (isset(self::$definitions[$key])) {
            return self::$definitions[$key];
        }
        return new Definition(name: "undefined", type: "undefined");
    }
    abstract public static function defining();
    abstract public static function modelable(): Model|stdClass;
    public static function resourceable()
    {
        self::defining();
        return new Resource(
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
