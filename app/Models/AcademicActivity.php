<?php

namespace App\Models;

use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicActivity extends Model
{
    use HasFactory;

    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new AcademicActivity();
    }
    public static function defining()
    {
        self::$caption = "academic activity";
        self::$definitions = [
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'duration' => new Definition(
                name: 'duration',
                type: 'string',
            ),
            'executive' => new Definition(
                name: 'executive',
                type: 'string',
            ),
            'type' => new Definition(
                name: 'type',
                type: 'string',
            ),
            'start_at' => new Definition(
                name: 'start at',
                type: 'time',
                format: 'h:m:s',
            ),
            'end_at' => new Definition(
                name: 'end at',
                type: 'time',
                format: 'h:m:s',
            ),
            'description' => new Definition(
                name: 'description',
                type: 'string',
            ),
        ];
        
        self::$route_create = function () {
            return route('web.resource.academic_activity.create');
        };
        self::$route_update = function ($item) {
            return route('web.resource.academic_activity.update', ['academic_activity' => $item]);
        };
        self::$route_delete = function ($item) {
            return route('web.resource.academic_activity.delete', ['academic_activity' => $item]);
        };
        self::$route_delete_any = function () {
            return route('web.resource.academic_activity.delete_any');
        };
        self::$fetcher_relation = function ($definition) {
            return match ($definition->name) {
                default => throw new Error("unknown name of $definition->name")
            };
        };
    }

    protected $fillable = [
        'name',
        'duration',
        'executive',
        'type',
        'start_at',
        'end_at',
        'description',
    ];
    protected $casts = [];
    protected $hidden = [];
}
