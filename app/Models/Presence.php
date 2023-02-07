<?php

namespace App\Models;


use App\Dynamic\Resource\Definition;
use App\Dynamic\Trait\Formable;
use App\Dynamic\Trait\Statable;
use App\Dynamic\Trait\Tableable;
use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    use Tableable, Formable, Statable;

    public static function modelable(): Model
    {
        return new Presence();
    }
    public static function defining()
    {
        self::$caption = "presence";
        self::$definitions = [
            'name' => new Definition(
                name: 'name',
                type: 'string',
            ),
            'school_year' => new Definition(
                name: 'school year',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'school_year_id',
            ),
            'semester' => new Definition(
                name: 'semester',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'semester_id',
            ),
            'teacher' => new Definition(
                name: 'teacher',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'teacher_id',
            ),
            'subjects' => new Definition(
                name: 'subjects',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'subjects_id',
            ),
            'classroom' => new Definition(
                name: 'classroom',
                type: 'model',
                array: false,
                relation: 'parent',
                alias: 'classroom_id',
            ),
            'attendances' => new Definition(
                name: 'attendances',
                type: 'model',
                array: true,
                relation: 'children',
            ),
        ];
        
        self::$route_create = function () {
            return route('web.resource.presence.create');
        };
        self::$route_update = function ($item) {
            return route('web.resource.presence.update', ['presence' => $item]);
        };
        self::$route_delete = function ($item) {
            return route('web.resource.presence.delete', ['presence' => $item]);
        };
        self::$route_delete_any = function () {
            return route('web.resource.presence.delete_any');
        };
        self::$fetcher_relation = function ($definition) {
            return match ($definition->name) {
                'school year' => SchoolYear::all(),
                'semester' => Semester::all(),
                'teacher' => Employee::all(),
                'subjects' => Subjects::all(),
                'classroom' => Classroom::all(),
                default => throw new Error("unknown name of $definition->name")
            };
        };
    }

    protected $fillable = [
        'name',

        'school_year_id',
        'semester_id',
        'teacher_id',
        'subjects_id',
        'classroom_id',
    ];
    protected $casts = [];
    protected $hidden = [];

    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Employee::class, 'teacher_id');
    }
    public function subjects()
    {
        return $this->belongsTo(Subjects::class, 'subjects_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
